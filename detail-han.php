<?php
include_once"config/database.php";
spl_autoload_register(function($class_name){
    require './app/models/'. $class_name .'.php';
});
$objCharacters = new Character();

if (isset($_GET['glyph']) && $_GET['glyph'] != '') {
	$glyph = $_GET['glyph'];
	$char = $objCharacters->getCharPronounce($glyph);
	
	if (!isset($char[0]['glyph'])) {
		echo "<script> location.href='notfound?message=wrong character'; </script>";
		exit;	
	}
	
} else {
    echo "<script> location.href='notfound'; </script>";
    exit;
}


//var_dump($char);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Detail</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Page 1</a>
				</li>
				<li>
					<a href="#">Page 2</a>
				</li>
			</ul>
			<form class="navbar-form navbar-left" method="get" action="search-result.php">
				<div class="form-group">
					<input name="keyword" type="text" class="form-control" placeholder="Search character">
				</div>
				<button type="submit" class="btn btn-default">Search</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="add-char">
						<span class="glyphicon glyphicon-plus-sign"></span> Add char</a>
				</li>
				<li>
					<a href="#">
						<span class="glyphicon glyphicon-user"></span> Sign Up</a>
				</li>
				<li>
					<a href="#">
						<span class="glyphicon glyphicon-log-in"></span> Login</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="detail-main">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="char-side main-char">
						<span class="detail-char">
							<?php echo $char[0]['glyph'] ?>
						</span>
					</div>
					
				</div>

				<div class="col-md-6">
					<div class="char-description">
						<h2>Detail information</h2>

						<table>
							<tr>
								<th>Glyph</th>
								<th>Radical</th>
								<th>Hanviet</th>
							</tr>
							<tr>
								<td><?php echo $char[0]['glyph'] ?></td>
								<td><?php echo $char[0]['radical'] ?></td>
								<td><?php echo $char[0]['hanviet'] ?></td>
							</tr>
							
						</table>
					</div>
				</div>

			</div>
		</div>

	</div>

</body>

</html>
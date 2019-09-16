<?php

    include_once"config/database.php";
    spl_autoload_register(function($class_name){
        require './app/models/'. $class_name .'.php';
    });

    $objCharacters = new Character();
    $characters = $objCharacters->getAllItems();


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Chữ Nôm</title>
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

	<div class="main">
		<div class="container">
			<div class="row">
				<?php foreach ($characters as $char) : ?>
				<div class="col-md-4">
					<div class="char">
						<a href="detail-nom?glyph=<?php echo $char['glyph'] ?>">
							<?php echo $char['glyph'] ?>
						</a>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>

</html>
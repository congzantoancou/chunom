

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

	<div class="container">
		<form class="form-horizontal" method="post" action="add-result.php">
			<div class="form-group">
				<label class="control-label required col-sm-2" for="glyph">Glyph*:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="glyph" id="glyph"
					placeholder="Enter glyph" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label required col-sm-2" for="radical">Radical*:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="radical" id="radical"
					placeholder="Enter radical" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label required col-sm-2" for="pronounce">Pronounce*:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="pronounce" id="pronounce"
					placeholder="Enter pronounce" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="layout">Layout:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control"name="layout" id="layout" placeholder="Enter layout">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="part1">Part 1:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="part1" id="part1" placeholder="Enter part1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="part2">Part 2:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="part2" id="part2" placeholder="Enter part2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="part3">Part 3:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="part3" id="part3" placeholder="Enter part3">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="part4">Part 4:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="part4" id="part4" placeholder="Enter part4">
				</div>
			</div>


			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Add</button>
				</div>
			</div>
		</form>
	</div>

</body>

</html>
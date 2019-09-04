<?php
include_once"config/database.php";
spl_autoload_register(function($class_name){
    require './app/models/'. $class_name .'.php';
});
$objCharacters = new Character();

if (isset($_GET['glyph']) && $_GET['glyph'] != '') {
	$glyph = $_GET['glyph'];
	$char = $objCharacters->getItemByName($glyph);
	
	if (!isset($char[0]['glyph'])) {
		echo "<script> location.href='notfound'; </script>";
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
			<form class="navbar-form navbar-left" action="detail.php">
				<div class="form-group">
					<input name="keyword" type="text" class="form-control" placeholder="Search character">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
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
					<div class="char-side">
						<span class="char-label">
							<?php echo $char[0]['pronounce'] ?>
						</span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="char-side part-char">
						<?php if ($char[0]['layout'] == "") { ?>
						<div class="layout">
							<div class="part">
								<?php echo $part = $char[0]['glyph'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LR") { ?>
						<div class="layout LR">
							<div class="part inline left-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part inline right-part">
								<?php echo $part = $char[0]['part2'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TB") { ?>
						<div class="layout TB">
							<div class="part top-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part bottom-part">
								<?php echo $part = $char[0]['part2'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "OI") { ?>
						<div class="layout OI">
							<div class="part out-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part in-part">
								<?php echo $part = $char[0]['part2'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LCR") { ?>
						<div class="layout LCR">
							<div class="part inline left-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part inline center-part">
								<?php echo $part = $char[0]['part2'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part inline right-part">
								<?php echo $part = $char[0]['part3'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TMB") { ?>
						<div class="layout TMB">
							<div class="part top-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part middle-part">
								<?php echo $part = $char[0]['part2'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part bottom-part">
								<?php echo $part = $char[0]['part3'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TLR") { ?>
						<div class="layout TLR">
							<div class="part top-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div>
								<div class="part inline left-part ">
									<?php echo $part = $char[0]['part2'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
								<div class="part inline right-part ">
									<?php echo $part = $char[0]['part3'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LRB") { ?>
						<div class="layout LRB">
							<div>
								<div class="part inline left-part">
									<?php echo $part = $char[0]['part1'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
								<div class="part inline right-part">
									<?php echo $part = $char[0]['part2'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
							</div>
							<div class="part bottom-part">
								<?php echo $part = $char[0]['part3'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TBR") { ?>
						<div class="layout TBR">
							<div class="inline">
								<div class="part top-part">
									<?php echo $part = $char[0]['part1'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
								<div class="part bottom-part">
									<?php echo $part = $char[0]['part2'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
							</div>

							<div class="part inline right-part">
								<?php echo $part = $char[0]['part3'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LTB") { ?>
						<div class="layout LTB">
							<div class="part inline left-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="inline">
								<div class="part top-part">
									<?php echo $part = $char[0]['part2'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
								<div class="part bottom-part">
									<?php echo $part = $char[0]['part3'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
							</div>

						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LTBR") { ?>
						<div class="layout LTBR">
							<div class="part inline left-part">
								<?php echo $part = $char[0]['part1'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="inline">
								<div class="part top-part">
									<?php echo $part = $char[0]['part2'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
								<div class="part bottom-part">
									<?php echo $part = $char[0]['part3'] ?>
									<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
									<span class="tooltiptext">
										<?php echo $charPronounce[0]['hanviet'] ?>
									</span>
								</div>
							</div>
							<div class="part inline right-part">
								<?php echo $part = $char[0]['part4'] ?>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>
					</div>


				</div>

			</div>
		</div>

	</div>

</body>

</html>
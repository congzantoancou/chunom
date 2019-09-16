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
			<div class="char-info">
				<p>
					Character:
					<?php echo $char[0]['glyph'] ?>| Radical:
					<a href="detail-han?glyph=<?php echo $part = $char[0]['radical'] ?>">
						<?php echo $part = $char[0]['radical'] ?>
					</a> | Classify:
					<?php echo $char[0]['classify'] ?>| Semantic:
					<a href="detail-han?glyph=<?php echo $part = $char[0]['semantic'] ?>">
						<?php echo $part = $char[0]['semantic'] ?>
					</a> | Phonetic:
					<a href="detail-han?glyph=<?php echo $part = $char[0]['phonetic'] ?>">
						<?php echo $part = $char[0]['phonetic'] ?>
					</a> |
				</p>
			</div>
		</div>
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
						<ul class="box-wrapper">
							<li class="part box boxa">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['glyph'] ?>">
									<?php echo $part = $char[0]['glyph'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LR") { ?>
						<ul class="box-wrapper vertical">
							<li class="part box boxa">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb full-flex">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TB") { ?>
						<ul class="box-wrapper horizontal">
							<li class="part box boxa">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb full-flex">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "OI") { ?>
						<div class="layout OI">
							<div class="part out-part">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
							<div class="part in-part">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</div>
						</div>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LCR") { ?>
						<ul class="box-wrapper vertical">
							<li class="part box boxa full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TMB") { ?>
						<ul class="box-wrapper horizontal">
							<li class="part box boxa full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TLR") { ?>
						<ul class="box-wrapper horizontal">
							<li class="part box boxa">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LRB") { ?>
						<ul class="box-wrapper horizontal">
							<li class="part box boxa reverse">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "TBR") { ?>
						<ul class="box-wrapper vertical">
							<li class="part box boxa reverse">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>

						<?php if ($char[0]['layout'] == "LTB") { ?>
						<ul class="box-wrapper vertical">
							<li class="part box boxa">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>

						<?php } ?>

						<?php if ($char[0]['layout'] == "LTBR") { ?>
						<ul class="box-wrapper vertical">
							<li class="part box boxa full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part1'] ?>">
									<?php echo $part = $char[0]['part1'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxb half-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part2'] ?>">
									<?php echo $part = $char[0]['part2'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc half-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part3'] ?>">
									<?php echo $part = $char[0]['part3'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
							<li class="part box boxc full-flex third-width">
								<a href="detail-han?glyph=<?php echo $part = $char[0]['part4'] ?>">
									<?php echo $part = $char[0]['part4'] ?>
								</a>
								<?php $charPronounce = $objCharacters->getCharPronounce($part) ?>
								<span class="tooltiptext">
									<?php echo $charPronounce[0]['hanviet'] ?>
								</span>
							</li>
						</ul>
						<?php } ?>
					</div>

				</div>

			</div>

		</div>

	</div>



</body>

</html>
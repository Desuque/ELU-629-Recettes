<?php include 'includes/server.php' ?>
<?php include 'includes/functions.php' ?>

<?php 
$idRct = $_GET["idRecette"];
$row_cnt = count(getRecette($idRct));
if ((isset($_GET["idRecette"])) && ($row_cnt > 0)) {
	echo $_GET["idRecette"];
}
else {
	header("Location:index.php");
	die();
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Recette</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Add icon library -->
</head>
<body class="is-preload">
	<div id="wrapper">
		<div id="main">
			<div class="inner">
				<?php include 'includes/header.php';?>

				<section>
					<header class="major">
						<h2>TITLE RECETTE</h2>
					</header>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Dificulte:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<div class="star-rating">
									<a style="color: #f56a6a;">&#9733;</a>
									&#9733;
									&#9733;
									&#9733;
									&#9733;
								</div>
							</h3>
						</div>
					</div>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Precio:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<div class="star-rating">
									<a style="color: #f56a6a;">&#9733;</a>
									&#9733;
									&#9733;
									&#9733;
									&#9733;
								</div>
							</h3>
						</div>
					</div>

					<br/>

					<span class="image fit"><img src="images/pic11.jpg" alt="" /></span>

					<h2 id="content">Sample Content</h2>
					<p>Praesent ac adipiscing ullamcorper semper ut amet ac risus. Lorem sapien ut odio odio nunc. Ac adipiscing nibh porttitor erat risus justo adipiscing adipiscing amet placerat accumsan. Vis. Faucibus odio magna tempus adipiscing a non. In mi primis arcu ut non accumsan vivamus ac blandit adipiscing adipiscing arcu metus praesent turpis eu ac lacinia nunc ac commodo gravida adipiscing eget accumsan ac nunc adipiscing adipiscing lorem ipsum dolor sit amet nullam veroeros adipiscing.</p>
				</section>
			</div>
		</div>

		<?php include 'includes/sidebar.php';?>

	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>
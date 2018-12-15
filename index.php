<?php include 'includes/functions.php' ?>

<!DOCTYPE HTML>
<?php 
session_start(); 

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: index.php");
}
?>
<?php include 'includes/server.php';?>
<html>
<head>
	<title>Page d'accueil</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload">

	<div id="wrapper">
		<div id="main">
			<div class="inner">
				<?php include 'includes/header.php';?>

				<section>
					<header class="major">
						<h2>Dernières recettes publiées</h2>
					</header>
					<div class="posts">
						<?php
						$recettes = getLastsRecettes();
						while ($rec = $recettes->fetch_assoc()) {
							?>

							<article>
								<a href="#" class="image"><img src="img/pic01.jpg" alt="" /></a>
								<h3><?php echo($rec['titre']); ?></h3>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
								<ul class="actions">
									<li><a href="/recette.php?idRecette=" class="button">Lire</a></li>
								</ul>
							</article>

							<?php
						}
						?>
					</div>
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
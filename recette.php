<?php include 'includes/server.php' ?>
<?php include 'includes/functions.php' ?>

<?php 
$idRct = $_GET["idRecette"];
$row_cnt = count(getRecette($idRct));
if ((isset($_GET["idRecette"])) && ($row_cnt > 0) && (canReadRecette($idRct))) {
	$recette = getRecette($idRct);
	$information = getInformation($idRct);
}
else {
	header("Location:index.php");
	die();
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Recette: <?php echo($recette['titre']); ?></title>
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
						<h2><?php echo($recette['titre']); ?></h2>
					</header>

					<span class="image fit"><img src='<?php echo ('img/' . $recette['photo']) ?>' /></span>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Categorie:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<?php echo $information['categorie'] ?>
							</h3>
						</div>
					</div>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Duree cuisson:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<?php echo $information['dureecui'] ?>
							</h3>
						</div>
					</div>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Duree Répos:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<?php echo $information['dureerepos'] ?>
							</h3>
						</div>
					</div>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Duree Préparation:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<?php echo $information['dureeprep'] ?>
							</h3>
						</div>
					</div>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Dificulte:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<div class="star-rating">
									<?php
									$i = 0;
									$diff = $information['diff'];
									while ($i<5) {
										if ($i < $diff) {
											?>
											<a style="color: #f56a6a;">&#9733;</a>
											<?php
										} else {
											?>
											&#9733;
											<?php
										}
										$i++;
									}
									?>
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
									<?php
									$i = 0;
									$cout = $information['cout'];
									while ($i<3) {
										if ($i < $cout) {
											?>
											<a style="color: #f56a6a;">&#9733;</a>
											<?php
										} else {
											?>
											&#9733;
											<?php
										}
										$i++;
									}
									?>
								</div>
							</h3>
						</div>
					</div>

					<br/>

					<div class="row gtr-uniform">
						<div class="col-3 col-12-small">
							<h4>Ingredients:</h4>
						</div>
						<div class="col-3 col-12-small">
							<h3>
								<?php echo $information['categorie'] ?>
							</h3>
						</div>
					</div>

					<h2 id="content">Sample Content</h2>
					<p>Praesent ac adipiscing ullamcorper semper ut amet ac risus. Lorem sapien ut odio odio nunc. Ac adipiscing nibh porttitor erat risus justo adipiscing adipiscing amet placerat accumsan. Vis. Faucibus odio magna tempus adipiscing a non. In mi primis arcu ut non accumsan vivamus ac blandit adipiscing adipiscing arcu metus praesent turpis eu ac lacinia nunc ac commodo gravida adipiscing eget accumsan ac nunc adipiscing adipiscing lorem ipsum dolor sit amet nullam veroeros adipiscing.</p>
				</section>


				<section>
					<header class="major">
						<h2>Commentaires</h2>
					</header>

					<?php
					$recettes_mod = getRecettesMod();
					while ($rec = $recettes_mod->fetch_assoc()) {
						?>

						<h3>Blockquote</h3>
						<blockquote>Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Lorem ipsum dolor. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus.</blockquote>

						<?php
					}
					?>
					
					<?php  if (isset($_SESSION['username']) && (!isOwer($idRct))) : ?>
						<div class="col-12">
							<textarea name="demo-message" id="demo-message" placeholder="Entrez votre message" rows="6" maxlength="500" name="Commentaire" /></textarea>
						</div>
						<br/>
						<div class="col-12">
							<ul class="actions">
								<li><input type="submit" value="Envoyer le message" class="primary" name="new_comment" /></li>
							</ul>
						</div>
					<?php endif ?>
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
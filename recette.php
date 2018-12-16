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
								<?php echo $information['categorie']; ?>
							</h3>
						</div>
					</div>

					<br/>

					<?php
					$etapes = getEtapes($idRct);
					$i = 1;
					while ($etape = $etapes->fetch_assoc()) {
						?>

						<h2 id="content">Étape <?php echo $i ?></h2>
						<p><?php echo $etape['nom']; ?></p>
						
						<?php
						$i++;
					}
					?>

				</section>

				<section>
					<header class="major">
						<h2>Commentaires</h2>
					</header>

					<?php
					$Commentaires = getCommentaires($idRct);
					while ($com = $Commentaires->fetch_assoc()) {
						?>

						<h3><?php $user = getNomUser($com['iduser']); echo ($user['username']); ?> | <?php echo($com['date']); ?></h3>
						<blockquote><?php echo($com['texte']); ?></blockquote>

						<?php  if ((isAdministrator()) || (isOwer($idRct))) : ?>
							<form method="post" action='<?php echo ('/recette.php?idRecette=' . $idRct ) ?>'>
								<div class="col-12">
									<ul class="actions">
										<input type="hidden" name="idcommentaire" id="demo-name" value='<?php echo ($com['id']) ?>' />
										<li><input type="submit" value="Supprimer" class="primary" name="delete_recette" /></li>
									</ul>
								</div>
							</form>

						<?php endif ?>

						<?php
					}
					?>

					<?php  if (isset($_SESSION['username']) && (!isOwer($idRct))) : ?>
						<form method="post" action='<?php echo ('/recette.php?idRecette=' . $idRct ) ?>'>
							<?php include 'includes/errors.php'; ?>
							<div class="col-12">
								<input type="hidden" name="idrecette" id="demo-name" value='<?php echo ($idRct) ?>' />
								<textarea id="demo-message" placeholder="Entrez votre message" rows="6" maxlength="500" name="commentaire" /></textarea>
							</div>
							<br/>
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" value="Envoyer le message" class="primary" name="new_comment" /></li>
								</ul>
							</div>
						</form>
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
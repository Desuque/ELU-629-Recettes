<?php include 'includes/server.php' ?>
<?php include 'includes/functions.php' ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Administration | International Catering</title>
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
						<h2>Administration</h2>
					</header>

					<h3>Recettes en attente de modération</h3>

					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>Titre de la recette</th>
									<th>Date</th>
									<th>Id d'utilisateur</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$recettes_mod = getRecettesMod();
								while ($rec = $recettes_mod->fetch_assoc()) {
									?>

									<tr>
										<td><?php echo($rec['titre']); ?></td>
										<td><?php echo($rec['date']); ?></td>
										<td><?php echo($rec['iduser']); ?></td>
										<td>
											<a href="admin.php?accepterRecette=<?php echo $rec['id'] ?>" onclick="">
												<img src="images/checked.png" alt="Accepter" />
											</a>
											|
											<a href="admin.php?eliminerRecette=<?php echo $rec['id'] ?>" onclick="">
												<img src="images/delete.png" alt="Éliminer" />
											</a>
										</td>
									</tr>

									<?php
								}
								?>
							</tbody>
						</table>
					</div>

					<h3>Liste des utilisateurs</h3>

					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>Id d'utilisateur</th>
									<th>Nom d'utilisateur</th>
									<th>E-mail</th>
									<th>Statut</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php
								// 0 -> Normal user
								// 1 -> Bloqued user
								// 2 -> Eliminated user
								// 3 -> Moderator
								// 4 -> Administrator
								$utilisateurs = getUtilisateurs();
								while ($utilisateur = $utilisateurs->fetch_assoc()) {
									$statut = $utilisateur['type'];
									$statut_nom;
									if($statut == '0') {
										$statut_nom = "Utilisateur";
									}
									if($statut == '1') {
										$statut_nom = "Utilisateur bloqué";
									}
									if($statut == '2') {
										$statut_nom = "Utilisateur supprimé";
									}
									if($statut == '3') {
										$statut_nom = "Modérateur";
									}
									if($statut == '4') {
										$statut_nom = "Administrateur";
									}
									?>

									<tr>
										<td><?php echo($utilisateur['id']); ?></td>
										<td><?php echo($utilisateur['username']); ?></td>
										<td><?php echo($utilisateur['email']); ?></td>
										<td><?php echo $statut_nom; ?></td>
										<td>
											<?php  if (($statut == '1') || ($statut == '2')) : ?>
											<a href="admin.php?unlockUser=<?php echo $utilisateur['id'] ?>" onclick="">
												<img src="images/checked.png" alt="Débloquer utilisateur" />
											</a>
											<?php endif ?>
											<?php  if (($statut != '1')) : ?>
											<a href="admin.php?lockUser=<?php echo $utilisateur['id'] ?>" onclick="">
												<img src="images/delete.png" alt="Bloquer utilisateur" />
											</a>
											<?php endif ?>
											<?php  if ($statut != '2') : ?>											
											<a href="admin.php?eliminerUser=<?php echo $utilisateur['id'] ?>" onclick="">
												<img src="images/bin.png" alt="Éliminer utilisateur" />
											</a>
											<?php endif ?>
											<?php  if ($statut != '3') : ?>
											<a href="admin.php?setModerator=<?php echo $utilisateur['id'] ?>" onclick="">
												<img src="images/shield.png" alt="Définir en tant que modérateur" />
											</a>
											<?php endif ?>
										</td>
									</tr>

									<?php
								}
								?>
							</tbody>
						</table>
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
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
										</button>
										<button type="submit" class="btn" name="eliminer_recette">
											<img class="logo" src="images/delete.png" alt="Éliminer" />
										</button>
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
<?php include 'includes/server.php' ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Register | International Catering</title>
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
						<h2>Register</h2>
					</header>

					<form method="post" action="register.php">
						<?php include 'includes/errors.php'; ?>
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<h3>Usuario:</h3>
								<input type="text" name="username" id="demo-name" value="<?php echo $username; ?>" placeholder="Usuario" />
							</div>
							<div class="col-6 col-12-xsmall">
								<h3>Email:</h3>
								<input type="email" name="email" id="demo-email" value="<?php echo $email; ?>" placeholder="Email" />
							</div>
							<div class="col-6 col-12-xsmall">
								<h3>Password:</h3>
								<input type="password" name="password_1" id="demo-email" value="<?php echo $password_1; ?>" placeholder="Password" />
							</div>
							<div class="col-6 col-12-xsmall">
								<h3>Password:</h3>
								<input type="password" name="password_2" id="demo-email" value="<?php echo $password_2; ?>" placeholder="Repeat your password" />
							</div>

							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" value="Register" class="primary" name="reg_user"/></li>
									<li><input type="reset" value="Reset" /></li>
								</ul>
							</div>
						</div>
					</form>
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
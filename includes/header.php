<header id="header">
	<a href="/" class="logo"><img class="logo" src="images/logo.png" alt="International Catering" /></a>

	<div class="login">
		<?php  if (isset($_SESSION['username'])) : ?>
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
				</div>
				<div class="col-6 col-12-xsmall">
					<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
				</div>
			</div>
		<?php  else: ?>
			<form method="post" action="index.php">
				<?php include 'includes/errors.php'; ?>
				<div class="row gtr-uniform">

					<div class="col-6 col-12-xsmall">
						<input type="text" name="username" placeholder="Usuario">
					</div>
					<div class="col-6 col-12-xsmall">
						<input type="password" name="password" placeholder="Password">
					</div>

					<div class="col-12">
						<ul class="actions">
							<li><button type="submit" class="btn" name="login_user">Login</button></li>
							<li>Not yet a member? <a href="register.php">Sign up</a></li>
						</ul>
					</div>
				</div>
			</form>
		<?php endif ?>
	</div>
</header>
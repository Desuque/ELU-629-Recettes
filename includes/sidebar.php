<div id="sidebar">
	<div class="inner">

		<section id="search" class="alt">
			<form method="post" action="#">
				<input type="text" name="query" id="query" placeholder="Search" />
			</form>
		</section>

		<nav id="menu">
			<header class="major">
				<h2>Menu</h2>
			</header>
			<ul>
				<li><a href="/">Page d'accueil</a></li>
				<?php  if (!isset($_SESSION['username'])) : ?>
					<li><a href="/register.php">Registre</a></li>
				<?php endif ?>
				<?php  if (isset($_SESSION['username'])) : ?>
					<li><a href="/account.php">Mon profil</a></li>
					<li><a href="/recette.php">Publier une recette</a></li>
				<?php endif ?>
				<?php  if (isAdministrator()) : ?>
					<li><a href="/admin.php">Administration</a></li>
				<?php endif ?>

			</ul>
		</nav>



		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">IMT Atlantique &copy; | 2018 Tous droits réservés.</p>
		</footer>

	</div>
</div>

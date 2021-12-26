<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?> - <?= $config::$TITLE ?></title>
	<link rel="stylesheet" href="/resource/css-generic/import.css">
	<link rel="stylesheet" href="/resource/heibon.css">
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<script src="/resource/userinterface.js"></script>
	<?php if($config::$ENV === "dev"): ?>
	<script>UserInterface.DEBUG = true</script>
	<?php endif;?>
</head>
<body>
<header id="header">
	<nav id="first-menu" class="wrap">
		<a href="/anime"><?= $animeCount; ?> Animes</span>
		<?php if (isset($user)): ?>
		<?php if ($user->getField("access_level") >=$config::$ACCESS_LEVEL_ADMINISTRATOR): ?>
		<a href="/admin">Administration</a>
		<?php endif; ?>
		<a href="/user">Mon compte</a>
		<a href="/logout">Se déconnecter</a>
		<?php else: ?>
		<a href="/register">S'inscrire</a>
		<a href="/login">Se connecter</a>
		<?php endif; ?>
	</nav>
	<section class="wrap">
		<h1 id="logo"><?=$config::$TITLE ?></h1>
		<div>
			<nav id="second-menu">
				<a href="/">Acceuil</a>
				<a href="/anime">Anime</a>
				<a href="/member">Membre</a>
			</nav>
			<form method="POST" action="/search">
				<input type="text" placeholder="Rechercher" name="query">
				<select name="type">
					<option value="anime">Anime</option>
					<option value="member">Membre</option>
				</select>
				<button>OK</button>
			</form>
		</div>
	</section>
</header>
<main>
	<?php require($view); ?>
</main>
<footer id="footer">
	<div class="wrap">
		<div>
			<section>
				<h3>Anime</h3>
				<nav>
				<?php foreach ($latestAnime as $anime): ?>
					<div><a href="/anime/<?= $anime->getField("id_anime"); ?>"><?= $anime->getField("title"); ?></a></div>
				<?php endforeach;  ?>
				</nav>
			</section>
			<section>
				<h3>Episode</h3>
				<nav>Coming soon</nav>
			</section>
			<section>
				<h3>Partenaires</h3>
				<nav>
					<div><a href="#">Partenaire 1</a></div>
					<div><a href="#">Partenaire 2</a></div>
					<div><a href="#">Partenaire 3</a></div>
				</nav>
			</section>
		</div>
	</div>
	<p class="copyright">
		© Pachinko
	</p>
</footer>
<?php
if($config::$ENV === "dev" && $config::$DEBUG_BAR) {
	require("/app/src/View/Partial/debug.php");
}
?>
</body>
</html>

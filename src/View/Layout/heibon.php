<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?> - <?= $config::$title ?></title>
	<link rel="stylesheet" href="/resource/css-generic/import.css">
	<link rel="stylesheet" href="/resource/heibon.css">
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<script src="/resource/userinterface.js"></script>
	<?php if($config::$env === "dev"): ?>
	<script>UserInterface.DEBUG = true</script>
	<?php endif;?>
</head>
<body>
<header class="background-image-header background-repeat-norepeat background-size-cover background-attachment-fixed border-width-2 border-style-solid border-bottom border-color-hurricane">
	<div class="wrap display-grid grid-auto-flow-column grid-gap justify-content-flexend">
		<span class="text-decoration-none padding-vertical-xs padding-horizontal background-color-bluesky color-bonjour" href="#"><?= $animeCount; ?> Animes</span>
		<?php if (isset($user) === true): ?>
		<?php if ($user->getField("access_level") >=$config::$access_level_administrator): ?>
		<a class="text-decoration-none padding-vertical-xs padding-horizontal background-color-tosca color-bonjour" href="/admin">Administration</a>
		<?php endif; ?>
		<a class="text-decoration-none padding-vertical-xs padding-horizontal background-color-mineshaft color-bonjour hover-background-color-masala" href="/user">Mon compte</a>
		<a class="text-decoration-none padding-vertical-xs padding-horizontal background-color-mineshaft color-bonjour hover-background-color-masala" href="/logout">Se déconnecter</a>
		<?php else: ?>		
		<a class="text-decoration-none padding-vertical-xs padding-horizontal background-color-mineshaft color-bonjour hover-background-color-masala" href="/register">S'inscrire</a>
		<a class="text-decoration-none padding-vertical-xs padding-horizontal background-color-mineshaft color-bonjour hover-background-color-masala" href="/login">Se connecter</a>
		<?php endif; ?>
	</div>
	<div class="wrap padding-vertical-xl">
		<h1 class="logo"><?=$config::$title ?></h1>
		<div class="display-grid template-2col1frauto margin-top-xl">
			<nav class="display-grid template-nav">
				<a class="border-radius-2xs background-color-mineshaft padding-xs color-silver text-decoration-none hover-background-color-masala" href="/">Acceuil</a>
				<a class="border-radius-2xs background-color-mineshaft padding-xs color-silver text-decoration-none hover-background-color-masala" href="/anime">Recherche d'anime</a>
				<a class="border-radius-2xs background-color-mineshaft padding-xs color-silver text-decoration-none hover-background-color-masala" href="/member">Recherche de  membre</a>
			</nav>
			<form method="GET" action="/search" class="display-grid template-3col1frauto align-items-center">
				<input class="padding-xs" type="text" placeholder="Rechercher" name="query">
				<select class="padding-vertical-xs text-align-center" name="type">
					<option value="anime">Anime</option>
					<option value="member">Membre</option>
				</select>
				<button class="padding-vertical-xs padding-horizontal background-color-lightbrown border-width-1 border-style-solid border-color-dustygray2 color-bonjour">OK</button>
			</form>
		</div>
	</div>
</header>
<main class="margin-top-xl">
	<?php require($view); ?>
</main>
<footer class="margin-top-xl background-image-header background-repeat-norepeat background-size-cover background-attachment-fixed padding-vertical-xl border-width-1 border-style-solid border-top  border-color-hurricane">
	<div class="wrap background-color-seethrough2 padding">		
		<div class="display-grid template-3col grid-column-gap justify-items-center align-items-baseline font-size-small">
			<section class="display-grid grid-row-gap">
				<h3>Anime</h3>
				<nav class="display-grid grid-gap">
				<?php foreach ($latestAnime as $anime): ?>
					<div><a class="hover-text-decoration-underline color-white" href="/anime/<?= $anime->getField("id_anime"); ?>"><?= $anime->getField("title"); ?></a></div>
				<?php endforeach;  ?>
				</nav>
			</section>
			<section class="display-grid grid-row-gap">
				<h3>Episode</h3>
				<nav class="display-grid grid-gap">

				</nav>
			</section>
			<section class="display-grid grid-row-gap">
				<h3>Partenaires</h3>
				<nav class="display-grid grid-gap">
					<div><a class="hover-text-decoration-underline color-white" href="#">Partenaire 1</a></div>
					<div><a class="hover-text-decoration-underline color-white" href="#">Partenaire 2</a></div>
					<div><a class="hover-text-decoration-underline color-white" href="#">Partenaire 3</a></div>
				</nav>
			</section>
		</div>
	</div>
	<p class="position-absolute left">
		© Pachinko
	</p>
</footer>
</body>
</html>

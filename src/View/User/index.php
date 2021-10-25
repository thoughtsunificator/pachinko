<div class="wrap">
	<h2>Mon compte</h2>
	<?php if (isset($message)):?>
	<div class="margin-top-xl<?= isset($success) && $success === true ? " background-color-tomthumb" : " background-color-tosca" ?> padding-xs margin-bottom">
		<?= $message; ?>
	</div>
	<?php endif;?>
	<h3 class="margin-top-xl">
		Bonjour <?= $user->getField("username"); ?> !
	</h3>
	<div class="margin-top display-grid grid-gap">
		<?php if ($user->getField("id_membre") !== null): ?>
			<a class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" href="/user/edit">Modifier mes informations</a>
		<?php else:?>
			<a class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" href="/user/create_profile">Creer un profil</a>
		<?php endif;?>
			<a class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" href="/user/delete">Supprimer mon compte</a>
	</div>
</div>

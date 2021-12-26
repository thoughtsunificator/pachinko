<div class="wrap">
	<h2>Mon compte</h2>
	<?php if (isset($message)):?>
	<div class="margin-top-xl<?= isset($success) && $success ? " background-color-tomthumb" : " background-color-tosca" ?> padding-xs margin-bottom">
		<?= $message; ?>
	</div>
	<?php endif;?>
	<h3 class="margin-top-xl">
		Hi <?= $user->getField("username"); ?> !
	</h3>
	<div class="margin-top display-grid grid-gap">
		<?php if ($user->getField("id_membre") !== null): ?>
			<a class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" href="/user/edit">Update my account</a>
		<?php else:?>
			<a class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" href="/user/create_profile">Create my profile</a>
		<?php endif;?>
			<a class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" href="/user/delete">Delete my account</a>
	</div>
</div>

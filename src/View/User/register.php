<div class="wrap">
	<h2>Inscription</h2>
	<?php	if (isset($message) === true): ?>
	<div class="margin-top-xl<?= isset($success) && $success === true ? " background-color-tomthumb" : " background-color-tosca" ?> padding-xs margin-bottom">
		<?= $message; ?>
	</div>
	<?php endif; ?>
	<section class="margin-top-xl display-grid grid-gap margin-horizontal-auto background-color-mineshaft padding-large">
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="login">
					<div>
						Identifiant :
					</div>
					<input type="text" name="username" id="username" minlength="3" required class="margin-top padding-xs full-width">
				</label>
			</div>
			<div>
				<label for="password">
					<div>
						Mot de passe :
					</div>
					<input type="password" name="password" id="password" minlength="3" required class="margin-top padding-xs full-width">
				</label>
			</div>
			<button class="margin-top button half-width margin-auto">S'inscrire</button>
		</form>
	</section>
</div>

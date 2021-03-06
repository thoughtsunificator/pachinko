<div class="wrap">
	<h2>Ajouter un utilisateur</h2>
	<?php	if (isset($message)): ?>
	<div class="margin-top<?= isset($success) && $success ? " background-color-tomthumb" : " background-color-tosca" ?> padding-xs margin-bottom">
		<?= $message; ?>
	</div>
	<?php endif; ?>
	<section class="margin-top display-grid grid-gap">
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="username">
					<div>
						Identifiant
					</div>
					<input type="text" name="username" id="username" minlength="3" required class="padding-xs full-width">
				</label>
			</div>
			<div>
				<label for="password">
					<div>
						Mot de passe
					</div>
					<input type="password" name="password" id="password" minlength="3" required class="padding-xs full-width">
				</label>
			</div>
			<div>
				<label for="access_level">
						<div>
							Access level
						</div>
					<input type="text" name="access_level" id="access_level" required class="padding-xs full-width" value="0">
				</label>
			</div>
			<div>
				<button class="button">Ajouter</button>
				<button type="reset" class="button">Reset</button>
			</div>
		</form>
	</section>
</div>

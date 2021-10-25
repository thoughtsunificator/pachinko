<div class="wrap">
	<h2>Modifier un utilisateur</h2>
	<section class="margin-top display-grid grid-gap">
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="username">
					<div>
						Identifiant
					</div>
					<input type="text" name="username" id="username" minlength="3" required class="padding-xs full-width" value="<?= $user2["username"] ?>">
				</label>
			</div>
			<div>
				<label for="password">
					<div>
						Mot de passe
					</div>
					<input type="password" name="password" id="password" minlength="3" class="padding-xs full-width">
				</label>
			</div>
			<div>
				<label for="access_level">
						<div>
							Access level
						</div>
					<input type="text" name="access_level" id="access_level" required class="padding-xs full-width" value="<?= $user2["access_level"] ?>">
				</label>
			</div>
			<div>
				<button name="update" class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Modifier</button>
			</div>
		</form>
	</section>
</div>

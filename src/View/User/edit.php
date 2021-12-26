<div class="wrap">
	<h2>Modifier mes informations</h2>
	<section class="margin-top display-grid grid-gap">
		<h3>Mon compte</h3>
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="username">
					<div>
						Nom d'utilisateur :
					</div>
					<input type="username" name="username" id="username" minlength="3" class="padding-xs full-width margin-top" value="<?= $user->getField("username")?>">
				</label>
			</div>
			<div>
				<label for="password">
					<div>
						Mot de passe :
					</div>
					<input type="password" name="password" id="password" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<button name="update" class="button">Modifier</button>
			</div>
		</form>
	</section>
	<section class="margin-top display-grid grid-gap">
		<h3>Mon profil</h3>
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="nom">
					<div>
						Nom :
					</div>
					<input type="nom" name="nom" id="nom" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="prenom">
					<div>
						Prénom :
					</div>
					<input type="prenom" name="prenom" id="prenom" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="date_naissance">
					<div>
						Date de naissance :
					</div>
					<input type="date_naissance" name="date_naissance" id="date_naissance" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="email">
					<div>
						Email :
					</div>
					<input type="email" name="email" id="email" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="adresse">
					<div>
						Adresse :
					</div>
					<input type="adresse" name="adresse" id="adresse" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="cpostal">
					<div>
						Code Postal :
					</div>
					<input type="cpostal" name="cpostal" id="cpostal" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="ville">
					<div>
						Ville :
					</div>
					<input type="ville" name="ville" id="ville" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="pays">
					<div>
						Pays :
					</div>
					<input type="pays" name="pays" id="pays" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<button name="update" class="button">Modifier</button>
			</div>
		</form>
	</section>
</div>

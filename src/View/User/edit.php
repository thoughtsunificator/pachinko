<div class="wrap">
	<h2>Update my account</h2>
	<section class="margin-top display-grid grid-gap">
		<h3>My account</h3>
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="username">
					<div>
						Username :
					</div>
					<input type="username" name="username" id="username" minlength="3" class="padding-xs full-width margin-top" value="<?= $user->getField("username")?>">
				</label>
			</div>
			<div>
				<label for="password">
					<div>
						Password :
					</div>
					<input type="password" name="password" id="password" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<button name="update" class="button">Update</button>
			</div>
		</form>
	</section>
	<section class="margin-top display-grid grid-gap">
		<h3>My profile</h3>
		<form method="POST" class="display-grid grid-gap">
			<div>
				<label for="nom">
					<div>
						Lastname :
					</div>
					<input type="nom" name="nom" id="nom" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="prenom">
					<div>
						Firstname :
					</div>
					<input type="prenom" name="prenom" id="prenom" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="date_naissance">
					<div>
						Birthdate :
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
						Address :
					</div>
					<input type="adresse" name="adresse" id="adresse" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="cpostal">
					<div>
						Zipcode :
					</div>
					<input type="cpostal" name="cpostal" id="cpostal" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="ville">
					<div>
						City :
					</div>
					<input type="ville" name="ville" id="ville" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<label for="pays">
					<div>
						Country :
					</div>
					<input type="pays" name="pays" id="pays" minlength="3" class="padding-xs full-width margin-top">
				</label>
			</div>
			<div>
				<button name="update" class="button">Update</button>
			</div>
		</form>
	</section>
</div>

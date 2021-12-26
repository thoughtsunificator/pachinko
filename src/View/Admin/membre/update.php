<div class="wrap">
	<h2>Modifier un membre</h2>
	<section class="margin-top display-grid grid-gap">
		<form method="POST">
			<div class="display-grid template-2col grid-gap">
			<div>
				<label for="firstname">
					<div>
						Nom
					</div>
					<input type="text" name="firstname" id="firstname" minlength="3" required class="padding-xs full-width" value="<?= $membre["fiche_personne_nom"] ?>">
				</label>
			</div>
			<div>
				<label for="lastname">
					<div>
						Prenom
					</div>
					<input type="text" name="lastname" id="lastname" minlength="3" required class="padding-xs full-width" value="<?= $membre["prenom"] ?>">
				</label>
			</div>
			<div>
				<label for="birthdate">
						<div>
							Date de naissance
						</div>
					<input type="date" name="birthdate" id="birthdate" required class="padding-xs full-width" value="<?= date("Y-m-d", strtotime($membre["date_naissance"])) ?>">
				</label>
			</div>
			<div>
				<label for="email">
						<div>
							Email
						</div>
					<input type="email" name="email" id="email" required class="padding-xs full-width" value="<?= $membre["email"] ?>">
				</label>
			</div>
			<div>
				<label for="address">
						<div>
							Adresse
						</div>
					<input type="text" name="address" id="address" required class="padding-xs full-width" value="<?= $membre["adresse"] ?>">
				</label>
			</div>
			<div>
				<label for="zipcode">
						<div>
							Code postal
						</div>
					<input type="text" name="zipcode" id="zipcode" required class="padding-xs full-width" value="<?= $membre["cpostal"] ?>">
				</label>
			</div>
			<div>
				<label for="city">
						<div>
							Ville
						</div>
					<input type="text" name="city" id="city" required class="padding-xs full-width" value="<?= $membre["ville"] ?>">
				</label>
			</div>
			<div>
				<label for="country">
						<div>
							Pays
						</div>
					<input type="text" name="country" id="country" required class="padding-xs full-width" value="<?= $membre["pays"] ?>">
				</label>
			</div>
			<div>
				<label for="country">
						<div>
							Abonnement
						</div>
						<select class="padding-xs full-width" name="id_abo" id="id_abo" autocomplete="off" required>
							<option value="">Selectionnez un abonnement</option>
							<?php	foreach (getSubscriptionList() as $abonnement):	?>
							<option<?php ($abonnement["id_abo"] === $membre["id_abo"] ? print(" selected=\"selected\"") : "") ?> value="<?= $abonnement["id_abo"]; ?>"><?= $abonnement["nom"]; ?></option>
							<?php	endforeach;	?>
						</select>
				</label>
			</div>
			</div>		
			<div class="margin-top">
				<button name="update" class="button">Modifier</button>
				<button type="reset" class="button">Reset</button>
			</div>
		</form>
	</section>
</div>

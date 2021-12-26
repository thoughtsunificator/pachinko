<div class="wrap">
	<h2>Modifier un membre</h2>
	<section class="margin-top display-grid grid-gap">
		<form method="POST">
			<div class="display-grid template-2col grid-gap">
			<div>
				<label for="firstname">
					<div>
						Lastname
					</div>
					<input type="text" name="firstname" id="firstname" minlength="3" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["fiche_personne_nom"]) ?>">
				</label>
			</div>
			<div>
				<label for="lastname">
					<div>
						Firstname
					</div>
					<input type="text" name="lastname" id="lastname" minlength="3" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["prenom"]) ?>">
				</label>
			</div>
			<div>
				<label for="birthdate">
						<div>
							Birthdate
						</div>
					<input type="date" name="birthdate" id="birthdate" required class="padding-xs full-width" value="<?= date("Y-m-d", strtotime(htmlspecialchars($membre["date_naissance"]))) ?>">
				</label>
			</div>
			<div>
				<label for="email">
						<div>
							Email
						</div>
					<input type="email" name="email" id="email" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["email"]) ?>">
				</label>
			</div>
			<div>
				<label for="address">
						<div>
							Address
						</div>
					<input type="text" name="address" id="address" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["adresse"]) ?>">
				</label>
			</div>
			<div>
				<label for="zipcode">
						<div>
							Zipcode
						</div>
					<input type="text" name="zipcode" id="zipcode" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["cpostal"]) ?>">
				</label>
			</div>
			<div>
				<label for="city">
						<div>
							City
						</div>
					<input type="text" name="city" id="city" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["ville"]) ?>">
				</label>
			</div>
			<div>
				<label for="country">
						<div>
							Country
						</div>
					<input type="text" name="country" id="country" required class="padding-xs full-width" value="<?= htmlspecialchars($membre["pays"]) ?>">
				</label>
			</div>
			<div>
				<label for="country">
						<div>
							Subscription
						</div>
						<select class="padding-xs full-width" name="id_abo" id="id_abo" autocomplete="off" required>
							<option value="">Select a subscription</option>
							<?php	foreach (getSubscriptionList() as $abonnement):	?>
							<option<?php ($abonnement["id_abo"] === $membre["id_abo"] ? print(" selected=\"selected\"") : "") ?> value="<?= $abonnement["id_abo"]; ?>"><?= htmlspecialchars($abonnement["nom"]); ?></option>
							<?php	endforeach;	?>
						</select>
				</label>
			</div>
			</div>		
			<div class="margin-top">
				<button name="update" class="button">Update</button>
				<button type="reset" class="button">Reset</button>
			</div>
		</form>
	</section>
</div>

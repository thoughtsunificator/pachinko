<div class="wrap">
	<h2>Modifier l'abonnement de <?= htmlspecialchars($membre["fiche_personne_nom"]). " ". htmlspecialchars($membre["prenom"]); ?></h2>
	<form class="margin-top" action="?id=<?= $membre['id_membre']; ?>&action=update_subscription" method="POST">
	<fieldset>
		<legend>Mettre a jour l'abonnement</legend>
		<select class="padding-xs" name="id_abo" id="id_abo" autocomplete="off" required>
			<?php	foreach (getSubscriptionList() as $abonnement):	?>
				<option<?php ($abonnement["id_abo"] === $membre["id_abo"] ? print(" selected=\"selected\"") : "") ?> value="<?= $abonnement["id_abo"]; ?>"><?= $abonnement["nom"]; ?></option>
			<?php	endforeach;	?>
		</select>
		<button class="button">OK</button>
	</fieldset>
	</form>
	<div class="margin-top-xl">
		<a href="?id=<?= $membre['id_membre']; ?>&action=remove_subscription" class="button">Supprimer l'abonnement</a>
	</div>
</div>

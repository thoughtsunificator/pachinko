<div class="wrap">
	<h2>Modifier l'historique de <?= htmlspecialchars($membre["fiche_personne_nom"]). " ". htmlspecialchars($membre["prenom"]); ?></h2>
	<form method="GET" autocomplete="off" class="display-grid grid-auto-flow-row grid-row-gap margin-top">
		<input type="hidden" id="id"  name="id" value="<?= $membre['id_membre']; ?>">
		<input type="hidden" id="action"  name="action" value="add_anime">
		<div>
				<input type="text" class="padding-xs full-width" placeholder="Titre de l'anime, ex : Absolute Duo" id="title" name="title" value="">
		</div>
		<div>
			<button class="button">Rechercher</button>
		</div>
	</form>
</div>

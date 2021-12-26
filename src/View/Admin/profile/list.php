<div class="wrap">
	<h2>Results</h2>
	<div class="display-grid template-2column grid-gap margin-top-xl">
	<?php	while ($member = $statement->fetch()):	?>
			<div class="display-grid template-2col1frauto grid-gap">
				<h3><?= htmlspecialchars($member['nom']); ?> <?= htmlspecialchars($member['prenom']); ?></h3>
				<div class="display-grid template-2col grid-gap">
					<a href="?action=update_member&id_membre=<?= $member['id_membre']; ?>">Modifier le membre</a>
					<a href="?action=remove_member&id_membre=<?= $member['id_membre']; ?>">Supprimer le membre</a>
				</div>
			</div>
	<?php	endwhile;	?>
	</div>
</div>

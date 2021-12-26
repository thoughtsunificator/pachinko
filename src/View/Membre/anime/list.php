<div class="wrap">
	<h2>Resultat de la recherche</h2>
	<div class="display-grid template-2column grid-gap margin-top-xl">
	<?php	while ($anime = $statement->fetch()):	?>
			<div class="display-grid template-2col1frauto grid-gap">
				<h3><?= htmlspecialchars($anime['title']); ?></h3>
				<a href="?id=<?= $membre['id_membre']; ?>&action=add_anime&id_anime=<?= $anime['id_anime']; ?>" class="">Ajouter a l'historique</a>
			</div>
	<?php	endwhile;	?>
	</div>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
</div>

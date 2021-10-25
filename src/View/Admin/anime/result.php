<div class="wrap">
	<h2>Resultat de la recherche</h2>
	<div class="display-grid template-2column grid-gap margin-top-xl">
	<?php	while ($anime = $statement->fetch()):	?>
			<div class="display-grid template-2col1frauto grid-gap">
				<h3><?= $anime['title']; ?></h3>
				<div class="display-grid template-2col grid-gap">
					<a href="?action=update_anime&id_anime=<?= $anime['id_anime']; ?>" class="">Modifier l'anime</a>
					<a href="?action=remove_anime&id_anime=<?= $anime['id_anime']; ?>" class="">Supprimer l'anime</a>
				</div>
			</div>
	<?php	endwhile;	?>
	</div>
</div>

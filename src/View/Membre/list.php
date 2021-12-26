<div id="search-results" class="wrap">
	<h2>Resultat de la recherche</h2>
	<?php	if(count($results) >= 1):	?>
	<div class="results">
	<?php	foreach($results as $result):	?>
		<div class="result">
		<a href="/member/<?= $result->getField("membre")->getField('id_membre'); ?>">
			<img width="150" src="/resource/image/avatar/<?= $result->getField("avatar") !== null ? $result->getField("avatar") : "default.png"; ?>" alt="Image du media"></a>
			<div><?= $result->getField('nom'); ?> <?= $result->getField('prenom'); ?></div>
		</div>
	<?php	endforeach;	?>
	</div>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
	<?php	else:	?>
		<p>No results were found for this query.</p>
	<?php	endif;	?>
</div>

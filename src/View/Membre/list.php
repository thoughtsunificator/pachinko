<div id="search-results" class="wrap">
	<h2>Resultat de la recherche</h2>
	<?php	if(count($results) >= 1):	?>
	<div class="results">
	<?php	foreach($results as $result):	?>
		<div class="result">
		<a href="/member/<?= $result->getField("membre")->getField('id_membre'); ?>/<?= urlencode(htmlspecialchars($result->getField('nom'). " ". $result->getField('prenom')))?>">
			<?php
			$image = "/resource/image/avatar/default.png";
			if($result->getField("avatar") !== null && $result->getField("avatar") !== "") {
				if(str_starts_with($result->getField("avatar"), "http")) {
					$image = $result->getField("avatar");
				} else {
					$image = "/resource/image/avatar/". $result->getField("avatar");
				}
			}
			?>
			<img width="150" src="<?= htmlspecialchars($image) ?>" alt="Avatar du membre"></a>
			<div><?= htmlspecialchars($result->getField('nom')); ?> <?= htmlspecialchars($result->getField('prenom')); ?></div>
		</div>
	<?php	endforeach;	?>
	</div>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
	<?php	else:	?>
		<p>No results were found for this query.</p>
	<?php	endif;	?>
</div>

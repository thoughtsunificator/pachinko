<div id="profile-list" class="search-results wrap">
	<h2>Results</h2>
	<?php	if(count($results) >= 1):	?>
	<div class="results">
	<?php	foreach($results as $result):	?>
		<div class="result">
		<a href="/users/<?= $result->getField("membre")->getField('id_membre'); ?>/<?= $result->getSlug(); ?>">
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
			<img onerror="this.onerror=null; this.src='/resource/image/anime/default.png'" width="150" src="<?= htmlspecialchars($image) ?>" alt="Avatar du membre"></a>
			<div><?= htmlspecialchars($result->getField('nom')); ?> <?= htmlspecialchars($result->getField('prenom')); ?></div>
		</div>
	<?php	endforeach;	?>
	</div>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
	<?php	else:	?>
		<p>No results were found for this query.</p>
	<?php	endif;	?>
</div>

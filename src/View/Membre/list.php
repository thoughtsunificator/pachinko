<div class="wrap">
	<h2>Resultat de la recherche</h2>
	<div class="display-grid template-6col margin-top grid-gap">
	<?php	foreach($results as $result):	?>
		<div class="display-grid align-content-baseline justify-items-center grid-row-gap">
		<a class="bold color-white text-decoration-none hover-text-decoration-underline" href="/member/<?= $result->getField("membre")->getField('id_membre'); ?>"><img width="150" class="border-width-1 border-style-solid border-color-emperor" src="/resource/image/avatar/<?= $result->getField("avatar") !== null ? $result->getField("avatar") : "default.png"; ?>" alt="Image du media"></a>
			<div><?= $result->getField('nom'); ?> <?= $result->getField('prenom'); ?></div>
		</div>
	<?php	endforeach;	?>
	</div>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
</div>

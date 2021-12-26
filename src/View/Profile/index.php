<div id="profile-index" class="wrap">
	<?php if (isset($message)): ?>
	<p class="background-color-tomthumb padding-xs margin-bottom">
		<?=$message;?>
	</p>
	<?php endif; ?>
	<h2><?= htmlspecialchars($membre->getField("fiche_personne")->getField('nom')); ?> <?= htmlspecialchars($membre->getField("fiche_personne")->getField('prenom')); ?></h2>
	<div class="display-grid template-2colauto1fr grid-gap grid-column-gap-xxl margin-top">
		<?php
		$image = "/resource/image/avatar/default.png";
		if($membre->getField("fiche_personne")->getField("avatar") !== null && $membre->getField("fiche_personne")->getField("avatar") !== "") {
			if(str_starts_with($membre->getField("fiche_personne")->getField("avatar"), "http")) {
				$image = $membre->getField("fiche_personne")->getField("avatar");
			} else {
				$image = "/resource/image/avatar/". $membre->getField("fiche_personne")->getField("avatar");
			}
		}
		?>
		<img width="200" class="border-width-1 border-style-solid border-color-emperor" src="<?= htmlspecialchars($image) ?>" alt="User avatar">
		<div>
			Hello..
		</div>
	</div>
	<div class="margin-top-xl">	
		<section>
			<div class="display-grid template-2col1frauto">
				<h3>Anime vu</h3>
				<?php if (isset($user) && $user->getField("access_level") >= $config::$ACCESS_LEVEL_TO_MODIFY_HISTORY): ?>
				<div>
					<a href="?id=<?= $membre->getField('id_membre'); ?>&action=add_anime">Ajouter un anime à l'historique</a>
				</div>
				<?php endif;?>
			</div>
			<div class="display-grid template-4col grid-row-gap margin-top">
				<?php if (count($historique) >= 1): ?>
				<?php foreach ($historique as $anime): ?>
				<div>
					<div>
					<?php
					$image = "/resource/image/anime/default.png";
					if($anime->getField("cover") !== null && $anime->getField("cover") !== "") {
						if(str_starts_with($anime->getField("cover"), "http")) {
							$image = $anime->getField("cover");
						} else {
							$image = "/resource/image/anime/". $anime->getField("cover");
						}
					}
					?>
					<a href="anime-detail.php?id=<?= $anime->getField('id_anime'); ?>">
						<img width="150" src="<?= htmlspecialchars($image) ?>" alt="Anime cover">
					</a>
					</div>
					<div>
						<?= htmlspecialchars($anime->getField('title')); ?>
					</div>
					<?php if (isset($user) && $user->getField("access_level") >= $config::$ACCESS_LEVEL_TO_MODIFY_HISTORY): ?>
					<div>
						<a href="?id=<?= $membre->getField('id_membre'); ?>&action=remove_anime&id_anime=<?= $anime->getField('id_anime'); ?>">Supprimer</a>
					</div>
					<?php endif;?>
				</div>
				<?php endforeach; ?>
				<?php else: ?>
					<p>Aucun anime ajoutés à l'historique.</p>
				<?php endif; ?>
			</div>
		</section>
	</div>
</div>

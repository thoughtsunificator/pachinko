<div class="wrap">
	<?php if (isset($message) === true): ?>
	<p class="background-color-tomthumb padding-xs margin-bottom">
		<?=$message;?>
	</p>
	<?php endif; ?>
	<h2><?= $membre->getField("fiche_personne")->getField('nom'); ?> <?= $membre->getField("fiche_personne")->getField('prenom'); ?></h2>
	<div class="display-grid template-2colauto1fr grid-gap grid-column-gap-xxl margin-top">
		<img width="200" class="border-width-1 border-style-solid border-color-emperor" src="/resource/image/avatar/<?= $membre->getField("fiche_personne")->getField("avatar") !== null ? $membre->getField("fiche_personne")->getField("avatar") : "default.png"; ?>" alt="Image du anime">
		<div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Date de naissance</div>
				<div><?= $membre->getField("fiche_personne")->getField('date_naissance'); ?></div>
			</div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Email</div>
				<div><?= $membre->getField("fiche_personne")->getField('email'); ?></div>
			</div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Adresse</div>
				<div><?= $membre->getField("fiche_personne")->getField('adresse'); ?></div>
			</div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Code postal</div>
				<div><?= $membre->getField("fiche_personne")->getField('cpostal'); ?></div>
			</div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Ville</div>
				<div><?= $membre->getField("fiche_personne")->getField('ville'); ?></div>
			</div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Pays</div>
				<div><?= $membre->getField("fiche_personne")->getField('pays') !== null ? $membre->getField("fiche_personne")->getField('pays') : ""; ?></div>
			</div>
			<div class="display-grid template-2col1frauto border-width-1 border-style-solid border-bottom border-color-gray padding-vertical-2xs">
				<div class="bold">Abonnement</div>
				<div><?= $membre->getField('id_abo') !== null ? $membre->getField('abonnement')->getField("nom") : "Non abonné(e)"; ?> 
				<?php if (isset($user) === true && $user->getField("access_level") >= $config::$ACCESS_LEVEL_TO_MODIFY_SUBSCRIPTION): ?>
				(<a href="?id=<?= $membre->getField('id_membre'); ?>&action=update_subscription">Modifier l'abonnement</a>)
				<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="margin-top-xl">	
		<section>
			<div class="display-grid template-2col1frauto">
				<h3>Anime vu</h3>
				<?php if (isset($user) === true && $user->getField("access_level") >= $config::$ACCESS_LEVEL_TO_MODIFY_HISTORY): ?>
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
					<a href="anime-detail.php?id=<?= $anime->getField('id_anime'); ?>"><img width="150" src="./resource/image/anime/<?= $anime->getField("cover") !== null && $anime->getField("cover") !== "" ? $anime->getField("cover") : "default.png"; ?>" alt="Image du anime"></a>
					</div>					
					<div>
						<?= $anime->getField('title'); ?>
					</div>
					<?php if (isset($user) === true && $user->getField("access_level") >= $config::$ACCESS_LEVEL_TO_MODIFY_HISTORY): ?>
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

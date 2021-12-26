<div id="anime-index" class="wrap">
	<?php if (isset($message)): ?>
	<p class="background-color-tomthumb padding-xs margin-bottom">
		<?= $message;?>
	</p>
	<?php endif?>
	<div class="display-grid template-2colauto1fr grid-column-gap-xxl">
		<div class="display-grid grid-auto-rows-maxcontent">
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
			<img src="<?= htmlspecialchars($image) ?>" alt="Anime cover">
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">Type</div>
				<div><a href="/search/anime?type=<?= $anime->getField('type') ?>"><?= $anime->getField('type') ?></a></div>
			</div>
			<?php if($anime->getField('premiered') !== null):?>
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">Premiere</div>
				<div><?= htmlspecialchars($anime->getField('premiered')) ?></div>
			</div>
			<?php endif?>
			<?php if($anime->getField('start_date') !== null):?>
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">Start date</div>
				<div><?= htmlspecialchars($anime->getField('start_date')) ?></div>
			</div>
			<?php endif?>
			<?php if($anime->getField('end_date') !== null):?>
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">End date</div>
				<div><?= htmlspecialchars($anime->getField('end_date')) ?></div>
			</div>
			<?php endif?>
			<?php if($anime->getField('duration') !== null):?>
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">Duration</div>
				<div><?= htmlspecialchars($anime->getField('duration')) ?></div>
			</div>
			<?php endif?>
			<?php if($anime->getField('episodes') !== null):?>
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">Episodes</div>
				<div><?= htmlspecialchars($anime->getField('episodes')) ?></div>
			</div>
			<?php endif?>
			<div class="border-width-1 border-style-solid border-bottom padding-vertical-2xs">
				<div class="color-silver">Status</div>
				<div><?= htmlspecialchars($anime->getField('status')) ?></div>
			</div>
		</div>
		<div>
			<h2 class="color-anakiwa"><?= htmlspecialchars($anime->getField('title')) ?></h2>
			<section class="margin-top">
				<h3>Synopsis</h3>
				<p class="margin-top font-style-italic">
				<?php if($anime->getField('synopsis') !== null): ?>
				<?= htmlspecialchars($anime->getField('synopsis')) ?>
				<?php else:?>
				Pas de synopsis pour le moment.
				<?php endif?>
				</p>
			</section>
			<div class="margin-top border-width-1 border-style-solid border-top padding-vertical display-grid template-2col grid-gap-xxs">
					<?php if(count($genres) >= 1): ?>
					<div><u>Genre</u> :<div><?= implode(", ", array_map(function($meta) {
						return "<a href='/search/anime?genre[]=".htmlspecialchars($meta->getField("value"))."'>".htmlspecialchars($meta->getField("value"))."</a>";
					}, $genres))	?></div></div>
					<?php endif?>
					<?php if(count($synonyms) >= 1): ?>
					<div><u>Synonyms</u> :<div><?= implode(", ", array_map(function($meta) {
						return htmlspecialchars($meta->getField("value"));
					}, $synonyms))	?></div></div>
					<?php endif?>
					<?php if(count($producers) >= 1): ?>
					<div><u>Producer</u> :<div><?= implode(", ", array_map(function($meta) {
						return "<a href='/search/anime?producer=".htmlspecialchars($meta->getField("value"))."'>".htmlspecialchars($meta->getField("value"))."</a>";
					}, $producers))	?></div></div>
					<?php endif?>
					<?php if(count($studios) >= 1): ?>
					<div><u>Studio</u> :<div><?= implode(", ", array_map(function($meta) {
						return "<a href='/search/anime?studio=".htmlspecialchars($meta->getField("value"))."'>".htmlspecialchars($meta->getField("value"))."</a>";
					}, $studios))	?></div></div>
					<?php endif?>
			</div>
			<div class="margin-top"><h3>Trailer</h3>
			<?php if ($anime->getField('trailer') !== null) :?>
			<iframe class="margin-top" src="<?= htmlspecialchars($anime->getField('trailer')) ?>" allowfullscreen="" width="625" height="455" frameborder="0">_YL7t_QbQ2M</iframe>
			<?php else:?>
			<p class="margin-top">No trailer found.</p>
			<?php endif?>
			</div>
			<div class="margin-top">
				<h3>Episodes</h3>
				<?php if (count($episodes) >= 0):?>
				<p class="margin-top">Streaming not available for this anime.</p>
				<?php endif?>
			</div>
		</div>
	</div>
	<div class="display-grid grid-gap margin-top-xl">
	<div class="margin-top-xl">
		<h2>Reviews..</h2>
		<?php if (count($reviews) >= 1): ?>
			<div class="display-grid grid-gap margin-top">
			<?php while ($review = $reviews->fetch()): ?>
			<div class="margin-bottom padding-xs background-color-zambezi">
				<div class="display-grid grid-gap">
					<div class="display-grid grid-gap">
					<div class="display-grid template-2col1frauto">
					<b><?= (htmlspecialchars($review['fiche_personne_nom']) !== null ? (htmlspecialchars($review['fiche_personne_nom']). " " .htmlspecialchars($review['fiche_personne_prenom'])) : "Anonymous") ?></b>
					<div>
					<a href="?id=<?= $anime->getField('id_anime') ?>&action=remove_review&id_historique=<?= $review["id_historique"] ?>">Supprimer</a>
				</div>
					</div>
						<div>
							<img  width="60"  src="<?= htmlspecialchars($review['avatar']) !== null ? ("./resource/image/avatar/". $review["avatar"]) : ("https://api.adorable.io/avatars/70/". urlencode(htmlspecialchars($review['fiche_personne_nom'])) . "@adorable.png") ?>" alt="Avatar">
						</div>
					</div>
				<div class="padding-xs background-color-hurricane"><?= htmlspecialchars($review['avis']) ?></div>
				<?php if (isset($user) && $user["access_level"] >= ACCESS_LEVEL_ADMINISTRATOR): ?>
				<?php endif?>
		</div>
	</div>
	<?php endwhile ?>
	</div>
	<?php else: ?>
	<p class="margin-top">No reviews were found for this anime.</p>
	<?php endif ?>
	<div class="margin-top">
		<form class="margin-top" action="?id=<?= $anime->getField('id_anime') ?>&action=add_review" method="POST">
			<h3>It's your turn.</h3>
			<div class="margin-top">
					<textarea class="full-width background-color-mineshaft border-width-1 border-style-solid border-color-emperor color-white padding-xs" name="review" id="review" required minlength="10"></textarea>
			</div>
			<div class="display-grid justify-content-flexend margin-top">
					<button class="button">Send</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>

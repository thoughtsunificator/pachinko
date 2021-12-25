<div class="wrap">
	<h2>Rechercher un anime</h2>
	<form id="form" class="display-grid grid-auto-flow-row grid-row-gap margin-top-xl" action="/search/anime" method="GET" autocomplete="off">
		<input type="hidden" name="sort" value="title">
		<input type="hidden" name="order" value="asc">
		<div>
			<label for="title">
				Titre : 
				<div class="margin-top display-grid grid-auto-flow-column template-2col1frauto">
					<input type="text" class="padding full-width" placeholder="Titre de l'anime, ex : Absolute Duo" id="title" name="title" value="">
					<button class="background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Rechercher</button>
				</div>
			</label>
		</div>		
		<div>
			<label for="type">
					Type : 
					<select class="margin-top padding-xs full-width" name="type" id="type">
						<option value="">Sélectionner un type</option>
						<?php foreach ($types as $type): ?>
						<option value="<?= $type->getField("type"); ?>"><?= $type->getField("type") ?></option>
						<?php endforeach; ?>
					</select>
			</label>
		</div>
		<div>
				Genre : 
					<div class="margin-top display-grid template-5col padding background-color-mineshaft">
						<?php foreach ($genres as $genre): ?>
						<div>
							<label for="genre-<?= $genre->getField("value") ?>">
									<input type="checkbox" id="genre-<?= $genre->getField("value") ?>" name="genre[]" value="<?= $genre->getField("value") ?>">
									<?= $genre->getField("value") ?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
		</div>
		<div>
			<label for="producer">
					Producteur : 
					<select class="margin-top padding-xs full-width" name="producer" id="producer">
						<option value="">Sélectionner un producteur</option>
						<?php foreach ($producers as $producer): ?>
						<option value="<?= $producer->getField("value") ?>"><?= $producer->getField("value") ?></option>
						<?php endforeach; ?>
					</select>
			</label>
		</div>
		<div>
			<label for="studio">
					Studio :
					<select class="margin-top padding-xs full-width" name="studio" id="studio">
						<option value="">Sélectionner un studio</option>
						<?php foreach ($studios as $studio): ?>
						<option value="<?= $studio->getField("value") ?>"><?= $studio->getField("value") ?></option>
						<?php endforeach; ?>
					</select>
			</label>
		</div>
		<div>
			<label for="start_date">
				Date debut affiche : 
				<input class="margin-top padding-xs full-width" type="date" name="start_date" id="start_date" value="">
			</label>
		</div>
		<div>
			<label for="end_date">
				Date fin affiche : 
				<input class="margin-top padding-xs full-width" type="date" name="end_date" id="end_date" value="">
			</label>
		</div>
		<div class="display-grid grid-auto-flow-column justify-content-spacebetween">
			<button class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Rechercher</button>
			<button class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" type="reset">Reset</button>
		</div>
	</form>
</div>

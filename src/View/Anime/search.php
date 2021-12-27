<div id="anime-search" class="wrap">
	<h2>Search anime</h2>
	<form id="form" class="display-grid grid-auto-flow-row grid-row-gap margin-top-xl" action="/search/anime" method="GET" autocomplete="off">
		<input type="hidden" name="sort" value="title">
		<input type="hidden" name="order" value="asc">
		<div>
			<label for="title">
				Title :
				<div class="margin-top">
					<input type="text" class="padding full-width" placeholder="Anime title, e.g : Absolute Duo" id="title" name="title" value="">
				</div>
			</label>
		</div>
		<div>
			<label for="type">
					Type :
					<select class="margin-top padding-xs full-width" name="type" id="type">
						<option value="">Type</option>
						<?php foreach ($types as $type): ?>
						<option value="<?= htmlspecialchars($type->getField("type")); ?>"><?= htmlspecialchars($type->getField("type")) ?></option>
						<?php endforeach; ?>
					</select>
			</label>
		</div>
		<div>
				Genre :
					<div style="background-color: #2b2727" class="margin-top display-grid template-5col padding">
						<?php foreach ($genres as $genre): ?>
						<div>
							<label for="genre-<?= $genre->getField("value") ?>">
									<input type="checkbox" id="genre-<?= $genre->getField("value") ?>" name="genre[]" value="<?= htmlspecialchars($genre->getField("value")) ?>">
									<?= htmlspecialchars($genre->getField("value")) ?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
		</div>
		<div>
			<label for="producer">
					Producer :
					<select class="margin-top padding-xs full-width" name="producer" id="producer">
						<option value="">Producer</option>
						<?php foreach ($producers as $producer): ?>
						<option value="<?= htmlspecialchars($producer->getField("value")) ?>"><?= htmlspecialchars($producer->getField("value")) ?></option>
						<?php endforeach; ?>
					</select>
			</label>
		</div>
		<div>
			<label for="studio">
					Studio :
					<select class="margin-top padding-xs full-width" name="studio" id="studio">
						<option value="">Studio</option>
						<?php foreach ($studios as $studio): ?>
						<option value="<?= htmlspecialchars($studio->getField("value")) ?>"><?= htmlspecialchars($studio->getField("value")) ?></option>
						<?php endforeach; ?>
					</select>
			</label>
		</div>
		<div>
			<label for="start_date">
				Start date :
				<input class="margin-top padding-xs full-width" type="date" name="start_date" id="start_date" value="">
			</label>
		</div>
		<div>
			<label for="end_date">
				End date :
				<input class="margin-top padding-xs full-width" type="date" name="end_date" id="end_date" value="">
			</label>
		</div>
		<div class="display-grid grid-auto-flow-column justify-content-spacebetween">
			<button class="button">Search</button>
			<button class="button" type="reset">Reset</button>
		</div>
	</form>
</div>

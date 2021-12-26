<div class="wrap">
	<h2>Add anime</h2>
	<form class="margin-top" name="add_anime" method="POST">
		<div class="display-grid template-2col grid-gap">
			<label for="type">Type :
				<select class="padding-xs full-width" name="type" id="type" required>
					<option value="">Type</option>
					<option value="TV">TV</option>
					<option value="Movie">Movie</option>
					<option value="ONA">ONA</option>
					<option value="Music">Music</option>
					<option value="Special">Special</option>
					<option value="OVA">OVA</option>
					<option value="Unknown">Unknown</option>
				</select>
			</label>
			<label for="title">Title :
				<input class="padding-xs full-width" type="text" name="title" id="title" required>
			</label>
			<label for="synopsis">Synopsis :
				<input class="padding-xs full-width" type="text" name="synopsis" id="synopsis">
			</label>
			<label for="start_date">Date de debut :
				<input class="padding-xs full-width" type="date" name="start_date" id="start_date">
			</label>
			<label for="end_date">Date de fin :
				<input class="padding-xs full-width" type="date" name="end_date" id="end_date">
			</label>
			<label for="duration">Duration :
				<input class="padding-xs full-width" type="text" name="duration" id="duration">
			</label>
			<label for="cover">Cover :
				<input class="padding-xs full-width" type="text" name="cover" id="cover" placeholder="Cover image URL">
			</label>
			<label for="status">Status :
				<select class="padding-xs full-width" name="status" id="status" required>
					<option value="">Select a status</option>
					<option value="Finished Airing">Finished Airing</option>
					<option value="Currently Airing">Currently Airing</option>
					<option value="Not yet aired">Not yet aired</option>
				</select>
			</label>
			<label for="episodes">Episodes :
				<input class="padding-xs full-width" type="number" name="episodes" id="episodes" placeholder="Episodes count">
			</label>
			<label for="trailer">Trailer :
				<input class="padding-xs full-width" type="url" name="trailer" id="trailer" placeholder="https://www.youtube.com/embed...">
			</label>
			<label for="source">Source :
				<input class="padding-xs full-width" type="text" name="source" id="source" placeholer="ex : Game">
			</label>
			<label for="premiered">Premiered :
				<input class="padding-xs full-width" type="text" name="premiered" id="premiered" placeholer="ex : Fall 2006">
			</label>
			<label for="genres">Genres :
				<input class="padding-xs full-width" type="text" name="genres" id="genres" placeholder="comma-separated; e.g : Action, Mecha, Sci-Fi, Seinen">
			</label>
			<label for="producers">Producers :
				<input class="padding-xs full-width" type="text" name="producers" id="producers" placeholder="comma-separated">
			</label>
			<label for="studios">Studios :
				<input class="padding-xs full-width" type="text" name="studios" id="studios" placeholder="comma-separated">
			</label>
			<label for="synonyms">Synonyms :
				<input class="padding-xs full-width" type="text" name="synonyms" id="synonyms" placeholder="comma-separated">
			</label>
		</div>
	<div class="margin-top">
			<button class="button">Add</button>
			<button type="reset" class="button">Reset</button>
	</div>
	</form>
</div>

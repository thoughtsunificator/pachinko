<div class="wrap">
	<form name="add_anime" method="POST">
		<div class="display-grid template-2col grid-gap">
			<label for="type">Type : 
				<select class="padding-xs full-width" name="type" id="type" required>
					<option value="">Sélectionner un type</option>
					<option<?php ($anime["type"] === "TV" ? print(" selected") : "")?> value="TV">TV</option>
					<option<?php ($anime["type"] === "Movie" ? print(" selected") : "")?> value="Movie">Movie</option>
					<option<?php ($anime["type"] === "ONA" ? print(" selected") : "")?> value="ONA">ONA</option>
					<option<?php ($anime["type"] === "Music" ? print(" selected") : "")?> value="Music">Music</option>
					<option<?php ($anime["type"] === "Special" ? print(" selected") : "")?> value="Special">Special</option>
					<option<?php ($anime["type"] === "OVA" ? print(" selected") : "")?> value="OVA">OVA</option>
					<option<?php ($anime["type"] === "Unknown" ? print(" selected") : "")?> value="Unknown">Unknown</option>
				</select>
			</label>
			<label for="title">Titre : 
				<input class="padding-xs full-width" type="text" name="title" id="title" value="<?= htmlspecialchars($anime["title"]) ?>" required>
			</label>
			<label for="synopsis">Synopsis :
				<input class="padding-xs full-width" type="text" name="synopsis" id="synopsis" value="<?= htmlspecialchars($anime["synopsis"]) ?>">
			</label>
			<label for="start_date">Date de debut :
				<input class="padding-xs full-width" type="date" name="start_date" id="start_date" value="<?= htmlspecialchars($anime["start_date"]) ?>">
			</label>
			<label for="end_date">Date de fin :
				<input class="padding-xs full-width" type="date" name="end_date" id="end_date" value="<?= htmlspecialchars($anime["end_date"]) ?>">
			</label>
			<label for="duration">Durée :
				<input class="padding-xs full-width" type="text" name="duration" id="duration" value="<?= htmlspecialchars($anime["duration"]) ?>">
			</label>
			<label for="cover">Cover :
				<input class="padding-xs full-width" type="text" name="cover" id="cover" placeholder="URL de la cover" value="<?= htmlspecialchars($anime["cover"]) ?>">
			</label>
			<label for="status">Status : 
				<select class="padding-xs full-width" name="status" id="status" required>
					<option value="">Sélectionner un status</option>
					<option<?php ($anime["status"] === "Finished Airing" ? print(" selected") : "")?> value="Finished Airing">Finished Airing</option>
					<option<?php ($anime["status"] === "Currently Airing" ? print(" selected") : "")?> value="Currently Airing">Currently Airing</option>
					<option<?php ($anime["status"] === "Not yet aired" ? print(" selected") : "")?> value="Not yet aired">Not yet aired</option>
				</select>
			</label>
			<label for="episodes">Episodes : 
				<input class="padding-xs full-width" type="number" name="episodes" id="episodes" placeholder="Nombre d'episodes" value="<?= htmlspecialchars($anime["episodes"]) ?>">
			</label>	
			<label for="trailer">Trailer : 
				<input class="padding-xs full-width" type="url" name="trailer" id="trailer" placeholder="https://www.youtube.com/embed..." value="<?= htmlspecialchars($anime["trailer"]) ?>">
			</label>		
			<label for="source">Source : 
				<input class="padding-xs full-width" type="text" name="source" id="source" placeholer="ex : Game" value="<?= htmlspecialchars($anime["source"]) ?>">
			</label>
			<label for="premiered">Premiered : 
				<input class="padding-xs full-width" type="text" name="premiered" id="premiered" placeholer="ex : Fall 2006" value="<?= htmlspecialchars($anime["premiered"]) ?>">
			</label>	
<!-- 			<label for="genres">Genres :
				<input class="padding-xs full-width" type="text" name="genres" id="genres" placeholder="Separes par une virgule; ex : Action, Mecha, Sci-Fi, Seinen" value="<?= implode(", ", $metas["genre"]) ?>">
			</label>
			<label for="producers">Producers : 
				<input class="padding-xs full-width" type="text" name="producers" id="producers" placeholder="Separes par une virgule" value="<?= implode(", ", $metas["producer"]) ?>">
			</label>
			<label for="studios">Studios : 
				<input class="padding-xs full-width" type="text" name="studios" id="studios" placeholder="Separes par une virgule" value="<?= implode(", ", $metas["studio"]) ?>">
			</label>
			<label for="synonyms">Synonyms : 
				<input class="padding-xs full-width" type="text" name="synonyms" id="synonyms" placeholder="Separes par une virgule" value="<?= implode(", ", $metas["synonym"]) ?>">
			</label>	 -->
		</div>
	<div class="margin-top">
			<button class="padding-xs" name="update">Modifier</button>
	</div>
	</form>
</div>

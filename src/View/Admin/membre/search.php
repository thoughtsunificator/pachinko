<div class="wrap">
	<h2 class="margin-bottom-xl">Modifier un membre</h2>
	<form id="form" class="display-grid grid-auto-flow-row grid-row-gap" method="POST" autocomplete="off">
		<div>
			<label for="nom">
					Nom : 
			<input class="padding-xs full-width" type="text" name="nom" id="nom" value="" placeholder="ex : Hiromu">
			</label>
		</div>
		<div>
			<label for="prenom">
				Prenom : 
			</label>
			<input class="padding-xs full-width" type="text" name="prenom" id="prenom" value="" placeholder="ex : Akita">
		</div>
		<div>
			<label for="age">
					Age : 
			</label>
			<input class="padding-xs full-width" type="number" name="age" id="age" value="" placeholder="ex : 18">
		</div>
		<div>
			<button class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Rechercher</button>
			<button class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" type="reset">Reset</button>
		</div>
	</form>
</div>

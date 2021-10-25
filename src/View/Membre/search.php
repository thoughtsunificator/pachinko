<div class="wrap">
	<h2>Rechercher un membre</h2>
	<form id="form" class="display-grid grid-auto-flow-row grid-row-gap margin-top-xl" action="/search/member" method="GET" autocomplete="off">
		<div>
			<label for="nom">
					Nom : 
			<input class="margin-top padding-xs full-width" type="text" name="nom" id="nom" value="" placeholder="ex : Hiromu">
			</label>
		</div>
		<div>
			<label for="prenom">
				Prenom : 
			</label>
			<input class="margin-top padding-xs full-width" type="text" name="prenom" id="prenom" value="" placeholder="ex : Akita">
		</div>
		<div>
			<button class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Rechercher</button>
			<button class="padding-vertical-small padding-horizontal background-color-dustygray border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2" type="reset">Reset</button>
		</div>
	</form>
</div>

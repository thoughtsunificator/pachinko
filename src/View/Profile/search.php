<div id="profile-search" class="wrap">
	<h2>Search users</h2>
	<form id="form" class="display-grid grid-auto-flow-row grid-row-gap margin-top-xl" action="/search/users" method="GET" autocomplete="off">
		<div>
			<label for="query">
					Query :
			<input class="margin-top padding-xs full-width" type="text" name="query" id="query" value="" placeholder="ex : Hiromu">
			</label>
		</div>
		<div>
			<button class="button">Search</button>
			<button class="button" type="reset">Reset</button>
		</div>
	</form>
</div>

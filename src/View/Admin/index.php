<div class="wrap">
	<h2>Administration</h2>
	<?php if (isset($message)):?>
	<div class="margin-top<?= isset($success) && $success ? " background-color-tomthumb" : " background-color-tosca" ?> padding-xs margin-bottom">
		<?= $message; ?>
	</div>
	<?php endif;?>
	<div class="margin-top-xl display-grid grid-gap template-2col">
		<div>
			<h3>Anime</h3>
			<div class="margin-top display-grid grid-gap">
				<a href="/admin/anime/add" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Add</a>
				<a href="/admin/anime/update" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Update / Delete</a>
			</div>
		</div>
		<div>
			<h3>Users</h3>
			<div class="margin-top display-grid grid-gap">
				<a href="/admin/user/add" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Add</a>
				<a href="/admin/user/update" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Update / Delete</a>
			</div>
		</div>
		<div>
			<h3>Profiles</h3>
			<div class="margin-top display-grid grid-gap">
				<a href="/admin/member/add" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Add</a>
				<a href="/admin/member/update" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Update / Delete</a>
			</div>
		</div>
		<div>
			<h3>Episode</h3>
			<div class="margin-top display-grid grid-gap">
				<a href="/admin/episode/add" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Add</a>
				<a href="/admin/episode/update" class="text-decoration-none padding background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour hover-background-color-dustygray2">Update / Delete</a>
			</div>
		</div>
	</div>
</div>

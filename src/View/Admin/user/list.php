<div class="wrap">
	<h2>Results</h2>
	<div class="display-grid template-2column grid-gap margin-top-xl">
	<?php	while ($user = $statement->fetch()):	?>
			<div class="display-grid template-2col1frauto grid-gap">
				<h3><?= htmlspecialchars($user['username']); ?></h3>
				<div class="display-grid template-2col grid-gap">
					<a href="?action=update_user&id_user=<?= $user['id_user']; ?>">Update user</a>
					<a href="?action=remove_user&id_user=<?= $user['id_user']; ?>">Delete user</a>
				</div>
			</div>
	<?php	endwhile;	?>
	</div>
</div>

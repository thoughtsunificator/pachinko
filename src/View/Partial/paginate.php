<nav class="pagination">
	<?php if (isset($page) && is_numeric($page) && $page >= 2): ?>
		<a href="?<?= http_build_query(array_merge( $_GET, array( 'page' => (isset($page) && is_numeric($page) ?  ($page - 1) : 1)))); ?>">Precedent</a>
	<?php endif;?>
	<?php
	for ($i=($page >= $config::$RESULTS_PER_PAGE ? (($page + $config::$RESULTS_PER_PAGE) <= ($totalPage) ? ($page - 8) : ($totalPage - $config::$RESULTS_PER_PAGE)) : 0); $i < ($page >= $config::$RESULTS_PER_PAGE ? (($page + $config::$RESULTS_PER_PAGE) <= ($totalPage) ? ($page + 8) : $totalPage) : ($totalPage < $config::$RESULTS_PER_PAGE ? $totalPage : $config::$RESULTS_PER_PAGE)); $i++):?>
		<a class="text-decoration-none padding-vertical-small padding-horizontal <?= (($i + 1) === $page) ? "background-color-zambezi" : "background-color-mineshaft" ?> border-width-1 border-style-solid border-color-dustygray2 color-bonjour" href="?<?= http_build_query(array_merge( $_GET, array( 'page' => $i + 1))); ?>"><?= $i + 1 ?></a>
	<?php endfor; ?>
	<?php if (isset($page) && is_numeric($page) && $page < $totalPage): ?>
		<a href="?<?= http_build_query(array_merge( $_GET, array( 'page' => (isset($page) && is_numeric($page) ?  ($page + 1) : 2)))); ?>">Suivant</a>
	<?php endif;?>
</nav>

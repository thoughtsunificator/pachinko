<nav class="pagination">
	<?php if (isset($page) && is_numeric($page) && $page >= 2): ?>
		<a href="?<?= http_build_query(array_merge( $_GET, array( 'page' => (isset($page) && is_numeric($page) ?  ($page - 1) : 1)))); ?>">Precedent</a>
	<?php endif;?>
	<?php
	$startPageIndex = max(0, $page - round($config::$PAGES_SHOWN / 2));
	$left = $config::$PAGES_SHOWN - abs($page - ($startPageIndex));
	$endPageIndex = min($totalPage, $page + $left);
	for ($i = $startPageIndex; $i < $endPageIndex; $i++):?>
		<a class="<?= (($i + 1) == $page) ? "active" : "" ?>" href="?<?= http_build_query(array_merge( $_GET, array( 'page' => $i + 1))); ?>"><?= $i + 1 ?></a>
	<?php endfor; ?>
	<?php if (isset($page) && is_numeric($page) && $page < $totalPage): ?>
		<a href="?<?= http_build_query(array_merge( $_GET, array( 'page' => (isset($page) && is_numeric($page) ?  ($page + 1) : 2)))); ?>">Suivant</a>
	<?php endif;?>
</nav>

<!-- TODO work in progress -->
<nav class="display-grid grid-auto-flow-column grid-auto-columns-maxcontent align-content-center align-items-center margin-top-xl justify-content-center">
	<?php if (isset($page) === true && is_numeric($page) && $page >= 2): ?>
		<a class="text-decoration-none padding-vertical-small padding-horizontal background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour" href="?<?= http_build_query(array_merge( $_GET, array( 'page' => (isset($page) === true && is_numeric($page) ?  ($page - 1) : 1)))); ?>">Precedent</a>
	<?php endif;?>
	<?php 		
	for ($i=($page >= $config::$results_per_page ? (($page + $config::$results_per_page) <= ($totalPage) ? ($page - 8) : ($totalPage - $config::$results_per_page)) : 0); $i < ($page >= $config::$results_per_page ? (($page + $config::$results_per_page) <= ($totalPage) ? ($page + 8) : $totalPage) : ($totalPage < $config::$results_per_page ? $totalPage : $config::$results_per_page)); $i++):?>
		<a class="text-decoration-none padding-vertical-small padding-horizontal <?= (($i + 1) === $page) ? "background-color-zambezi" : "background-color-mineshaft" ?> border-width-1 border-style-solid border-color-dustygray2 color-bonjour" href="?<?= http_build_query(array_merge( $_GET, array( 'page' => $i + 1))); ?>"><?= $i + 1 ?></a>
	<?php endfor; ?>
	<?php if (isset($page) === true && is_numeric($page) && $page < $totalPage): ?>
		<a class="text-decoration-none padding-vertical-small padding-horizontal background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour" href="?<?= http_build_query(array_merge( $_GET, array( 'page' => (isset($page) === true && is_numeric($page) ?  ($page + 1) : 2)))); ?>">Suivant</a>
	<?php endif;?>
</nav>

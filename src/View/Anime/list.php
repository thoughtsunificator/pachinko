<?php
use \Core\Request;
$filterA = array_merge( $_GET, array( 'sort' => "title" ));
$filterB = array_merge( $_GET, array( 'sort' => "start_date" ));
if (isset(Request::$params["order"]) && (in_array(Request::$params["order"], ["asc", "desc"]))) {
	$order = Request::$params["order"] === "asc" ? "desc" : "asc";
} else {
	$order = "desc";
}
$filterA["order"] = $order;
$filterB["order"] = $order;
?>

<div id="search-results" class="wrap">
	<h2>Resultat de la recherche</h2>
	<?php	if(count($results) >= 1):	?>
	<div class="filters">
		<span>
		Trier par:
		</span>
		<a class="filter" href="?<?= http_build_query($filterA) ?>">Titre</a>
		<a class="filter" href="?<?= http_build_query($filterB) ?>">Date</a>
	</div>
	<div class="results">
		<?php	foreach($results as $anime):	?>
			<div class="result">
			<a href="/anime/<?=$anime->getField('id_anime');?>"><img width="150" src="/resource/image/anime/<?= $anime->getField("cover") !== null && $anime->getField("cover") !== "" ? $anime->getField("cover") : "default.png"; ?>" alt="Image du anime"></a>
				<div>
					<?= $anime->getField('title'); ?>
				</div>
			</div>
		<?php	endforeach;	?>
	</div>
	<?php	else:	?>
		<p>No results were found for this query.</p>
	<?php	endif;	?>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
</div>

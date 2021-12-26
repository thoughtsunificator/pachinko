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

<div id="anime-list" class="search-results wrap">
	<h2>Results</h2>
	<?php	if(count($results) >= 1):	?>
	<div class="filters">
		<span>
		Trier par:
		</span>
		<a class="filter" href="?<?= http_build_query($filterA) ?>">Title</a>
		<a class="filter" href="?<?= http_build_query($filterB) ?>">Date</a>
	</div>
	<div class="results">
		<?php	foreach($results as $anime):	?>
			<div class="result">
			<?php
			$image = "/resource/image/anime/default.png";
			if($anime->getField("cover") !== null && $anime->getField("cover") !== "") {
				if(str_starts_with($anime->getField("cover"), "http")) {
					$image = $anime->getField("cover");
				} else {
					$image = "/resource/image/anime/". $anime->getField("cover");
				}
			}
			?>
			<a href="/anime/<?=$anime->getField('id_anime');?>/<?= urlencode(htmlspecialchars($anime->getField("title"))) ?>">
				<img width="150" src="<?= htmlspecialchars($image) ?>" alt="Anime cover"></a>
				<div>
					<?= htmlspecialchars($anime->getField('title')); ?>
				</div>
			</div>
		<?php	endforeach;	?>
	</div>
	<?php	else:	?>
		<p>No results were found for this query.</p>
	<?php	endif;	?>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
</div>

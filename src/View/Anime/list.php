<div id="search-results" class="wrap">
	<h2>Resultat de la recherche</h2>
	<?php	if(count($results) >= 1):	?>
	<div class="filters">
		<span>
		Trier par:
		</span>
		<a class="filter" href="?<?= http_build_query(array_merge( $_GET, array( 'sort' => "title", 'order' => (isset($_GET["order"]) === true && $_GET["order"] === "asc" ? "desc" : (isset($_GET["order"]) === true && $_GET["order"] === "desc" ? "asc" : "desc") )))) ?>">Titre</a>
		<a class="filter" href="?<?= http_build_query(array_merge( $_GET, array( 'sort' => "start_date", 'order' => (isset($_GET["order"]) === true && $_GET["order"] === "asc" ? "desc" : (isset($_GET["order"]) === true && $_GET["order"] === "desc" ? "asc" : "desc") )))) ?>">Date</a>
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

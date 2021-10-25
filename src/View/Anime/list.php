<div class="wrap">
	<h2>Resultat de la recherche</h2>
	<div class="margin-top-xl padding-bottom border-width-1 border-bottom border-style-solid border-color-dustygray2">
		<span>
		Trier par: 
		</span>
		<a class="text-decoration-none padding-horizontal background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour" href="?<?= http_build_query(array_merge( $_GET, array( 'sort' => "title", 'order' => (isset($_GET["order"]) === true && $_GET["order"] === "asc" ? "desc" : (isset($_GET["order"]) === true && $_GET["order"] === "desc" ? "asc" : "desc") )))) ?>">Titre</a>
		<a class="text-decoration-none padding-horizontal background-color-zambezi border-width-1 border-style-solid border-color-dustygray2 color-bonjour" href="?<?= http_build_query(array_merge( $_GET, array( 'sort' => "start_date", 'order' => (isset($_GET["order"]) === true && $_GET["order"] === "asc" ? "desc" : (isset($_GET["order"]) === true && $_GET["order"] === "desc" ? "asc" : "desc") )))) ?>">Date</a>
	</div>
	<div class="display-grid template-5col margin-top grid-gap">
		<?php	foreach($results as $anime):	?>
			<div class="display-grid align-content-baseline justify-items-center grid-row-gap">
			<a href="/anime/<?=$anime->getField('id_anime');?>"><img width="150" class="border-width-1 border-style-solid border-color-gray" src="/resource/image/anime/<?= $anime->getField("cover") !== null && $anime->getField("cover") !== "" ? $anime->getField("cover") : "default.png"; ?>" alt="Image du anime"></a>
				<div>
					<?= $anime->getField('title'); ?>
				</div>
			</div>
		<?php	endforeach;	?>
	</div>
	<?php include(__DIR__ . "/../Partial/paginate.php"); ?>
</div>

<?php

namespace Controller;

use \Core\Controller;
use \Core\Core;
use \Core\Request;
use \Core\ORM;
use \Core\Config;
use \Model\AnimeMeta;
use \Model\Anime;
use \Model\HistoriqueMembre;

class AnimeController extends Controller {

	/**
	 * GET /anime/{id}
	 */
	public function index($id) {
		$anime = Anime::findOne([
			"where" => ["id_anime" => $id]
		]);
		if ($anime) {
			$metas = AnimeMeta::findAll(["where" => ["id_anime" => $id]]);
			$reviews = HistoriqueMembre::findAll(["where" => ["id_anime" => $id]]);
			$genres = array_filter($metas, function($meta) {
				return $meta->getField("name") === "genre";
			});
			$producers = array_filter($metas, function($meta) {
				return $meta->getField("name") === "producer";
			});
			$studios = array_filter($metas, function($meta) {
				return $meta->getField("name") === "studio";
			});
			$synonyms = array_filter($metas, function($meta) {
				return $meta->getField("name") === "synonym";
			});
			$this->render("index", [
				"title" => $anime->getField("title"),
				"anime" => $anime,
				"genres" => $genres,
				"producers" => $producers,
				"studios" => $studios,
				"synonyms" => $synonyms,
				"episodes" => [],
				"reviews" => []
			]);
		} else {
			echo "ID not found";
		}
	}

	/**
	 * GET /anime
	 */
	public function search() {
		$this->render("search", [
			"title" => "Anime",
			"types" => Anime::findAll(["column" => "DISTINCT type"]),
			"genres" => AnimeMeta::findAll(["where" => ["name" => "genre"], "group" => "value"]),
			"producers" => AnimeMeta::findAll(["where" => ["name" => "producer"], "group" => "value"]),
			"studios" => AnimeMeta::findAll(["where" => ["name" => "studio"], "group" => "value"])
		]);
	}

	/**
	 * GET /search/anime
	 */
	public function list() {
		$fields = [];
		$fieldsMeta = [];
		$operators = [];
		$joins = [];
		$entity = Anime::class;
		if(array_key_exists("title", Request::$params) && Request::$params["title"] !== "") {
			$fields["anime.title"] = "%" . Request::$params["title"] . "%";
			$operators["anime.title"] = "LIKE";
		}

		if (array_key_exists("type", Request::$params) && Request::$params["type"] !== "") {
			$fields["type"] = Request::$params["type"];
		}
		if (array_key_exists("genre", Request::$params) && Request::$params["genre"] !== "") {
			$entity = AnimeMeta::class;
			$fields["anime_meta.name"] = "genre";
			$fields["anime_meta.value"] = Request::$params["genre"];
			$operators["anime_meta.value"] = "IN";
		}
		if (array_key_exists("producer", Request::$params) && Request::$params["producer"] !== "") {
			$entity = AnimeMeta::class;
			$fields["anime_meta.name"] = "producer";
			$fields["anime_meta.value"] = Request::$params["producer"];
		}
		if (array_key_exists("studio", Request::$params) && Request::$params["studio"] !== "") {
			$entity = AnimeMeta::class;
			$fields["anime_meta.name"] = "studio";
			$fields["anime_meta.value"] = Request::$params["studio"];
		}
		if (array_key_exists("start_date", Request::$params) && Request::$params["start_date"] !== "") {
			$fields["start_date"] = Request::$params["start_date"];
		}
		if (array_key_exists("end_date", Request::$params) && Request::$params["end_date"] !== "") {
			$fields["end_date"] = Request::$params["end_date"];
		}
		if($entity === AnimeMeta::class) {
			array_push($joins, "INNER JOIN anime on anime.id_anime = anime_meta.id_anime");
		}
		$filter = ["where" => $fields, "operator" => $operators, "join" => $joins];
		$count = $entity::count($filter);
		$results_per_page = Config::$RESULTS_PER_PAGE;
		$totalPage = ceil($count / $results_per_page);
		$page = 1;
		if(array_key_exists("page", Request::$params)) {
			$page = (int) min($totalPage, max(Request::$params["page"], 1));
		}

		$params = array_merge($filter, [ "limit" => ($page - 1) * $results_per_page . ",$results_per_page" ]);

		if(array_key_exists("sort", Request::$params) && in_array(Request::$params["sort"], ["title", "start_date"])) {
			$order = "asc";
			if(array_key_exists("order", Request::$params) && in_array(Request::$params["order"], ["asc", "desc"])) {
				$order = Request::$params["order"];
			}
			$params["order"] = Request::$params["sort"]." ". $order;
		}

		$results = $entity::findAll($params);
		$this->render("list", [
			"title" => "Recherche d'anime", 
			"results" => $results,
			"totalPage" => $totalPage,
			"page" => $page
		]);
	}

	/**
	 * GET /type/{name}
	 */
	public function type($name) {
		$filter = ["where" => ["type" => $name]];
		$count = Anime::count($filter);
		$results_per_page = Config::$RESULTS_PER_PAGE;
		$totalPage = ceil($count / $results_per_page);
		$page = 1;
		if(array_key_exists("page", Request::$params)) {
			$page = (int) min($totalPage, max(Request::$params["page"], 1));
		}
		$results = Anime::findAll(array_merge($filter, [
			"limit" => ($page - 1) * $results_per_page . ",$results_per_page", 
			"order" => Request::$params["sort"]." ".Request::$params["order"]
		]));
		$this->render("list", [
			"title" => "Recherche d'anime", 
			"results" => $results,
			"totalPage" => $totalPage,
			"page" => $page
		]);
	}


	/**
	 * GET /meta/{id}
	 */
	public function meta($id) {
		echo "Work in progress";
	}

}

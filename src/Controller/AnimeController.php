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
		if ($anime === false) {
			echo "ID not found";
		} else {
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

		$fields["title"] = "%" . Request::$params["title"] . "%";
		array_push($operators, "LIKE");

		if (Request::$params["type"] !== "") {
			$fields["type"] = Request::$params["type"];
		}  
		if (array_key_exists("genre", Request::$params)) {

		}  
		if (Request::$params["producer"] !== "") {

		} 
		if (Request::$params["studio"] !== "") {
	
		} 
		if (Request::$params["start_date"] !== "") {
			$fields["start_date"] = Request::$params["start_date"];
		} 
		if (Request::$params["end_date"] !== "") {
			$fields["end_date"] = Request::$params["end_date"];
		}


		$filter = ["where" => $fields, "operator" => $operators];
		$count = Anime::count($filter);
		$results_per_page = Config::$RESULTS_PER_PAGE;
		$totalPage = ceil($count / $results_per_page);
		$page = 1;
		if(array_key_exists("page", Request::$params) === true) {
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
	 * GET /type/{name}
	 */
	public function type($name) {
		$filter = ["where" => ["type" => $name]];
		$count = Anime::count($filter);
		$results_per_page = Config::$RESULTS_PER_PAGE;
		$totalPage = ceil($count / $results_per_page);
		$page = 1;
		if(array_key_exists("page", Request::$params) === true) {
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

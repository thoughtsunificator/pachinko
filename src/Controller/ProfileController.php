<?php

namespace Controller;

use \Core\Controller;
use \Core\Request;
use \Core\ORM;
use \Core\Core;
use \Core\Config;
use \Model\Profile;
use \Model\FichePersonne;
use \Model\Abonnement;

class ProfileController extends Controller {

	/**
	 * GET /users/{id}
	 */
	public function index($id) {
		$membre = Profile::findOne([
			"where" => ["id_membre" => $id]
		]);
		if (!$membre) {
			echo "ID not found";
		} else {
			$membre->setField("fiche_personne", FichePersonne::findOne([
				"where" => ["id_perso" => $membre->getField("id_fiche_perso")]
			]));
			$membre->setField("abonnement", Abonnement::findOne([
				"where" => ["id_abo" => $membre->getField("id_abo")]
			]));
			$this->render("index", [
				"title" => $membre->getField("fiche_personne")->getField("nom") . " " . $membre->getField("fiche_personne")->getField("prenom"),
				"membre" => $membre,
				"historique" => []
			]);
		}
	}

	/**
	 * GET /users
	 */
	public function search() {
		$this->render("search", ["title" => "Profile"]);
	}

	/**
	 * GET /search/users
	 */
	public function list() {
		$fields = [];
		$operators = [];
		if(array_key_exists("query", Request::$params) && Request::$params["query"] !== "") {
			$fieldName = 'concat_ws(" ", nom, prenom)';
			$fields[$fieldName] = "%" . Request::$params["query"] . "%";
			$operators[$fieldName] = "LIKE";
		}
		$results_per_page = Config::$RESULTS_PER_PAGE;
		$count = FichePersonne::count(["where" => $fields, "operator" => [0 => "LIKE", 1 => "LIKE"]]);
		$totalPage = ceil($count / $results_per_page);
		$page = 1;
		if(array_key_exists("page", Request::$params)) {
			$page = (int) min($totalPage, max(Request::$params["page"], 1));
		}
		$fiches = FichePersonne::findAll(["column" => "id_perso, nom, prenom, avatar", "where" => $fields, "operator" => $operators, "limit" => ($page - 1) * $results_per_page . ",$results_per_page"]);
		foreach ($fiches as &$fiche) {
			$fiche->setField("membre", Profile::findOne(["where" => ["id_fiche_perso" => $fiche->getField("id_perso")]]));
		}
		$this->render("list", [
			"title" => "Profiles",
			"results" => $fiches,
			"totalPage" => $totalPage,
			"page" => $page
		]);
	}

}

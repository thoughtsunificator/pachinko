<?php

namespace Controller;

use \Core\Controller;
use \Core\Request;
use \Core\ORM;
use \Core\Core;
use \Core\Config;
use \Model\Membre;
use \Model\FichePersonne;
use \Model\Abonnement;

class MembreController extends Controller {

	/**
	 * GET /member/{id}
	 */
	public function index($id) {
		$membre = Membre::findOne([
			"where" => ["id_membre" => $id]
		]);
		if ($membre === false) {
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
	 * GET /member
	 */
	public function search() {
		$this->render("search", ["title" => "Membre"]);
	}

	/**
	 * GET /search/member
	 */
	public function list() {
		$fields = [
			"nom" => "%" . Request::$params["nom"] . "%", 
			"prenom" => "%" . Request::$params["prenom"] . "%"
		];
		$results_per_page = Config::$results_per_page;
		$count = FichePersonne::count(["where" => $fields, "operator" => [0 => "LIKE", 1 => "LIKE"]]);
		$totalPage = ceil($count / $results_per_page);
		$page = 1;
		if(array_key_exists("page", Request::$params) === true) {
			$page = (int) min($totalPage, max(Request::$params["page"], 1));
		}
		$fiches = FichePersonne::findAll(["where" => $fields, "operator" => [0 => "LIKE", 1 => "LIKE"], "limit" => ($page - 1) * $results_per_page . ",$results_per_page"]);
		foreach ($fiches as &$fiche) {
			$fiche->setField("membre", Membre::findOne(["where" => ["id_fiche_perso" => $fiche->getField("id_perso")]]));
		}
		$this->render("list", [
			"title" => "Recherche de membre", 
			"results" => $fiches,
			"totalPage" => $totalPage, // TODO pagination
			"page" => $page // TODO pagination
		]);
	}

}
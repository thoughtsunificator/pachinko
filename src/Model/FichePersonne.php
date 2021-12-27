<?php

namespace Model;

use \Core\Entity;

class FichePersonne extends Entity {

	public const TABLE_NAME = "fiche_personne";
	public const PRIMARY_KEY = "id_perso";

	public function getName() {
		return htmlspecialchars($this->getField('nom'). " ". $this->getField('prenom'));
	}

	public function getSlug() {
		return htmlspecialchars(trim(preg_replace('/[^A-Za-z0-9-]+/', '+', $this->getField('nom'). " ". $this->getField('prenom'))));
	}

}

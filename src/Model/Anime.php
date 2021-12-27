<?php

namespace Model;

use \Core\Entity;
use \Model\AnimeMeta;
use \Model\HistoriqueMembre;

class Anime extends Entity {

	public const TABLE_NAME = "anime";
	public const PRIMARY_KEY = "id_anime";

	public function getSlug() {
		return htmlspecialchars(trim(preg_replace('/[^A-Za-z0-9-]+/', '+', $this->getField("title"))));
	}

}

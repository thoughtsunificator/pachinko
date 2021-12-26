<?php

namespace Core;

use \Core\ORM;

abstract class Entity {

	/**
	 * @var [array]
	 */
	private $_fields;

	public function __construct($fields) {
		$this->_fields = $fields;
	}

	public function setField($name, $value) {
		$this->_fields[$name] = $value;
	}

	public function getField($name) {
		return $this->_fields[$name];
	}

	public function getFields() {
		return $this->_fields;
	}

	public function save() {
		if (array_key_exists(static::PRIMARY_KEY, $this->_fields)) {
			ORM::update($this);
		} else {
			$id = ORM::create($this);
			$this->setField(static::PRIMARY_KEY, $id);
		}
	}

	public function update() {
		return ORM::update($this);
	}

	public function delete() {
		return ORM::delete($this);
	}

	public static function findOne($params) {
		$fetch = ORM::read(static::class, array_merge($params, ["limit" => 1]))->fetch();
		if($fetch !== false) {
			return new static($fetch);
		}
		return false;
	}

	public static function findAll($params = []) {
		$fetchAll = ORM::read(static::class, $params)->fetchAll();
		return array_map(function ($fields) {
			return new static($fields);
		}, $fetchAll);
	}

	public static function count($params = []) {
		$params["column"] = "count(" . static::PRIMARY_KEY . ")";
		$statement = ORM::read(static::class, $params);
		return (int) $statement->fetchColumn();
	}

}

<?php

namespace Core;

use \Exception;

final class ORM {

	private function __construct() {}
	
	/**
	 * Insert a row into the database
	 * @param  [Entity] 	$model 
	 * @return [integer]  The id of row that is inserted
	 */
	public static function create($model) {
		$fields = $model->getFields();
		$instance = Database::getPDO();
		$columnString = implode(",", array_keys($fields));
		$valuesString = implode(",", array_fill(0, count($fields), "?"));
		$query = "INSERT INTO " . $model::TABLE_NAME . " ($columnString) VALUES ($valuesString)";
		$statement = $instance->prepare($query);
		$statement->execute(array_values($fields));
		return $instance->lastInsertId();
	}

	/**
	 * Select a row into the database
	 * @param  [string] 			$table  The name of the table
	 * @param  [array] 				$params 
	 * @return [PDOStatement]
	 */
	public static function read($model, $params) {
		$table = $model::TABLE_NAME;
		$instance = Database::getPDO();
		$columnText = "*";
		$operators = [];
		if (array_key_exists("operator", $params) === true) {
			$operators = $params["operator"];
		}
		if (array_key_exists("column", $params) === true) {
			$columnText = $params["column"];
		}
		$query = "select $columnText from $table";
		$values = [];
		if (array_key_exists("where", $params) === true) {
			$columns = [];
			$i = 0;
			foreach ($params["where"] as $key => $value) {
				$operator = "=";
				if(array_key_exists($i, $operators) === true) {
					$operator = $operators[$i];
				}
				if($operator === "IN") {
					array_push($columns, "$table.$key $operator (" . implode(",", array_fill(0, count($value), "?")) . ")");
					$values = array_merge($values, $value);
				} else {
					array_push($columns, "$table.$key $operator ?");
					array_push($values, $value);
				}
				$i++;
			}
			$columnsText = implode(" AND ", $columns);
			$query .= " where $columnsText";

		}
		if (array_key_exists("group", $params) === true) {
			$query .= " group by ". $params["group"];
		}
		if (array_key_exists("order", $params) === true) {
			$query .= " order by ". $params["order"];
		}
		if (array_key_exists("limit", $params) === true) {
			$query .= " limit ". $params["limit"];
		}
		$statement = $instance->prepare($query);
		$statement->execute($values);
		return $statement;
	}

	/**
	 * Update a row into the database
	 * @param  [Entity] 			$model
	 * @return [PDOStatement]
	 */
	public static function update($model) {
		$instance = Database::getPDO();
		$columns = [];
		$values = [];
		foreach ($model->getFields() as $key => $value) {
			array_push($columns, "$key=?");
			array_push($values, $value);
		}
		array_push($values, $model->getField($model::PRIMARY_KEY));
		$columnsText = implode(", ", $columns);
		$query = "UPDATE ".$model::TABLE_NAME." set $columnsText where " . $model::PRIMARY_KEY . "=?";
		$statement = $instance->prepare($query);
		return $statement;
	}

	/**
	 * Delete a row into the database
	 * @param  [Entity] 			$model
	 * @return [PDOStatement]
	 */
	public static function delete($model) {
		$instance = Database::getPDO();
		$query = "DELETE FROM " . $model::TABLE_NAME . " where " . $model::PRIMARY_KEY . "=?";
		$statement = $instance->prepare($query);
		$statement->execute([$model->getField($model::PRIMARY_KEY)]);
		return $statement;
	}

}

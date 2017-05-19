<?php 

namespace models;

use \Connect;
use \Model;
use \PDO;

class Speler extends Model
{
	public static function insert(string $name){
		$dbh = Connect::getInstance()->_dbh;
		$q = "INSERT INTO examples(name) VALUES (:name)";
		$stmt =	$dbh->prepare($q);
		$stmt->bindValue(":name", $name);
		$stmt->execute();
	}

	public static function update(int $id, string $name){
		$dbh = Connect::getInstance()->_dbh;
		$q = "UPDATE examples SET name = :name WHERE id = :id";
		$stmt =	$dbh->prepare($q);
		$stmt->bindValue(":id", $id);
		$stmt->bindValue(":name", $name);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public static function delete(int $id){
		$dbh = Connect::getInstance()->_dbh;
		$q = "DELETE FROM examples WHERE id = :id";
		$stmt =	$dbh->prepare($q);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
	}
}

 ?>
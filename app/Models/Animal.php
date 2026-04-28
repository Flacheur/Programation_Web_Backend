<?php

class Animal {

	public static function all() {

		$db = Database::getConnection();

		$sql = "SELECT * FROM animal";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();

	}

	public static function find($id) {
		$db = Database::getConnection();
		$stmt = $db->prepare("
			SELECT a.*, r.nom AS race_nom, r.espece AS race_espece
			FROM animal a
			JOIN race r ON a.race_id = r.id
			WHERE a.id = ?
		");
		$stmt->execute([$id]);
		return $stmt->fetch();
	}

}

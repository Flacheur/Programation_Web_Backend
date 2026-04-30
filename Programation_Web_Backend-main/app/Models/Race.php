<?php

class Race {

	public static function all() {
		$db = Database::getConnection();
		$stmt = $db->query("SELECT * FROM race ORDER BY nom");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function find($id) {
		$db = Database::getConnection();
		$stmt = $db->prepare("SELECT * FROM race WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public static function create($nom, $espece) {
		$db = Database::getConnection();
		$stmt = $db->prepare("INSERT INTO race (nom, espece) VALUES (?, ?)");
		$stmt->execute([$nom, $espece]);
	}

	public static function update($id, $nom, $espece) {
		$db = Database::getConnection();
		$stmt = $db->prepare("UPDATE race SET nom = ?, espece = ? WHERE id = ?");
		$stmt->execute([$nom, $espece, $id]);
	}

	public static function delete($id) {
		$db = Database::getConnection();
		$stmt = $db->prepare("DELETE FROM race WHERE id = ?");
		$stmt->execute([$id]);
	}
	
}

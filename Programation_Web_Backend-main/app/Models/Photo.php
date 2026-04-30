<?php

class Photo {

	public static function allByAnimal($animal_id) {
		$db = Database::getConnection();
		$stmt = $db->prepare("SELECT * FROM photo WHERE animal_id = ?");
		$stmt->execute([$animal_id]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function create($animal_id, $file_path) {
		$db = Database::getConnection();
		$stmt = $db->prepare("INSERT INTO photo (animal_id, file_path) VALUES (?, ?)");
		$stmt->execute([$animal_id, $file_path]);
	}

	public static function delete($id) {
		$db = Database::getConnection();
		$stmt = $db->prepare("DELETE FROM photo WHERE id = ?");
		$stmt->execute([$id]);
	}
	
}

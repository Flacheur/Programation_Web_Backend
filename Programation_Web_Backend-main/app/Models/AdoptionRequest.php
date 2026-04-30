<?php

class AdoptionRequest {

	public static function allWithAnimal() {
		$db = Database::getConnection();
		$stmt = $db->query("
			SELECT adoption_request.*, animal.nom AS animal_nom
			FROM adoption_request
			JOIN animal ON adoption_request.animal_id = animal.id
			ORDER BY adoption_request.id DESC
		");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function create($animal_id, $user_name, $user_email, $message) {
		$db = Database::getConnection();
		$stmt = $db->prepare("
			INSERT INTO adoption_request (animal_id, user_name, user_email, message)
			VALUES (?, ?, ?, ?)
		");
		$stmt->execute([$animal_id, $user_name, $user_email, $message]);
	}

	public static function delete($id) {
		$db = Database::getConnection();
		$stmt = $db->prepare("DELETE FROM adoption_request WHERE id = ?");
		$stmt->execute([$id]);
	}

}

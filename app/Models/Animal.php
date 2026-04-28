<?php

class Animal {

	public static function all() {

		$db = Database::getConnection();

		$sql = "SELECT * FROM animal";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();

	}
	
}
// https://copilot.microsoft.com/shares/qMzLQvJTjAk4YunnFVxb8
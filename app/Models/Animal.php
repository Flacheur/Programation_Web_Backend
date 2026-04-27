<?php

require_once __DIR__ . '/../../config/Database.php';

class Animal {
	public static function all() {
		$db = Database::getConnection();
		$stmt = $db->query("SELECT * FROM animal");
		return $stmt->fetchAll();
	}
}

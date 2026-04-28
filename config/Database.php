<?php

class Database {

	private static $instance = null;

	public static function getConnection() {

		// Si un fichier local existe, on l'utilise
		if (file_exists(__DIR__ . '/Database.local.php')) {
			require_once __DIR__ . '/Database.local.php';
			return DatabaseLocal::getConnection();
		}

		// Sinon : configuration pour phpetu
		$host = "localhost";
		$dbname = "adoption_animaux";
		$user = "webuser";
		$pass = "0000";

		return new PDO(
			"mysql:host=$host;dbname=$dbname;charset=utf8mb4",
			$user,
			$pass,
			[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]
		);

	}
	
}

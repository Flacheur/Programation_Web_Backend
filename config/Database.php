<?php

class Database {

	private static $instance = null;

	public static function getConnection() {

		if (self::$instance === null) {

			$host = "localhost";
			$dbname = "adoption_animaux";
			$user = "webuser";
			$pass = "0000";

			self::$instance = new PDO(
				"mysql:host=$host;dbname=$dbname;charset=utf8mb4",
				$user,
				$pass,
				[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]
			);

		}

		return self::$instance;

	}

}

<?php

require_once __DIR__ . '/../config/Database.php';

try {
	$db = Database::getConnection();
	echo "Connexion OK";
} catch (Exception $e) {
	echo "Erreur : " . $e->getMessage();
}

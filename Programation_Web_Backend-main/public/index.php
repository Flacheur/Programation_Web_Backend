<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chargement automatique des classes
spl_autoload_register(function ($class) {

	$paths = [
		__DIR__ . '/../app/Controllers/' . $class . '.php',
		__DIR__ . '/../app/Models/' . $class . '.php',
		__DIR__ . '/../config/' . $class . '.php'
	];

	foreach ($paths as $file) {
		if (file_exists($file)) {
			require_once $file;
			return;
		}
	}
	
});

// Récupération des paramètres
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'HomeController';
$actionName = $_GET['action'] ?? 'index';

// Vérification du contrôleur
$controllerFile = __DIR__ . '/../app/Controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
	die("Contrôleur introuvable : $controllerName");
}

$controller = new $controllerName();

// Vérification de l’action
if (!method_exists($controller, $actionName)) {
	die("Action introuvable : $actionName");
}

// Appel de l’action
$controller->$actionName();

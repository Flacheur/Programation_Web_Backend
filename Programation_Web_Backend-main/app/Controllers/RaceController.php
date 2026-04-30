<?php

class RaceController {

	public function list() {

		// Récupération de toutes les races
		$races = Race::all();

		$title = "Liste des races";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/race/list.php';
		require __DIR__ . '/../../views/layout/footer.php';
		
	}

	public function create() {

		// Si le formulaire est soumis
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$nom = $_POST['nom'];
		$espece = $_POST['espece'];

		Race::create($nom, $espece);

		header("Location: ?controller=race&action=list");
		exit;
		
		}

		$title = "Ajouter une race";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/race/create.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	public function update() {

		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		// Récupérer la race existante
		$race = Race::find($_GET['id']);

		if (!$race) {
			die("Race introuvable");
		}

		// Si le formulaire est soumis
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$nom = $_POST['nom'];
			$espece = $_POST['espece'];

			Race::update($_GET['id'], $nom, $espece);

			header("Location: ?controller=race&action=list");
			exit;
			
		}

		$title = "Modifier la race";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/race/update.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	public function delete() {

		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		Race::delete($_GET['id']);

		header("Location: ?controller=race&action=list");
		exit;
		
	}

}

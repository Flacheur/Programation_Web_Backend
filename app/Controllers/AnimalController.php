<?php

class AnimalController {

	public function list() {

		$animals = Animal::all();
		$title = "Liste des animaux";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/animal/list.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	public function show() {

		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		$animal = Animal::find($_GET['id']);

		if (!$animal) {
			die("Animal introuvable");
		}

		$title = "Fiche de " . $animal['nom'];

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/animal/show.php';
		require __DIR__ . '/../../views/layout/footer.php';
	
	}

	public function create() {

		// Si le formulaire est soumis
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Récupération des données
			$nom = $_POST['nom'];
			$age = $_POST['age'];
			$sexe = $_POST['sexe'];
			$race_id = $_POST['race_id'];
			$description = $_POST['description'];
			$statut = $_POST['statut'];
			$date_arrivee = $_POST['date_arrivee'];

			// Insertion
			Animal::create($nom, $age, $sexe, $race_id, $description, $statut, $date_arrivee);

			// Redirection vers la liste
			header("Location: ?controller=animal&action=list");
			exit;
		}

		// Sinon, afficher le formulaire
		$title = "Ajouter un animal";
		$races = Race::all();

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/animal/create.php';
		require __DIR__ . '/../../views/layout/footer.php';
		
	}

	public function update() {

		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		// Récupérer l'animal existant
		$animal = Animal::find($_GET['id']);

		if (!$animal) {
			die("Animal introuvable");
		}

		// Si le formulaire est soumis
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$nom = $_POST['nom'];
			$age = $_POST['age'];
			$sexe = $_POST['sexe'];
			$race_id = $_POST['race_id'];
			$description = $_POST['description'];
			$statut = $_POST['statut'];
			$date_arrivee = $_POST['date_arrivee'];

			Animal::update(
				$_GET['id'],
				$nom,
				$age,
				$sexe,
				$race_id,
				$description,
				$statut,
				$date_arrivee
			);

			header("Location: ?controller=animal&action=list");
			exit;

		}

		$title = "Modifier " . $animal['nom'];
		$races = Race::all();

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/animal/update.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	public function delete() {
	
		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		// Suppression
		Animal::delete($_GET['id']);

		// Redirection vers la liste
		header("Location: ?controller=animal&action=list");
		exit;
	}

}

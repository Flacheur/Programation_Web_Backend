<?php

class AdoptionRequestController {

	// Formulaire de demande (visible par le visiteur depuis la fiche animal)
	public function ask() {

		if (!isset($_GET['animal_id'])) {
			die("animal_id manquant");
		}

		$animal_id = $_GET['animal_id'];
		$animal = Animal::findWithRace($animal_id);

		if (!$animal) {
			die("Animal introuvable");
		}

		// Si le formulaire est soumis
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$user_name  = trim($_POST['user_name']);
			$user_email = trim($_POST['user_email']);
			$message    = trim($_POST['message']);

			if (empty($user_name) || empty($user_email)) {
				die("Nom et email obligatoires");
			}

			AdoptionRequest::create($animal_id, $user_name, $user_email, $message);

			// Redirection vers la page de confirmation
			header("Location: ?controller=adoptionRequest&action=confirm&animal_id=" . $animal_id);
			exit;
		}

		$title = "Demande d'adoption pour " . $animal['nom'];

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/adoptionRequest/ask.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	// Page de confirmation après soumission
	public function confirm() {

		$animal_id = $_GET['animal_id'] ?? null;
		$animal = $animal_id ? Animal::findWithRace($animal_id) : null;

		$title = "Demande envoyée !";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/adoptionRequest/confirm.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	// Liste des demandes (admin)
	public function list() {

		$requests = AdoptionRequest::allWithAnimal();
		$title = "Demandes d'adoption";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/adoptionRequest/list.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	// Suppression d'une demande (admin)
	public function delete() {

		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		AdoptionRequest::delete($_GET['id']);

		header("Location: ?controller=adoptionRequest&action=list");
		exit;

	}

}

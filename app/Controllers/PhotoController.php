<?php

class PhotoController {

	public function add() {

		if (!isset($_GET['animal_id'])) {
			die("animal_id manquant");
		}

		$animal_id = $_GET['animal_id'];

		// Si le formulaire est soumis
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
				die("Erreur lors de l'upload");
			}

			// Répertoire de destination
			$uploadDir = __DIR__ . '/../../public/uploads/';

			// Création du répertoire s'il n'existe pas
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0777, true);
			}

			// Nom unique
			$filename = uniqid() . '_' . basename($_FILES['photo']['name']);
			$destination = $uploadDir . $filename;

			// Déplacement du fichier
			move_uploaded_file($_FILES['photo']['tmp_name'], $destination);

			// Enregistrement en base
			Photo::create($animal_id, $filename);

			// Retour à la fiche de l’animal
			header("Location: ?controller=animal&action=show&id=" . $animal_id);
			exit;

		}

		// Formulaire de chargement
		$title = "Ajouter une photo";

		require __DIR__ . '/../../views/layout/header.php';
		require __DIR__ . '/../../views/photo/add.php';
		require __DIR__ . '/../../views/layout/footer.php';

	}

	public function delete() {

		if (!isset($_GET['id']) || !isset($_GET['animal_id'])) {
			die("Paramètres manquants");
		}

		$id = $_GET['id'];
		$animal_id = $_GET['animal_id'];

		// Récupération de la photo pour supprimer le fichier
		$photos = Photo::allByAnimal($animal_id);
		$photo = null;

		foreach ($photos as $p) {
			if ($p['id'] == $id) {
				$photo = $p;
				break;
			}
		}

		if ($photo) {
			$filePath = __DIR__ . '/../../public/uploads/' . $photo['file_path'];
			if (file_exists($filePath)) {
				unlink($filePath);
			}
		}

		// Suppression en base
		Photo::delete($id);

		// Retour à la fiche de l’animal
		header("Location: ?controller=animal&action=show&id=" . $animal_id);
		exit;
		
	}

}

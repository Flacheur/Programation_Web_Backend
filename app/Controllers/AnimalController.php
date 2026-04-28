<?php

class AnimalController {

	public function list() {
		$animaux = Animal::all();
		require __DIR__ . '/../Views/animal/list.php';
	}

	public function show() {

		if (!isset($_GET['id'])) {
			die("ID manquant");
		}

		$id = intval($_GET['id']);
		$animal = Animal::find($id);

		if (!$animal) {
			die("Animal introuvable");
		}

		require __DIR__ . '/../Views/animal/show.php';
		
	}
	
}

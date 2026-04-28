<?php

class AnimalController {

	public function list() {
		$animaux = Animal::all();
		require __DIR__ . '/../Views/animal/list.php';
	}
	
}

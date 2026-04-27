<?php

require_once __DIR__ . '/../Models/Animal.php';

class AnimalController {
	public function index() {
		$animaux = Animal::all();
		require __DIR__ . '/../Views/animals/list.php';
	}
}

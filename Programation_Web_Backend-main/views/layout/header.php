<!DOCTYPE html>
<html lang="fr">
	
<head>
	<meta charset="UTF-8">
	<title><?= $title ?? 'Adoption Animaux' ?></title>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
	<h1>Refuge - Adoption d'animaux</h1>
	<nav>
		<a href="?controller=animal&action=list">Animaux</a>
		<a href="?controller=race&action=list">Races</a>
		<a href="?controller=adoptionRequest&action=list">Demandes</a>
	</nav>
</header>

<main>

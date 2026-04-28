<h1><?= htmlspecialchars($animal['nom']) ?></h1>

<p><strong>Âge :</strong> <?= $animal['age'] ?> ans</p>
<p><strong>Sexe :</strong> <?= $animal['sexe'] ?></p>

<p><strong>Race :</strong> <?= htmlspecialchars($animal['race_nom']) ?></p>
<p><strong>Espèce :</strong> <?= htmlspecialchars($animal['race_espece']) ?></p>

<p><strong>Description :</strong> <?= nl2br(htmlspecialchars($animal['description'])) ?></p>

<p><strong>Date d'arrivée :</strong> <?= $animal['date_arrivee'] ?></p>

<a href="?controller=animal&action=list">Retour à la liste</a>

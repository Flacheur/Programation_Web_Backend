<h2><?= htmlspecialchars($animal['nom']) ?></h2>

<p><strong>Âge :</strong> <?= $animal['age'] ?> ans</p>
<p><strong>Sexe :</strong> <?= $animal['sexe'] ?></p>
<p><strong>Race :</strong> <?= htmlspecialchars($animal['race_nom']) ?></p>
<p><strong>Espèce :</strong> <?= htmlspecialchars($animal['race_espece']) ?></p>
<p><strong>Description :</strong> <?= nl2br(htmlspecialchars($animal['description'])) ?></p>
<p><strong>Date d'arrivée :</strong> <?= $animal['date_arrivee'] ?></p>

<a href="?controller=adoptionRequest&action=ask&animal_id=<?= $animal['id'] ?>">
    Faire une demande d'adoption
</a>

<a href="?controller=animal&action=list">Retour à la liste</a>

<h3>Photos</h3>

<?php if (empty($photos)): ?>
	<p>Aucune photo pour le moment.</p>
<?php else: ?>
	<div style="display: flex; gap: 10px; flex-wrap: wrap;">
		<?php foreach ($photos as $photo): ?>
			<div>
				<img src="uploads/<?= htmlspecialchars($photo['file_path']) ?>" 
					 alt="Photo de <?= htmlspecialchars($animal['nom']) ?>" 
					 style="width: 150px; height: auto; border: 1px solid #ccc;">

				<br>

				<a href="?controller=photo&action=delete&id=<?= $photo['id'] ?>&animal_id=<?= $animal['id'] ?>"
				   onclick="return confirm('Supprimer cette photo ?');">
					Supprimer
				</a>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<p>
	<a href="?controller=photo&action=add&animal_id=<?= $animal['id'] ?>">Ajouter une photo</a>
</p>

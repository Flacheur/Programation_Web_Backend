<h1>Liste des animaux</h1>

<p>
	<a href="?controller=animal&action=create">➕ Ajouter un animal</a>
</p>

<?php if (empty($animals)): ?>
	<p>Aucun animal pour le moment.</p>
<?php else: ?>
	<ul>
	<?php foreach ($animals as $animal): ?>
		<li>
			<?= htmlspecialchars($animal['nom']) ?>
			(<?= htmlspecialchars($animal['age']) ?> ans)
			— <a href="?controller=animal&action=show&id=<?= $animal['id'] ?>">Voir</a>
			— <a href="?controller=animal&action=update&id=<?= $animal['id'] ?>">Modifier</a>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

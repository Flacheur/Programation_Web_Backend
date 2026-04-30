<h1>Liste des races</h1>

<p>
	<a href="?controller=race&action=create">Ajouter une race</a>
</p>

<?php if (empty($races)): ?>
	<p>Aucune race enregistrée.</p>
<?php else: ?>
	<ul>
	<?php foreach ($races as $race): ?>
		<li>
			<?= htmlspecialchars($race['nom']) ?>
			— <a href="?controller=race&action=update&id=<?= $race['id'] ?>">Modifier</a>
			— <a href="?controller=race&action=delete&id=<?= $race['id'] ?>"
				 onclick="return confirm('Supprimer cette race ?');">Supprimer</a>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

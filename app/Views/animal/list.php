<h1>Liste des animaux</h1>

<?php if (empty($animaux)): ?>
	<p>Aucun animal pour le moment.</p>
<?php else: ?>
	<ul>
	<?php foreach ($animaux as $animal): ?>
		<li>
			<?= htmlspecialchars($animal['nom']) ?>
			(<?= htmlspecialchars($animal['age']) ?> ans)
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

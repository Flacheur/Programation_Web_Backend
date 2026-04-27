<h1>Animaux à adopter</h1>

<ul>
<?php foreach ($animaux as $a): ?>
	<li><?= htmlspecialchars($a['nom']) ?> (<?= $a['age'] ?> ans)</li>
<?php endforeach; ?>
</ul>

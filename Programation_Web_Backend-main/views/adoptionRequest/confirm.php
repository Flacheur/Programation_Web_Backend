<h2>✅ Demande envoyée !</h2>

<p>Merci pour votre demande d'adoption. Le refuge vous contactera prochainement par email.</p>

<?php if ($animal): ?>
	<p>
		<a href="?controller=animal&action=show&id=<?= $animal['id'] ?>">Retour à la fiche de <?= htmlspecialchars($animal['nom']) ?></a>
	</p>
<?php endif; ?>

<p>
	<a href="?controller=animal&action=list">Voir tous les animaux</a>
</p>

<h2>Demande d'adoption pour <?= htmlspecialchars($animal['nom']) ?></h2>

<p>
	<strong>Race :</strong> <?= htmlspecialchars($animal['race_nom']) ?>
	— <strong>Âge :</strong> <?= $animal['age'] ?> ans
</p>

<form method="POST">

	<label>Votre nom :</label>
	<input type="text" name="user_name" required>

	<label>Votre email :</label>
	<input type="email" name="user_email" required>

	<label>Message (facultatif) :</label>
	<textarea name="message" rows="4" placeholder="Présentez-vous, parlez de votre logement, de votre expérience avec les animaux..."></textarea>

	<button type="submit">Envoyer ma demande</button>

</form>

<p>
	<a href="?controller=animal&action=show&id=<?= $animal['id'] ?>">Retour à la fiche de <?= htmlspecialchars($animal['nom']) ?></a>
</p>

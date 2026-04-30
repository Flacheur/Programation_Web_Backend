<h2>Modifier <?= htmlspecialchars($animal['nom']) ?></h2>

<form method="POST">

	<label>Nom :</label>
	<input type="text" name="nom" value="<?= htmlspecialchars($animal['nom']) ?>" required>

	<label>Âge :</label>
	<input type="number" name="age" value="<?= $animal['age'] ?>" required>

	<label>Sexe :</label>
	<select name="sexe" required>
		<option value="M" <?= $animal['sexe'] === 'M' ? 'selected' : '' ?>>Mâle</option>
		<option value="F" <?= $animal['sexe'] === 'F' ? 'selected' : '' ?>>Femelle</option>
	</select>

	<label>Race :</label>
	<select name="race_id" required>
		<?php foreach ($races as $race): ?>
			<option value="<?= $race['id'] ?>"
				<?= $race['id'] == $animal['race_id'] ? 'selected' : '' ?>>
				<?= htmlspecialchars($race['nom']) ?> (<?= htmlspecialchars($race['espece']) ?>)
			</option>
		<?php endforeach; ?>
	</select>

	<label>Description :</label>
	<textarea name="description"><?= htmlspecialchars($animal['description']) ?></textarea>

	<label>Statut :</label>
	<select name="statut">
		<option value="disponible" <?= $animal['statut'] === 'disponible' ? 'selected' : '' ?>>Disponible</option>
		<option value="adopte" <?= $animal['statut'] === 'adopte' ? 'selected' : '' ?>>Adopté</option>
	</select>

	<label>Date d'arrivée :</label>
	<input type="date" name="date_arrivee" value="<?= $animal['date_arrivee'] ?>" required>

	<button type="submit">Enregistrer</button>

</form>

<a href="?controller=animal&action=list">Retour à la liste</a>

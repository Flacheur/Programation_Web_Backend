<h2>Ajouter un animal</h2>

<form method="POST">

	<label>Nom :</label>
	<input type="text" name="nom" required>

	<label>Âge :</label>
	<input type="number" name="age" required>

	<label>Sexe :</label>
	<select name="sexe" required>
		<option value="M">Mâle</option>
		<option value="F">Femelle</option>
	</select>

	<label>Race :</label>
	<select name="race_id" required>
		<?php foreach ($races as $race): ?>
			<option value="<?= $race['id'] ?>">
				<?= htmlspecialchars($race['nom']) ?> (<?= htmlspecialchars($race['espece']) ?>)
			</option>
		<?php endforeach; ?>
	</select>

	<label>Description :</label>
	<textarea name="description"></textarea>

	<label>Statut :</label>
	<select name="statut">
		<option value="disponible">Disponible</option>
		<option value="adopte">Adopté</option>
	</select>

	<label>Date d'arrivée :</label>
	<input type="date" name="date_arrivee" required>

	<button type="submit">Ajouter</button>

</form>

<a href="?controller=animal&action=list">Retour à la liste</a>

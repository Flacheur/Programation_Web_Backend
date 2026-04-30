<h1>Modifier la race</h1>

<form method="POST">

	<label>Nom :</label>
	<input type="text" name="nom" value="<?= htmlspecialchars($race['nom']) ?>" required>

	<label>Espèce :</label>
	<input type="text" name="espece" value="<?= htmlspecialchars($race['espece']) ?>" required>

	<button type="submit">Enregistrer</button>

</form>

<p>
	<a href="?controller=race&action=list">Retour à la liste</a>
</p>

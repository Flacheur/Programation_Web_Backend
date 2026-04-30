<h1>Ajouter une photo</h1>

<form method="POST" enctype="multipart/form-data">

	<label>Choisir une photo :</label>
	<input type="file" name="photo" accept="image/*" required>

	<button type="submit">Téléverser</button>

</form>

<p>
	<a href="?controller=animal&action=show&id=<?= $_GET['animal_id'] ?>">Retour à l'animal</a>
</p>
 
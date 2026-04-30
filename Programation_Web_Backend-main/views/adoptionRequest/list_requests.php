<h2>Demandes d'adoption</h2>

<?php if (empty($requests)): ?>
	<p>Aucune demande pour le moment.</p>
<?php else: ?>
	<table border="1" cellpadding="8" cellspacing="0">
		<thead>
			<tr>
				<th>#</th>
				<th>Animal</th>
				<th>Nom</th>
				<th>Email</th>
				<th>Message</th>
				<th>Statut</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($requests as $req): ?>
			<tr>
				<td><?= $req['id'] ?></td>
				<td><?= htmlspecialchars($req['animal_nom']) ?></td>
				<td><?= htmlspecialchars($req['user_name']) ?></td>
				<td><?= htmlspecialchars($req['user_email']) ?></td>
				<td><?= nl2br(htmlspecialchars($req['message'])) ?></td>
				<td><?= htmlspecialchars($req['status']) ?></td>
				<td>
					<a href="?controller=adoptionRequest&action=delete&id=<?= $req['id'] ?>"
					   onclick="return confirm('Supprimer cette demande ?');">Supprimer</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>

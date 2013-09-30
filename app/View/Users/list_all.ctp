<h1>Users List<h1>

<table >
	<tr>
		<th>Username</th>
		<th>Role</th>
		<th>Password</th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['username']; ?></td>
		<td><?php echo $user['User']['role']; ?></td>
		<td><?php echo $user['User']['password']; ?></td>
	</tr>
	<?php endforeach ?>
</table>
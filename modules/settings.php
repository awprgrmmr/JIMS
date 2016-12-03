<?php $db = new SQLite3("assets/data/jims.db"); ?>
<div class="columns">
	<div class="column one-fourth">
		<nav class="boxed">
			<h3>Settings</h3>
			<a class="active">User Management</a>
		</nav>
	</div>
	<div class="column three-fourths">
		<div id="manageusers" class="boxed">
			<h3>Manage users</h3>
			<div>
				<?php $result = $db->query("SELECT id, email, name FROM users"); ?>
				<ul>
					<?php while ($user = $result->fetchArray()) : ?>
					<li>
						<form>
							<input type="hidden" name="action" value="deleteuser" />
							<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
							<?php if ($user['email'] != 'email@email.com') : ?>
								<button type="submit"><img src="assets/images/close.svg" width="16" /></button>
							<?php endif; ?>
						</form>
						<b><?php echo $user['name']; ?></b>
						<?php echo $user['email']; ?>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<div id="adduser" class="boxed">
			<h3>Add user</h3>
			<div>
				<form action="actions.php" method="post">
					<input type="hidden" name="action" value="adduser" />
					<label for="name">Name</label>
					<input type="text" name="name" />
					<label for="email">Email</label>
					<input type="email" name="email" />
					<label for="password">Password</label>
					<input type="password" name="password" />
				</form>
			</div>
		</div>
	</div>
</div>

<div class="columns clearfix">
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
						<?php if ($user['email'] != 'email@email.com') : ?>
							<form>
								<input type="hidden" name="action" value="deleteuser" />
								<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
								<i class="fa fa-times submit"></i>
							</form>
						<?php endif; ?>
						<b><?php echo $user['name']; ?></b>
						<span><?php echo $user['email']; ?></span>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<div id="adduser" class="boxed">
			<h3>Add user</h3>
			<div>
				<form method="post">
					<label for="name">Name</label>
					<input type="text" name="name" />
					<label for="email">Email</label>
					<input type="email" name="email" />
					<label for="password">Password</label>
					<input type="password" name="password" />
					<input type="hidden" name="action" value="adduser" />
					<br>
					<input type="submit" value="Add user" />
				</form>
			</div>
		</div>
	</div>
</div>

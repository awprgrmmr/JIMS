<?php
# Connect to SQLite3 database
$database = new SQLite3("jims.db");
?>
<div id="settings" class="columns">
	<div class="column one-fourth">
		<nav class="boxed">
			<h3>Settings</h3>
			<a href="#account">Account</a>
			<a href="#users">User Management</a>
		</nav>
	</div>
	<div class="column three-fourths">
		<div id="manageusers" class="boxed">
			<h3>Manage users</h3>
			<div>
				<?php

				# Query all users for name
				$query = "SELECT id,email,name FROM users";
				$result = $database->query($query);

				while ($user = $result->fetchArray()) {
					$users .= "<li>";
					$users .= "<form action='actions.php'><input type='hidden' name='action' value='deleteuser' /><input type='hidden' name='id' value='" . $user['id'] . "' />";
					$users .= '<button type="submit"><img src="images/close.svg" width="16" /></button>';
					$users .= "</form>";
					$users .= "<b>" . $user['name'] . "</b>";
					$users .= $user['email'];
					$users .= "</li>";
				}
				echo "<ul>" . $users . "</ul>"
				?>
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
					<input type="email" name="email" autocapitalize="off" autocorrect="off" />
					<label for="password">Password</label>
					<input type="password" name="password" />
				</form>
			</div>
		</div>
		<div class="boxed">
			<h3>Edit roles</h3>
			<div></div>
		</div>
	</div>
</div>

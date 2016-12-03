<?php $db = new SQLite3("assets/data/jims.db"); ?>
<?php if (!isset($_GET['q'])) : $inmates = $db->query("SELECT * FROM inmates"); ?>
	<div>
		<table>
			<tr>
				<th colspan="2">List of Inmates</th>
				<th>Offenses</th>
			</tr>
			<?php while ($inmate = $inmates->fetchArray()) : ?>
			<tr>
				<?php echo "<td class='id'><a href='$module/$inmate[id]'>$inmate[id]</a></td>"; ?>
				<?php echo "<td class='name'><a href='$module/$inmate[id]'>$inmate[last_name], $inmate[first_name]</a></td>"; ?>
				<td class="offense">
					<?php
					$offenses = $db->query("SELECT charge FROM booking WHERE inmate='$inmate[id]'");
					$string = '';
					while ($offense = $offenses->fetchArray())
						$string .= "$offense[charge], ";
					echo substr($string, 0, -2);
					?>
				</td>
			</tr>
			<?php endwhile; ?>
		</table>
	</div>
<?php else : $inmates = $db->query("SELECT * FROM inmates WHERE id=$_GET[q]"); ?>
	<?php $inmate = $inmates->fetchArray(); ?>
	<div class="boxed inmate">
		<h3><?php echo "Inmate #$inmate[id]"; ?></h3>
		<div>
			<form class="clearfix">
				<label>Full Name (Last, First, Middle)</label>
				<input type="text" name="last_name" placeholder="Last Name" value="<?php echo "$inmate[last_name]"; ?>"/>
				<input type="text" name="first_name" placeholder="First Name" value="<?php echo "$inmate[first_name]"; ?>"/>
				<input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo "$inmate[middle_name]"; ?>"/>
				<?php $offenses = $db->query("SELECT * FROM booking WHERE inmate='$inmate[id]'"); ?>
				<label>Charges</label>
				<ul class="offenses">
					<?php while ($offense = $offenses->fetchArray()) : ?>
						<li>
							<span class="offense"><?php echo $offense['charge']; ?></span>
							<span class="date"><?php echo date('F j, Y', $offense['datetime']); ?></span>
						</li>
					<?php endwhile; ?>
				</ul>
			</form>
		</div>
	</div>
<?php endif; ?>

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
				<label>Basic Details</label>
				<span>First name</span><input type="text" name="first_name" value="<?php echo "$inmate[first_name]"; ?>"/>
				<span>Middle name</span><input type="text" name="middle_name" value="<?php echo "$inmate[middle_name]"; ?>"/>
				<span>Last name</span><input type="text" name="last_name" value="<?php echo "$inmate[last_name]"; ?>"/>
				<label>Physical Description</label>
				<span>Sex</span><select name="sex">
					<option value="male"<?php if ($inmate['sex'] == 'male') echo ' selected'; ?>>Male</option>
					<option value="female"<?php if ($inmate['sex'] == 'female') echo ' selected'; ?>>Female</option>
					<option value="intersex"<?php if ($inmate['sex'] == 'intersex') echo ' selected'; ?>>Intersex</option>
				</select>
				<span>Height</span><input type="text" name="height" value="<?php echo $inmate['height']; ?>"/>
				<span>Weight</span><input type="text" name="weight" value="<?php echo $inmate['weight']; ?>" />
				<label>Charges</label>
				<ul class="offenses">
					<?php $offenses = $db->query("SELECT * FROM booking WHERE inmate='$inmate[id]'"); ?>
					<?php while ($offense = $offenses->fetchArray()) : ?>
						<li>
							<span class="offense"><?php echo $offense['charge']; ?></span>
							<span class="date"><?php echo date('F j, Y', $offense['datetime']); ?></span>
						</li>
					<?php endwhile; ?>
				</ul>
				<br />
				<label>Property</label>
				<ul class="property">
					<?php $property = $db->query("SELECT description FROM property WHERE inmate='$inmate[id]'"); ?>
					<?php while ($item = $property->fetchArray()) : ?>
						<li><span><?php echo $item['description']; ?></span></li>
					<?php endwhile; ?>
				</ul>
			</form>
		</div>
	</div>
<?php endif; ?>

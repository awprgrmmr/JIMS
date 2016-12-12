<?php $inmates = $db->query("SELECT * FROM inmates"); ?>
<table>
	<tr>
		<th colspan="2">List of Inmates</th>
		<th>Offenses</th>
	</tr>
	<tr>
		<td colspan="5"><a href="inmate/new">Add a new inmate</a></td>
	</tr>
	<?php while ($inmate = $inmates->fetchArray()) : ?>
	<tr>
		<td class="id"><?php echo "<a href='inmate/$inmate[id]'>$inmate[id]</a>"; ?></td>
		<td class="name"><?php echo "<a href='inmate/$inmate[id]'>$inmate[last_name], $inmate[first_name]</a>"; ?></td>
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

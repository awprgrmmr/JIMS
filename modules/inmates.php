<?php $db = new SQLite3("assets/data/jims.db"); ?>
<?php $inmates = $db->query("SELECT * FROM inmates"); ?>
<div id="booking">
	<table>
			<tr>
				<th colspan="2">List of Inmates</th>
				<th>Offenses</th>
			</tr>
		<?php while ($inmate = $inmates->fetchArray()) : ?>
			<tr>
				<td class="id"><a href="#"><?php echo $inmate['id']; ?></a></td>
				<td class="name"><a href="#"><?php echo $inmate['name']; ?></a></td>
				<td class="offense">
					<?php
					$offenses = $db->query("SELECT charge FROM booking WHERE inmate='" . $inmate['id'] ."'");
					$string = '';
					while ($offense = $offenses->fetchArray())
						$string .= $offense['charge'] . ', ';
					echo substr($string, 0, -2);
					?>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>
</div>

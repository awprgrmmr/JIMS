<?php
  if ($query != 'new') {
    $inmates = $db->query("SELECT * FROM inmates WHERE id=$query");
    $inmate = $inmates->fetchArray();
  }
?>
<div class="boxed">
  <h3><?php echo "Inmate #$inmate[id]"; ?></h3>
  <div>
    <form class="clearfix">
      <label>Basic Details</label>
      <span>First name</span><?php Input('first_name', $inmate['first_name']); ?>
      <span>Middle name</span><?php Input('middle_name', $inmate['middle_name']); ?>
      <span>Last name</span><?php Input('last_name', $inmate['last_name']); ?>
      <span>SSN#</span><?php Input('ssn', $inmate['ssn']); ?>
      <span>DL#</span><?php Input('dl', $inmate['dl']); ?>
      <span>Foreign?</span><select name="foreign">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
      <span>Date of Birth</span><?php Input('dob', date('Y-m-d', $inmate['dob']), 'date'); ?>
      <span>Birthplace</span><?php Input('birthplace', $inmate['birthplace']); ?>
      <span>AKAs</span><?php Input('aka', $inmate['aka']); ?>
      <span>Education</span><?php Input('education', $inmate['education']); ?>
      <span>Occupation</span><?php Input('occupation', $inmate['occupation']); ?>
      <span>Emergency Contact</span><?php Input('contact', $inmate['contact']); ?>
      <span>Permanent Address</span><?php Input('perm_address', $inmate['perm_address']); ?>
      <span>Temporary Address</span><?php Input('temp_address', $inmate['temp_address']); ?>
      <label>Physical Description</label>
      <span>Sex</span><select name="sex">
        <option value="male"<?php if ($inmate['sex'] == 'male') echo ' selected'; ?>>Male</option>
        <option value="female"<?php if ($inmate['sex'] == 'female') echo ' selected'; ?>>Female</option>
        <option value="intersex"<?php if ($inmate['sex'] == 'intersex') echo ' selected'; ?>>Intersex</option>
      </select>
      <span>Height</span><?php Input('height', $inmate['height']); ?>
      <span>Weight</span><?php Input('weight', $inmate['weight']); ?>
      <label>Charges</label>
      <ul class="offenses">
        <?php $offenses = $db->query("SELECT * FROM booking WHERE inmate='$inmate[id]'"); ?>
        <?php $offense = $offenses->fetchArray(); ?>
        <li>
          <?php Input('charge', $offense['charge']); ?>
          <?php Input('datetime', date('Y-m-d', $offense['datetime']), 'date'); ?>
          <?php Input('agency', $offense['agency']); ?>
          <?php Input('documents', $offense['documents']); ?>
          <?php Input('clerk', $offense['clerk']); ?>
          <?php Input('officer', $offense['officer']); ?>
        </li>
        <?php //while ($offense = $offenses->fetchArray()) : ?>
          <!--<li>
            <input type="text" name="charge" value="<?php echo $offense['charge']; ?>" />
            <input type="date" name="datetime" value="<?php echo date('Y-m-d', $offense['datetime']); ?>" />
          </li>-->
        <?php // endwhile; ?>
      </ul>
      <label>Property</label>
      <ul class="property">
        <?php $property = $db->query("SELECT description FROM property WHERE inmate='$inmate[id]'"); ?>
        <?php $item = $property->fetchArray(); ?>
        <li><?php Input('description', $item['description']); ?></li>

        <?php //while ($item = $property->fetchArray()) : ?>
          <!--<li><input type="text" name="description" value="<?php echo $item['description']; ?>"></li>-->
        <?php //endwhile; ?>
      </ul>
      <input type="hidden" name="action" value="updateinmate" />
      <input type="hidden" name="id" value="<?php if ($query != 'new') echo $inmate['id']; ?>" />
      <input type="submit" value="Save Inmate" />
    </form>
  </div>
</div>

<form class="navbar-search hidden-phone" action="<?php echo url_for('change_language') ?>">
  <?php //echo $form 
//we create a value to always generate a unique token for us. he he he he
 //$token = sha1(date('d-m-Y').rand(11111, 99999)) ;  Failed to work as expected.
  
  ?>
  <tr>
  <th><label for="language"> <?php echo __('Language') ?></label></th>
  <td><select name="language" id="language">
  <optgroup><option value="rw"><?php echo __('Kinyarwanda') ?></option></optgroup>
  <optgroup><option value="fr"><?php echo __('French') ?></option></optgroup>
  <optgroup><option value="en"><?php echo __('English') ?></option></optgroup>
  </select><?php echo $form['_csrf_token']->render() ?></td>
</tr>  
  <input type="submit" value="ok" />
</form>
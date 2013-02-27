<?php use_helper('Date') ?>

	<?php foreach ($messages as $message): ?>
       

	<tr>
		<td class=""><span title="<?php echo format_datetime($message['created_at']) ?>"><?php echo date("H:i:s", strtotime($message['created_at'])) ?></span></td>
		<td class=""><?php echo $message['sfGuardUser']['username'] ?></td>
		<td class=""><?php echo $message['message'] ?></td>
	</tr>

	<?php endforeach; ?>

<?xml version="1.0" encoding="utf-8"?>
<objects>
<?php if (!($objects->isEmpty())): ?>
	<?php $objects = $objects->toArray();?>
	<?php foreach ($objects as $object): ?>
		  <object id="<?php echo $object['Id']?>">
		<?php foreach ($object as $key => $value): ?>
		    <<?php echo $key ?>><?php echo $value ?></<?php echo $key ?>>
		<?php endforeach; ?>
		  </object>
	<?php endforeach; ?>
<?php endif;?>
</objects>
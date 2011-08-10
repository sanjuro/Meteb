<?php if (!($objects->isEmpty())): ?>
    <?php $objects = $objects->toArray();?>
	<?php foreach ($objects as $object): ?>
	-
		<?php foreach ($object as $key => $value): ?>
		  <?php echo $key ?>: <?php echo sfYaml::dump($value) ?>
		
		<?php endforeach ?>
	<?php endforeach ?>
<?php endif; ?>
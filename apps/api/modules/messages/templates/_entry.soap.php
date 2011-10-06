<objects>
<?php if (!empty($results)): ?>
	<?php foreach ($results as $key => $object): ?>
	<?php $object = $object->toArray();?>
		  <object id="<?php echo $key?>">
        		<?php foreach ($object as $innerkey => $value): ?>
        		    <<?php echo $innerkey ?>><?php echo $value ?></<?php echo $innerkey ?>>
        		<?php endforeach; ?>
		  </object>
	<?php endforeach;?>
<?php endif;?>
</objects>
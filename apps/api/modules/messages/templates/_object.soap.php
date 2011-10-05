<object id="<?php echo $object['id'] ?>">
  <?php foreach ($object as $key => $value): ?>
    <<?php echo $key ?>><?php echo $value ?></<?php echo $key ?>>
  <?php endforeach ?>
</object>
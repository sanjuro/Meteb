[
<?php $nb = $objects->count(); $i = 0; $objects = $objects->toArray(); foreach ($objects as $object): ++$i ?>
{
<?php $nb1 = $object->count(); $j = 0; foreach ($object as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>

<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>

<?php endforeach ?>
]
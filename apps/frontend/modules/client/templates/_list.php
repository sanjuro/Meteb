<?php use_stylesheet('table.css') ?>

<table class="clients">
  <tr>
  	<th>ID</th>
  	<th>Name</th>
  	<th></th>
  <tr>
  <?php foreach ($clients as $i => $client): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>" valign="middle" onmouseover="this.style.backgroundColor='#F2F2F2';" onmouseout="this.style.backgroundColor='white';" style="background-color: rgb(242, 242, 242); ">
      <td>
      	<?php echo $client->getIdnumber() ?>
      </td>
      <td>
     	 <?php echo $client->getName().' '.$client->getSurname() ?>
      </td>
      <td>
	  	<ul class="sf_admin_actions" style="display:inline;">
		  <li class="sf_admin_action_edit"><?php echo link_to( __('Edit'), url_for( 'client_edit', $client ) ) ?></li>  
 		  <li class="sf_admin_action_delete"><?php echo link_to( __('Delete'), url_for( 'client_delete', $client ) ) ?></li>  
	  	</ul>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
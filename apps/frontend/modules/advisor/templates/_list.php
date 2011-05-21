<?php use_stylesheet('/sfDoctrinePlugin/css/default.css') ?>

<?php use_helper('jQuery')?>

<div id="sf_admin_container">
<div id="sf_admin_content">
<div class="sf_admin_list">
<table class="advisors">
  <tr>
  	<th>ID</th>
  	<th>Name</th>
  	<th></th>
  <tr>
  <?php foreach ($advisors as $i => $advisor): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>" valign="middle" onmouseover="this.style.backgroundColor='#F2F2F2';" onmouseout="this.style.backgroundColor='#DDDDDD';" style="background-color: rgb(242, 242, 242); ">
      <td>
      	<?php echo $advisor['UserProfile'][0]['idnumber'] ?>
      </td>
      <td>
     	 <?php echo $advisor['UserProfile'][0]['name'].' '.$advisor['UserProfile'][0]['surname'] ?>
      </td>
      <td>
	  	<ul class="sf_admin_actions" style="display:inline;">
		  <li class="sf_admin_action_edit"><?php echo link_to('Edit', url_for( 'advisor_edit', $advisor ) ) ?></li>  
 		  <li class="sf_admin_action_delete"><?php echo link_to( 'Delete', url_for( 'advisor_delete', $advisor ) ) ?></li>  
	  	</ul>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
</div>
</div>
</div>
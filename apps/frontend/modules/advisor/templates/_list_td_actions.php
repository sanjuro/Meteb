<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($sf_guard_user, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    
    <?php if($sf_guard_user->getIsActive()): ?>
    <li class="sf_admin_action_disable">
      <?php echo link_to(__('Disable', array(), 'messages'), 'client/ListDisable?id='.$sf_guard_user->getId(), array()) ?>
    </li>
    <?php endif;?>
    
    <?php if(!($sf_guard_user->getIsActive())): ?>
    <li class="sf_admin_action_enable">
      <?php echo link_to(__('Enable', array(), 'messages'), 'client/ListEnable?id='.$sf_guard_user->getId(), array()) ?>
    </li>
     <?php endif;?>
  </ul>
</td>

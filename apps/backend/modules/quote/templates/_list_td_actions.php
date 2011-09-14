<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToRefresh($quote, array(  'params' =>   array(  ),  'class_suffix' => 'refersh',  'label' => 'Refresh',)) ?>
    <?php echo $helper->linkToDelete($quote, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <li class="sf_admin_action_generate">
      <?php echo link_to(__('Generate', array(), 'messages'), url_for('quote_generate', $quote), array()) ?>
    </li>
  </ul>
</td>

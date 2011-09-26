<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <!--<?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>-->
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndPdf($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_pdf',  'label' => 'Save and PDF',)) ?>
<?php else: ?>
  <!--<?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>-->
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndPdf($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_pdf',  'label' => 'Save and PDF',)) ?>
  <?php echo $helper->linkToGenerate($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'generate_pdf',  'label' => 'Generate Quote',)) ?>
<?php endif; ?>
</ul>

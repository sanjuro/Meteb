<?php if ($this->getParameterValue('list.object_actions')): ?>

<ul class="sf_admin_td_actions">
<?php foreach ($this->getParameterValue('list.object_actions') as $actionName => $params): ?>
  <?php echo $this->addCredentialCondition($this->getLinkToAction($actionName, $params, true), $params) ?>
<?php endforeach; ?>
</ul>

<?php endif; ?>

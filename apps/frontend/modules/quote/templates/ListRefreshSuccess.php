<?php use_helper('I18N', 'Date') ?>
<?php include_partial('quote/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Refresh Quote', array(), 'messages') ?></h1>

  <?php include_partial('quote/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('quote/form_header', array('quote' => $quote, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('quote/form', array('quote' => $quote, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('quote/form_footer', array('quote' => $quote, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

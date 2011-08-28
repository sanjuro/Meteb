<?php use_helper('I18N', 'Date') ?>
<?php include_partial('quote/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Your Quotes', array(), 'messages') ?></h1>

  <?php include_partial('quote/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('quote/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content" style="padding-right:10px;width: 100%;">
    <form action="<?php echo url_for('quote_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('quote/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('quote/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('quote/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>


  <div id="sf_admin_footer">
    <?php include_partial('quote/list_footer', array('pager' => $pager)) ?>
  </div>
  
  <div class="clearer" style="width:20px;"></div>
</div>
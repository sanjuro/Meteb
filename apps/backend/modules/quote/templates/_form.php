<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@quote') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

	<fieldset>
		<legend>Client Info</legend>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['client_id']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['client_id'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Client ID</b> the id of the client') ?>" class="tip">
			</div>			
			<?php echo $form['client_id']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['main_sex']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['main_sex'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Main Gender</b> the sex of the client') ?>" class="tip">
			</div>			
			<?php echo $form['main_sex']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['main_dob']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['main_dob'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Main DOB</b> the date of birth of the client') ?>" class="tip">
			</div>			
			<?php echo $form['main_dob']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['second_life']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['second_life'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Second Life</b> whether to include the spouses life in the quote') ?>" class="tip">
			</div>			
			<?php echo $form['second_life']->renderError() ?>
		 </div>
	</fieldset>
	<fieldset id="quote_spouse_details" style="display:none;"> 
		<legend>Spouse Details</legend>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['spouse_sex']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['spouse_sex'] ?>
			</div>			
			<?php echo $form['spouse_sex']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['spouse_dob']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['spouse_dob'] ?>
			</div>			
			<?php echo $form['spouse_dob']->renderError() ?>
		 </div>			
	</fieldset>
	<fieldset>
		<legend>Quote Details</legend>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['gp']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['gp'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Guaranteed Periond</b> the guarantee period of the quote') ?>" class="tip">
			</div>			
			<?php echo $form['gp']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['spouse_reversion']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['spouse_reversion'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Spouse Reversion</b> the spouse reversion if second life is factored in') ?>" class="tip">
			</div>			
			<?php echo $form['spouse_reversion']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['purchase_price']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['purchase_price'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Purchase Price</b> the purchase price of the quote') ?>" class="tip">
			</div>			
			<?php echo $form['purchase_price']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['commission']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['commission'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Commission</b> the commission for the quote') ?>" class="tip">
			</div>			
			<?php echo $form['commission']->renderError() ?>
		 </div>
	</fieldset>
    
	<?php include_partial('quote/form_actions', array('quote' => $quote, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_helper('jQuery')?> 

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@quote') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
    
   <?php  foreach ($form->getErrorSchema() as $sField => $sError) : ?>
	    <div class="error">
		<?php  echo $sField.': '.$sError.'<br />' ?>
		</div>
   <?php  endforeach; ?>
   
      <h3>
      	Which type of quote would you like?
      	 <?php echo $form['quote_type_id'] ?> 
      </h3>
    
	<fieldset>
		<legend>Client Info</legend>
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
				<?php echo $form['pri']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['pri'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Post Retriement Interest Rate</b> the pri for the quote') ?>" class="tip">
			</div>			
			<?php echo $form['pri']->renderError() ?>
		 </div>
		 <div id="spouse_reversion_field"  class="sf_admin_form_row" style="display:none;">			
			<div>
				<?php echo $form['spouse_reversion']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['spouse_reversion'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Spouse Reversion</b> the spouse reversion if second life is factored in') ?>" class="tip">
			</div>			
			<?php echo $form['spouse_reversion']->renderError() ?>
		 </div>
		 <div id="annuity_field" class="sf_admin_form_row" style="display:none;">			
			<div>
				<?php echo $form['annuity']->renderLabel() ?>
			</div>
			
			<div class="content" >
				<?php echo $form['annuity'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Annuity</b> the annuity of the quote') ?>" class="tip">
			</div>			
			<?php echo $form['annuity']->renderError() ?>
		 </div>
		 <div id="purchase_price_field" class="sf_admin_form_row">			
			<div>
				<?php echo $form['purchase_price']->renderLabel() ?>
			</div>
			
			<div class="content" >
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
<script>
$(document).ready(function() {

	$('#<?php echo $form['quote_type_id']->renderId() ?>').change(function() {
		if($('#<?php echo $form['quote_type_id']->renderId() ?>').val() == 2){
			 $("#purchase_price_field").css('display', 'block');
			 $("#annuity_field").css('display', 'none');
			 $("#<?php echo $form['annuity']->renderId() ?>").val('0.00');
		}else{
			 $("#annuity_field").css('display', 'block');
			 $("#purchase_price_field").css('display', 'none');
			 $("#<?php echo $form['purchase_price']->renderId() ?>").val('0.00');
		}
		 return false;
	});

	$('#<?php echo $form['second_life']->renderId() ?>').change(function() {
		if($('#<?php echo $form['second_life']->renderId() ?>').val() == 1){
			 $("#quote_spouse_details").css('display', 'block');
			 $("#spouse_reversion_field").css('display', 'block');
		}else{
			 $("#quote_spouse_details").css('display', 'none');
			 $("#spouse_reversion_field").css('display', 'block');
		}
		 return false;
	});
	
});
</script>
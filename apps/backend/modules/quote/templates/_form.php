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
    
	<fieldset>
		<legend>Client Info</legend>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['client_id']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['client_id'] ?>
				<img src="/images/backend/help_24.png" title="<?php echo __('Please enter the client\'s ID number') ?>" class="tip">
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
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Joint life application?</b> Do you want your pension to continue to your spouse when you pass away?') ?>" class="tip">
			</div>			
			<?php echo $form['second_life']->renderError() ?>
		 </div>
	</fieldset>
	
	<?php if ($quote->getSecondLife() == 1): ?>
	<fieldset id="quote_spouse_details"> 
	<?php else: ?>
	<fieldset id="quote_spouse_details" style="display:none;"> 
	<?php endif;?>
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
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Guarantee Periond</b> Annuities are guaranteed to be paid for life; additionally you can opt for a guaranteed minimum payment period.') ?>" class="tip">
			</div>			
			<?php echo $form['gp']->renderError() ?>
		 </div>
		
		<?php if ($quote->getSecondLife() == 1): ?>
		 <div id="spouse_reversion_field"  class="sf_admin_form_row">		
		<?php else: ?>
		 <div id="spouse_reversion_field"  class="sf_admin_form_row" style="display:none;">		
		<?php endif;?>
			<div>
				<?php echo $form['spouse_reversion_id']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['spouse_reversion_id'] ?> %
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Spouse\'s Reversion</b> Should the annuity amount reduce on your death? Selecting a reduced level of continuing pension for your partner on your death will give you a larger initial annuity amount.') ?>" class="tip">
			</div>		
			<?php echo $form['spouse_reversion_id']->renderError() ?>
		 </div>	 
		 <div class="sf_admin_form_row">			  		
			<div>			
				<div style="float:left;padding-right:10px;">
				Please provide a
				<?php echo $form['quote_type_id'] ?>
				</div>
				
				<div id="annuity_field">
				quote for Purchase Price of
				<span class="small">
				<?php echo $form['purchase_price'] ?>
				</span>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Purchase Price</b>The value of your accumulated pension fund with which you wish to purchase your annuity') ?>" class="tip">
				<?php echo $form['purchase_price']->renderError() ?>
				</div>	
				
				<div id="purchase_price_field" style="display:none;padding-right:10px;">
				quote for monhtly Annuity of
				<span class="small">
				<?php echo $form['annuity'] ?>
				</span>
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Monthly Annuity</b> The initial monthly annuity you would like to receive from Momentum when you retire.') ?>" class="tip">
				<?php echo $form['annuity']->renderError() ?>
				</div>	
			</div>			
			<?php echo $form['quote_type_id']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['commission_id']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['commission_id'] ?> %
				<img src="/images/backend/help_24.png" title="<?php echo __('<b>Commission</b> the commission for the quote') ?>" class="tip">
			</div>			
			<?php echo $form['commission_id']->renderError() ?>
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
			 $("#<?php echo $form['spouse_reversion_id']->renderId() ?>").val('');
			 $("#spouse_reversion_field").css('display', 'none');
			 
		}
		 return false;
	});


	$(function() {
		var params = {
		changeMonth : true,
		changeYear : true,
		numberOfMonths : 1,
		showButtonPanel : false };
		yearRange: '1930:2010'
		$('#<?php echo $form['main_dob']->renderId() ?>').datepicker(params);
	}); 


	
});
</script>
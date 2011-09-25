<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
 
<?php use_helper('jQuery')?> 

<?php use_stylesheet('/sfDoctrinePlugin/css/default.css') ?>
 
<?php echo $form->renderGlobalErrors() ?>
 
<?php // foreach ($form->getErrorSchema() as $sField => $sError) : ?>
<?php // echo $sField.': '.$sError.'<br />' ?>
<?php // endforeach; ?>
<?php echo form_tag_for($form, '@profile') ?>

	  <?php echo $form['_csrf_token'] ?>
	  <?php echo $form['userProfiles'][0]['parent_user_id'] ?>

      <fieldset id="sf_fieldset_user"> 

		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['userProfiles'][0]['idnumber']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['idnumber'] ?>
			</div>			
			<?php echo $form['userProfiles'][0]['idnumber']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['username']->renderLabel() ?>
			</div>
			
			<div class="content" >
				<?php echo $form['username'] ?>
			</div>			
			<?php echo $form['username']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">		
			<div>
				<?php echo link_to('Change your password', 'profile_change_password', $sf_guard_user)?>
			</div>		
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['email_address']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['email_address'] ?>
			</div>			
			<?php echo $form['email_address']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	
			<div>
				<?php echo $form['userProfiles'][0]['title']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['title'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['title']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	
			<div>
				<?php echo $form['userProfiles'][0]['name']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['name'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['name']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['surname']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['surname'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['surname']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['dob']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['dob'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['dob']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['gender_id']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['gender_id'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['gender_id']->renderError() ?>
		 </div>
      </fieldset>
  
	  <?php if ($sf_user->hasGroup('advisor')): ?>
      <fieldset id="sf_fieldset_user">  
      	<h2>Advisor Details</h2>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['fsp_license_number']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['fsp_license_number'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['fsp_license_number']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['company']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['company'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['company']->renderError() ?>
		 </div>		 
      </fieldset>      
      <?php endif; ?>
      
      <fieldset id="sf_fieldset_user">  
      	<h2>Contact Details</h2>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['postaladdress']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['postaladdress'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['postaladdress']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['streetaddress']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['streetaddress'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['streetaddress']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['telephone']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['telephone'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['telephone']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['mobile']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['mobile'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['mobile']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['fax']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['fax'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['fax']->renderError() ?>
		 </div>
      </fieldset>
 	  
<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><a href="<?php echo url_for('homepage') ?>">Back to Home</a></li>  
  <li class="sf_admin_action_save"><input type="submit" value="Save"></li>  </ul>
</form>

		
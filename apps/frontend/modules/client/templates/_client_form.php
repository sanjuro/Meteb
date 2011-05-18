<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
 
<?php use_stylesheet('/sfDoctrinePlugin/css/default.css') ?>
 
<?php echo $form->renderGlobalErrors() ?>

<ul class="error_list">
        <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
          <li><?php echo $name.': '.$error ?></li>
        <?php endforeach; ?>
 </ul>
 
<?php echo form_tag_for($form, '@client') ?>
	  <?php echo $form['_csrf_token'] ?>
      <fieldset id="sf_fieldset_user"> 
         <h2>User Details</h2>
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
			
			<div  class="content" >
				<?php echo $form['username'] ?>
			</div>			
			<?php echo $form['username']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['password']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['password'] ?>
			</div>			
			<?php echo $form['password']->renderError() ?>
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
				<?php echo $form['userProfiles'][0]['company']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['company'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['company']->renderError() ?>
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
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['status_id']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['status_id'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['status_id']->renderError() ?>
		 </div>
      </fieldset>
      
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
      
      <fieldset id="sf_fieldset_user">  
      	<h2>Spouse Details</h2>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['userProfiles'][0]['spouseidnumber']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['spouseidnumber'] ?>
			</div>			
			<?php echo $form['userProfiles'][0]['spouseidnumber']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['userProfiles'][0]['spousename']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['spousename'] ?>
			</div>			
			<?php echo $form['userProfiles'][0]['spousename']->renderError() ?>
		 </div>
		 <div class="sf_admin_form_row">			
			<div>
				<?php echo $form['userProfiles'][0]['spousesurname']->renderLabel() ?>
			</div>
			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['spousesurname'] ?>
			</div>			
			<?php echo $form['userProfiles'][0]['spousesurname']->renderError() ?>
		 </div>
		 		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['spouse_gender_id']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['spouse_gender_id'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['spouse_gender_id']->renderError() ?>
		 </div>		 
		 <div class="sf_admin_form_row">	 
			<div>
				<?php echo $form['userProfiles'][0]['spousedob']->renderLabel() ?>
			</div>			
			<div  class="content" >
				<?php echo $form['userProfiles'][0]['spousedob'] ?>
			</div>
			<?php echo $form['userProfiles'][0]['spousedob']->renderError() ?>
		 </div>
 	  </fieldset>
 	  
<ul class="sf_admin_actions">
  <li class="sf_admin_action_delete"><a href="/frontend_dev.php/guard/users/1" onclick="if (confirm('Are you sure?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'post'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'sf_method'); m.setAttribute('value', 'delete'); f.appendChild(m);var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_csrf_token'); m.setAttribute('value', 'e96bce5176a9d13d7028de6eb644f160'); f.appendChild(m);f.submit(); };return false;">Delete</a></li>  
  <li class="sf_admin_action_list"><a href="/frontend_dev.php/guard/users">Back to list</a></li>  
  <li class="sf_admin_action_save"><input type="submit" value="Save"></li>  </ul>
</form>
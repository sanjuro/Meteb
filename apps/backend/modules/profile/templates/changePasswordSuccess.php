<?php use_helper('I18N') ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_stylesheet('/sfDoctrinePlugin/css/default.css') ?>

<h2><?php echo __('Hello %name%', array('%name%' => $sf_guard_user->getName()), 'sf_guard') ?></h2>

<h3><?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?></h3>

<?php echo $form->renderGlobalErrors() ?>

<div id="sf_admin_container">

<div id="sf_admin_content">
	<form action="<?php echo url_for('profile_change_password', $sf_guard_user) ?>" method="POST">
	
	      <fieldset id="sf_fieldset_user">
	      	<?php echo $form['_csrf_token'] ?>
	      
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
					<?php echo $form['password_again']->renderLabel() ?>
				</div>
				
				<div  class="content" >
					<?php echo $form['password_again'] ?>
				</div>			
				<?php echo $form['password_again']->renderError() ?>
			 </div>
		</fieldset>
	    <input type="submit" name="change" value="<?php echo __('Change', null, 'sf_guard') ?>" />
	</form>
</div>

</div>
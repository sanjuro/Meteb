<?php use_helper('I18N') ?>

<form class="login" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

  <?php echo $form['_csrf_token'] ?>
  <fieldset class="formContainer">  
  	<legend><?php echo __('Log in') ?></legend>
	 <?php echo $form['username']->renderLabel() ?></th>
	 <br>
	 <?php echo $form['username'] ?>	
	 <br>
	
	 <?php echo $form['username']->renderError() ?>
	 <br></br>
	 <?php echo $form['password']->renderLabel() ?></th>
	 <br>
	 <?php echo $form['password'] ?>	
	 <br>
	 <?php echo $form['password']->renderError() ?>
	 <br><?php echo $form['remember']->renderLabel() ?>	
		 <?php echo $form['remember'] ?>	
	 <br> 
	 <?php echo $form['remember']->renderError() ?>
	
	          
	 <?php $routes = $sf_context->getRouting()->getRoutes() ?>
	 <?php if (isset($routes['sf_guard_forgot_password'])): ?>
	            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
	 <?php endif; ?>
	
	  <?php if (isset($routes['sf_guard_register'])): ?>
	          &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
	  <?php endif; ?>
	
	   <div class="clearer" style="height:20px;"></div>
	  <div>
		<input type="submit"  value="<?php echo __('Log In', null, 'sf_guard') ?>" />
	 </div>
	 <div class="clearer" style="height:20px;"></div>
  </fieldset>
  <div class="clearer"></div>
</form>


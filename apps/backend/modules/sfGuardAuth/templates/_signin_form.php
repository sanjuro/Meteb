<?php use_helper('I18N') ?>
<?php use_stylesheet('login.css') ?>


<div id="formWrapper">
	
	<div id="formCasing">

	<h1>Log In</h1>

	<div id="loginForm">	
	
	<form name="loginForm" class="login" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	
	<?php echo $form['_csrf_token'] ?>
	
	 <?php $routes = $sf_context->getRouting()->getRoutes() ?>

	
	  <?php if (isset($routes['sf_guard_register'])): ?>
	          &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
	  <?php endif; ?>
  	<dl>
		<dt><label for="username">Username</label></dt>
		<dd><?php echo $form['username'] ?>	<?php echo $form['username']->renderError() ?></dd>
		<dt><?php echo $form['password']->renderLabel() ?></dt>
		<dd><?php echo $form['password'] ?>	<?php echo $form['password']->renderError() ?>

			 <?php if (isset($routes['sf_guard_forgot_password'])): ?>
			            <span>&nbsp;&nbsp;<a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a></span>
			 <?php endif; ?>
			 
			  <?php if (isset($routes['sf_guard_register'])): ?>
			          &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
			  <?php endif; ?>
			
		</dd>
		<dt><label for="remember"><?php echo $form['remember']->renderLabel() ?></label></dt>
		<dd><?php echo $form['remember'] ?>	<?php echo $form['remember']->renderError() ?></dd>
		
		<dd><input type="submit"  value="<?php echo __('Log In', null, 'sf_guard') ?>" /></dd>
	</dl>
  	</form>
	
	</div>	
	
	</div>
	
	<div id="formFooter"></div>

</div>


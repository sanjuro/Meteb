<div class="login">
<?php if(!$sf_user->isAuthenticated()) :?>    	
	<?php include_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
<?php endif; ?>
</div>


<p>Momentum  Employee Benefits<br></p>

<div class="login">
<?php if(!$sf_user->isAuthenticated()) :?>    	
	<?php include_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
<?php endif; ?>
</div>
<h1>Welcome to Momentum Employee Benefits Annuities.</h1> 
<p>We provide annuity quotations online for individuals who are close to retirement.<br>
Please log in to request a quotation. You can adjust your quotes to your suit your specific circumstances and needs to get the most value from your investment.
</p>

<h1>What you can find on this site:</h1>

<p>You can <span style="color:red;"><?php echo link_to('click here', url_for('@page_annuityexplained')) ?></span> to read more about annuity investments and what advantages they can offer to you.</p> 
<p>Look at all the options you can select for your annuity and see how they affect your quote by clicking <?php echo link_to('here', url_for('@page_annuityoptions')) ?>.</p>
<p>View the historical increases that have been awarded and download product brochures <?php echo link_to('here', url_for('@page_downloads')) ?>.</p>

<p>If you are close to retirement and need to invest in an annuity you are at the right place. If you require assistance please do not hesitate to <?php echo link_to('contact us', url_for('@page_contact')) ?> or have a scan through the <?php echo link_to('help', url_for('@page_help')) ?> section.</p>
<p><a href="http://www.meteb.co.za" target="_blank">Click here</a> to visit the Momentum Employee Benefits website.</p>

<br>
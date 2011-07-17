<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>
	  <?php if (!include_slot('title')): ?>
	    Momentum
	  <?php endif; ?>
	</title>
    <link rel="shortcut icon" href="/favicon.ico" />

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="wrapper">
        <div id="header">
        	<ul id="navigation">
        		<li><?php echo link_to('Home', url_for('@homepage')) ?></li>
        		<li><?php echo link_to('Your quotes', url_for('@quote')) ?></li>
        		<li><?php echo link_to('Glossary', url_for('@homepage')) ?></li>
        	</ul>
        </div>
        <div id="content">
        	<div id="rightcolumn">
        	</div>
        	<div id="center">
			    				    	
			       <div id="rightcolumn" class="column">
			       		Welcome, <?php echo $sf_user->getUsername() ?>
			       		<b><?php echo link_to('Logout', 'sf_guard_signout', array(), array( "class" => "logout")) ?></b>
			       		<br>
			       		<?php include_partial('navigation/navigation'); ?>
			       </div>
			       
			       <div id="centercolumn" class="column">	
			       
					<?php if ($sf_user->hasFlash('notice')): ?>
					          <div class="flash_notice">
					            <?php echo $sf_user->getFlash('notice') ?>
					          </div>
					<?php endif; ?>
					 
				
					<?php if ($sf_user->hasFlash('error')): ?>
					          <div class="flash_error">
					            <?php echo $sf_user->getFlash('error') ?>
					         </div>
					<?php endif; ?>
					       
        	      	 <?php echo $sf_content ?>        	      	 
			       </div>
        	       
        	       <div class="clearer" ></div>
        	</div>
        </div>        
        <div id="footer">
        	<p>&copy;   2011      All Rights Reserved - Momentum Life Limited is an authorised financial services and credit provider</p>
        </div>
    </div>
  </body>
</html>

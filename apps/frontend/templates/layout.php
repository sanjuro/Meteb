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
    <div class="container">
	  <div class="header"><!-- end .header -->
	    <div class="top_navigation">
        	<ul id="navigation">
        		<li><?php echo link_to('Home', url_for('@page_homepage')) ?></li>
        		
        		<?php if($sf_user->isAuthenticated()) :?>   
        		<li><?php echo link_to('Your quotes', url_for('@quote')) ?></li>
        		<li><?php echo link_to('Your profile', url_for('profile_edit', $sf_user->getGuardUser())) ?></li>
        		<?php endif; ?>
        		    
		        <li><?php echo link_to('Informational Toolbox', url_for('@page_toolbox')) ?></li>    
		        <li><?php echo link_to('Glossary', url_for('@page_glossary')) ?></li>   
		        <li><a href="toolbox.html">About Us</a></li>
		        <li><?php echo link_to('Contact Us', url_for('@page_contact')) ?></li>
        	</ul>
	    </div>
	  </div>
	  <?php if($sf_user->isAuthenticated()) :?> 
	  <div id="loginTop">
	  	<a href="<?php echo url_for('profile_edit', $sf_user->getGuardUser() )?>">Log In: <?php echo $sf_user->getGuardUser()->getUsername() ?> - You are currently logged in :<?php echo $sf_user->getGuardUser()->getUsername() ?> </a>
 		| <?php echo link_to(__('Log Out'), 'sf_guard_signout', array(), array( "class" => "logout")) ?>
	  </div>
	  <?php else :?>
	  <div id="loginTop">
	  	 You are currently not logged in
	  </div>
	  <?php endif; ?>

	  
	  <!-- InstanceBeginEditable name="maincontent" -->
        <div class="content">

        	<div id="center">			    				
			       
			       <div id="centercolumn" class="column">	
			       
					<?php if ($sf_user->hasFlash('notice')): ?>
					          <div id="flash_notice" class="flash_notice">
					            <?php echo $sf_user->getFlash('notice') ?>
					            
					            <div style="float:right;"><button onclick="$('#flash_notice').hide()">hide</button></div>
					          </div>
					<?php endif; ?>
					 
				
					<?php if ($sf_user->hasFlash('error')): ?>
					          <div id="flash_error" class="flash_error">
					            <?php echo $sf_user->getFlash('error') ?>
					            
					            <div style="float:right;"><button onclick="$('#flash_notice').hide()">hide</button></div>
					         </div>
					<?php endif; ?>
					       
        	      	 <?php echo $sf_content ?>        	      	 
			       </div>
        	       
        	       <div class="clearer" ></div>
        	</div>
        </div>        
        <div class="footer">
        	<p>&copy;   2011      All Rights Reserved - Momentum Life Limited is an authorised financial services and credit provider</p>
        </div>
    </div>
  </body>
</html>

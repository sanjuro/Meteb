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
        <div id="headerwrapper">
        	<div id="header">
        	        	
        	</div>
        </div>
        <div id="navigationwrapper">

			    	<div id="navigation">
					<?php if ($sf_user->isAuthenticated()): ?>					
					    <ul id="backendnavigation">
						  <li><?php echo link_to(__('Profiles'), 'userprofile') ?></li>
					      <?php if ($sf_user->isSuperAdmin()): ?>
					      <li><?php echo link_to(__('Users'), 'sf_guard_user', array(), array( "class" => "users")) ?></li>
					      <li><?php echo link_to(__('Groups'), 'sf_guard_group', array(), array( "class" => "group")) ?></li>
					       <li><?php echo link_to(__('Permissions'), 'sf_guard_permission', array(), array( "class" => "group")) ?></li>
					      <?php endif; ?>					
					      <li><?php echo link_to(__('Logout'), 'sf_guard_signout', array(), array( "class" => "logout")) ?></li>
					
					    </ul>		
					<?php endif; ?>						
					</div>

		</div>
        <div id="contentwrapper">
        
        	<div id="content">
        	
        	<div id="rightcolumn">
        	</div>
        	<div id="center">    
			    	
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
			    	
			       <div id="rightcolumn" class="column">
			       		<?php include('navigation.php'); ?>
			       </div>
			       
			       <div id="centercolumn" class="column">			       
        	      	 <?php echo $sf_content ?>        	      	 
			       </div>
        	       
        	       <div class="clearer"></div>
        	</div>
        	
        	</div>
        </div>        
        <div id="footerwrapper">
        	<div id="footer"></div>
        </div>
    </div>
  </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>
	  <?php if (!include_slot('title')): ?>
	    Momentum Annuity Quoting System
	  <?php endif; ?>
	</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  
     <div id="wrapper">

        <div id="navigationwrapper">

			<div class="navigation">
					<?php if ($sf_user->isAuthenticated()): ?>					
					    <ul class="backendnavigation">
						  <li><?php echo link_to(__('Dashboard'), 'homepage') ?></li>
						  
						  <?php if ($sf_user->hasGroup('administrator') || $sf_user->hasGroup('advisor')): ?>
						  <li><?php echo link_to(__('Clients'), '@client') ?></li>
						  <?php endif; ?>
						  
						  <li><?php echo link_to(__('Quotes'), '@quote') ?></li>
						 
						  <?php if ($sf_user->hasGroup('administrator')): ?>		
						  <li><?php echo link_to(__('Advisor'), '@advisor') ?></li>
						  <li><?php echo link_to(__('Profiles'), 'userprofile') ?></li>
						  <?php endif; ?>
						  
						  <li><?php echo link_to(__('My Profile'), url_for('profile_edit', $sf_user->getGuardUser())) ?></li>

					      <?php if ($sf_user->isSuperAdmin()): ?>
					      <li><?php echo link_to(__('Users'), 'sf_guard_user', array(), array( "class" => "users")) ?></li>
					      <li><?php echo link_to(__('Groups'), 'sf_guard_group', array(), array( "class" => "group")) ?></li>
					       <li><?php echo link_to(__('Permissions'), 'sf_guard_permission', array(), array( "class" => "group")) ?></li>
					      <?php endif; ?>					
					
					    </ul>		
					<?php endif; ?>						
			</div>
			
			<div class="navigation right">
					<?php if ($sf_user->isAuthenticated()): ?>					
					    <ul class="backendnavigation">		
						    <li class="loggedin">Logged in as <?php echo $sf_user->getGuardUser()->getUsername() ?> |</li>		    	
						    <li style="display:inline;"><?php echo link_to(__('Logout'), 'sf_guard_signout', array(), array( "class" => "logout")) ?></li>			
					    </ul>		
					<?php endif; ?>						
			</div>
	
			<div class="clearer"></div>
		</div>
		
        <div class="shadowHeader">
        		<div class="shadowMidLeft">
        		   <div id="header">
			        	<h1>
						  <?php if (!include_slot('pagetitle')): ?>
						    Momentum Annuity Quoting System
						  <?php endif; ?>
			        	</h1>
		            </div>
		      </div>
        </div>
        	
        <div class="shadowWrap">
          <div class="shadowMidLeft">
		        <div class="shadowMidContent">
		       		 <?php if (include_slot('rightcol')): ?>
		        	 <div class="twocol">	
		        	
		        	 	<div id="adminWrap">
			        	 		 

			        	 	<div id="content">
			        	 	
					        	<div id="leftcol">    
							<?php endif; ?>
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
					        	       
					        	       <div class="clearer" style="height:20px;"></div>
					        	       
			        	 	<?php if (include_slot('rightcol')): ?>
					        	</div>  

							    <div id="rightcol">  
							    		<?php include_component_slot('rightcol') ?>
							    </div>   
							   
			        	 	 </div>
			        	 		
			        	 	
			        	 </div>
			  
        			</div>
        			<?php endif; ?>
        		</div>
        				
	        </div>
        </div>
        
        <div class="shadowBottomLeft">
				<div class="shadowMidLeft"></div>
		</div>   
		     
	 </div>
  </body>
</html>

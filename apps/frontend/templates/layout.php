<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	    <?php include_http_metas() ?>
	    <?php include_metas() ?>
	    <title>
		  <?php if (!include_slot('title')): ?>
		    Momentum Employee Benefits
		  <?php endif; ?>
		</title>
	    <link rel="shortcut icon" href="/favicon.ico" />
		<!-- InstanceEndEditable -->
		<link href="/styles/oneColFixCtrHdr.css" rel="stylesheet" type="text/css" />
		<link href="/styles/form_clean.css" rel="stylesheet" type="text/css" />
		<script language='JavaScript' type='text/javascript' src='/TSScript/yahoo.js'></script>
		<script language='JavaScript' type='text/javascript' src='/TSScript/event.js'></script>
		<script language='JavaScript' type='text/javascript' src='/TSScript/dom.js'></script>
		<script language='JavaScript' type='text/javascript' src='/TSScript/dragdrop.js'></script>
		<script language='JavaScript' type='text/javascript' src='/TSScript/animation.js'></script>
		<script language='JavaScript' type='text/javascript' src='/TSScript/container.js'></script>
		<script language='JavaScript' type='text/javascript' src='/TSScript/TSHelpHint/TSHelpHint.js'></script>
		<script src="/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
		<link href="/SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
		<link rel='stylesheet' type='text/css' href='/TSScript/TSHelpHint/TSHelpHint.css' />
		<link href="styles/oneColFixCtrHdr.css" rel="stylesheet" type="text/css" />
	</head>
<body>
<div class="container">
  <div class="header"><!-- end .header -->
    <div class="top_navigation">
      <ul>
        <li><?php echo link_to('Home', url_for('@page_homepage')) ?></li>
        <!-- <li><?php echo link_to('About Us', url_for('@page_about')) ?></li> -->
        <li><?php echo link_to('Annuities Explained', url_for('@page_annuityexplained')) ?></li>
        <li><?php echo link_to('Annuity Options', url_for('@page_annuityoptions')) ?></li>
        <li><?php echo link_to('Downloads', url_for('@page_downloads')) ?></li>
        <li><?php echo link_to('Help', url_for('@page_help')) ?></li>        		
        <?php if($sf_user->isAuthenticated()) :?>   
        <li><?php echo link_to('Your quotes', url_for('@quote')) ?></li>
        <li><?php echo link_to('Your profile', url_for('profile_edit', $sf_user->getGuardUser())) ?></li>
        <?php endif; ?>
        <li><?php echo link_to('Contact Us', url_for('@page_contact')) ?></li>
      </ul>
    </div>
  </div>
  <div id="loginTop"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="65%">
    	<iframe src="/bannerRotator.html" width="585" height="165" align="middle" scrolling="No" frameborder="0"></iframe>&nbsp;</td>
    <td width="43%">
	  <?php if($sf_user->isAuthenticated()) :?> 
	  <div id="loginTop">
	  	<a href="<?php echo url_for('profile_edit', $sf_user->getGuardUser() )?>">Log In: <?php echo $sf_user->getGuardUser()->getUsername() ?> - You are currently logged in :<?php echo $sf_user->getGuardUser()->getUsername() ?> </a> | <?php echo link_to(__('Log Out'), 'sf_guard_signout', array(), array( "class" => "logout")) ?>
	  </div>
	  <?php else :?>
	  <div id="loginTop">
	  	 You are currently not logged in
	  </div>
	  <?php endif; ?>    
    </td>
  </tr>
</table>
</div>
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
		            
		            <div style="float:right;"><button onclick="$('#flash_error').hide()">hide</button></div>
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
  
  
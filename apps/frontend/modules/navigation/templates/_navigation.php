	<ul>      <span class="sideNav"> Test Links</span>      <li><a href="ebAdmin.php">Eb Administration</a></li>      <li><a href="financialAdvisor.php">Financial Advisor</a></li>      <li><a href="client.php">Client</a></li>      <li><a href="index.php">Home</a></li>    </ul>        <?php if ($sf_user->isAuthenticated()): ?>   	<?php if ($sf_user->hasGroup('administrator')): ?>	<ul><span class="sideNav"> EB Aministration</span>	  <li><?php echo link_to('Users', 'sf_guard_user', array(), array( "class" => "users")) ?></li>      <li><a href="#">Upload Data</a></li>      <li><a href="#">Add Financial Advisor</a></li>      <li><a href="#">View Financial Advisor</a></li>    </ul>    <?php endif; ?>        <?php if ($sf_user->hasGroup('advisor') || $sf_user->hasGroup('administrator')): ?>	<ul><span class="sideNav"> Financial Advisor Aministration</span>      <li><?php echo link_to('Add Clients', url_for('@client_new')) ?></li>      <li><?php echo link_to('View Clients',  url_for('@client_index')) ?></li>      <li><a href="#">View Client Quotes</a></li>    </ul>    <?php endif; ?>        <?php if ($sf_user->hasGroup('client') || $sf_user->hasGroup('administrator')): ?>	<ul><span class="sideNav"> Client Functions</span>      <li><a href="#">Update My Details</a></li>      <li><a href="#">Generate a New Quote</a></li>  	</ul>  	  	<?php endif; ?>  	  	<?php endif; ?>	
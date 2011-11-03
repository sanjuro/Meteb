<?php

    // test/functional/mathApiTest.php
    include(dirname(__FILE__).'/../../bootstrap/functional.php');
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');
    
	// $browser = new MetebTestFunctional(new sfBrowser());
	// $browser->loadData();

	$options = array(
	  'classmap' => array(
	  ),
	);

    $c = new ckTestSoapClient($options);
    
    // test Login Authenticate
    $c->newLogin('67b77c6106bb1bcf47934a5837498c', 'advisor', 'advisor')    // call the action
      ->isFaultEmpty()
      ->isType('', 'string')
     # var_dump($c->getFault());
     ;
     
 	 # var_dump($c->__getLastResponse());
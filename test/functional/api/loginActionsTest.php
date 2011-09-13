<?php

    // test/functional/mathApiTest.php
    include(dirname(__FILE__).'/../../bootstrap/functional.php');
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');
    
    class TestLoginRequest
	{
	  public $token;
		
	  public $username;
	 
	  public $password;
	 
	  public function __construct($token, $username, $password)
	  {
	    $this->token    = $token;
	    $this->username = $username;
	    $this->password = $password;
	  }
	}
    
	// $browser = new MetebTestFunctional(new sfBrowser());
	// $browser->loadData();

	$options = array(
	  'classmap' => array(
	    'LoginRequest' => 'TestLoginRequest',
	  ),
	);

    $c = new ckTestSoapClient($options);
    
    $loginRequest = new TestLoginRequest('11qqadwW333ssdsdssaas2', 'shadley', 'rad6hia');
     
    // test Login Authenticate
    $c->Login(array(clone $loginRequest))    // call the action
      ->isFaultEmpty()
      ->isType('', 'string');
      
 	 var_dump($c->__getLastResponse());
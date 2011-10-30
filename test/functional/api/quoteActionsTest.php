<?php

    include(dirname(__FILE__).'/../../bootstrap/functional.php');
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');

    /**
	 * Declare ComplexType object
	 *
	 */
	
	class newQuoteRequest
	{
	    public $client_id;		
		
	    public $date_prepared;
	
	    public $main_name;
	
	    public $main_dob;
	
	    public $gender_main; 
	    
	    public function __construct($client_id, $date_prepared, $main_name, $main_dob, $gender_main)
	    {
	    	$this->client_id  = $client_id;
	        $this->date_prepared  = $date_prepared;
	        $this->main_name = $main_name;
	        $this->main_dob  = $main_dob;
	        $this->gender_main = $gender_main;
	    }
	
	}     
    
	
    $options = array(
		'classmap' => array(
			'newQuoteRequest' => 'newQuoteRequest',
		),
    );

	$newQuoteRequest = new newQuoteRequest(    
					'5',               
					'01/07/1936',
					'JillTest',
					'01/07/1936',
					'm');	

    $c = new ckTestSoapClient($options);

	# Test newLogin
	
	$c->newLogin('11qqadwW333ssdsdssaas2', 'shadley', 'rad6hia')
	->isFaultEmpty()
	->isType('', 'string')
	;
	
	// var_dump($c->__getLastResponse());
	
	$test_token = $c->getResult();
	
	// echo '<pre>';var_dump($newQuoteRequestObj);exit;
	
	$c->newQuote($test_token, $newQuote)
	->isFaultEmpty()
	;
	
    var_dump($c->__getLastResponse());	
	
	// var_dump($c->getFault());
	
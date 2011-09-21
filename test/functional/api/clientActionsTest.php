<?php

    $app   = 'api';
    $debug = true;
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');
    
    /**
	 * Declare ComplexType object
	 *
	 */
	
	class newClientRequest
	{
	    public $first_name;
	
	    public $last_name;
	    
	    public $email_address;
	
	    public $id_number;	    
	
	    public $gender;
	
	    public $dob;
	
	    public $spouse_first_name;	    
	
	    public $spouse_last_name;
	
	    public $spouse_id_number;

	    public $spouse_dob;		    
	    
	    public function __construct($first_name, $last_name, $email_address, $id_number, $gender, $dob, $spouse_first_name, $spouse_last_name, $spouse_id_number, $spouse_dob)
	    {
	        $this->first_name  = $first_name;
	        $this->last_name = $last_name;
	        $this->email_address  = $email_address;
	        $this->id_number = $id_number;
	        $this->gender  = $gender;
	        $this->dob = $dob;
	        $this->spouse_first_name  = $spouse_first_name;
	        $this->spouse_last_name  = $spouse_last_name;
	        $this->spouse_id_number = $spouse_id_number;
	        $this->spouse_dob = $spouse_dob;
	    }
	
	}    


    $options = array(
		'classmap' => array(
			'newClientRequest' => 'newClientRequest',
		),
    );

	$newClient = new newClientRequest(                   
					'Jack Test',
                    'jack@test.co.za',
                    'Somecompany',
    				'812312312323',
                    '1',
                    '01/07/1936',
                    'Jill Test',
                    'jill@test.co.za',
    				'812312312323',
                    '01/07/1946');

    $c = new ckTestSoapClient($options);

	# Test newLogin
	
	$c->newLogin('11qqadwW333ssdsdssaas2', 'shadley', 'rad6hia')
	->isFaultEmpty()
	->isType('', 'string')
	;
	
	var_dump($c->__getLastResponse());
	
	$test_token = $c->getResult();
	
	# Test neClient
	
	$c->newClient($test_token,$newClient)
      ->isFaultEmpty()
        ;
   var_dump($c->getFault());
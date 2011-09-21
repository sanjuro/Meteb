<?php

    $app   = 'api';
    $debug = true;
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');
    
    /**
	 * Declare ComplexType object
	 *
	 */
    
	class newQuoteRequest
	{

	    public $quote_type;
	
	    public $second_life;
	
	    public $main_sex;
	    
	    public $main_dob;
	    
	    public $spouse_sex;
	    
	    public $spouse_dob;
	    
	    public $gp;
	    
	    public $spouse_reversion;
	    
	    public $annuity;    
	    
	    public $purchase_price;  
	
	    public $commission;    
	    
	    public $commence_at;     
	
	    public $expires_at; 
	    
		public function __construct($quote_type, $second_life, $main_sex, $main_dob, $spouse_sex, $spouse_dob, $gp, $spouse_reversion, $annuity, $purchase_price, $commission, $commence_at, $expires_at)
	    {
	        $this->quote_type  = $quote_type;
	        $this->second_life = $second_life;
	        $this->main_sex  = $main_sex;
	        $this->main_dob = $main_dob;
	        $this->spouse_sex  = $spouse_sex;
	        $this->spouse_dob = $spouse_dob;
	        $this->gp  = $gp;
	        $this->spouse_reversion  = $spouse_reversion;
	        $this->annuity = $annuity;
	        $this->purchase_price = $purchase_price;
	        $this->commission  = $commission;
	        $this->commence_at = $commence_at;
	        $this->expires_at = $expires_at;
	    }
	    
	}
	
    $options = array(
		'classmap' => array(
			'newQuoteRequest' => 'newQuoteRequest',
		),
    );	
    
 	$newClient = new newQuoteRequest(                   
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

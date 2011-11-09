<?php

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
		
		public function __construct($quote_type, $second_life, $main_sex, $main_dob, $spouse_sex, $spouse_dob, $gp, $spouse_reversion, $annuity, $purchase_price, $commission)
		{
		$this->quote_type = $quote_type;
		$this->second_life = $second_life;
		$this->main_sex = $main_sex;
		$this->main_dob = $main_dob;
		$this->spouse_sex = $spouse_sex;
		$this->spouse_dob = $spouse_dob;
		$this->gp = $gp;
		$this->spouse_reversion = $spouse_reversion;
		$this->annuity = $annuity;
		$this->purchase_price = $purchase_price;
		$this->commission = $commission;
		}
	
	}
	
    $options = array(
		'classmap' => array(
			'newQuoteRequest' => 'newQuoteRequest',
		),
	);	

$client = new SoapClient("http://www.ebannuities.co.za/SoapApi.wsdl", $options);

try 
{
  	$result = $client->newLogin('11qqadwW333ssdsdssaas2', 'shadley', 'rad6hia');
  
  	echo '<pre>';
  	var_dump($result);

  	$newQuote = array(
	1,
    2,
	1,
	'01/07/1936',
	2,
	'01/07/1946',
 	60,
	1,
	0.00,
	10000000,
	3);  
	
	$result_quote = $client->newQuote($result,5,$newQuote);

	echo '<pre>';print_r($result_quote);
	
} catch (SoapFault $fault) {
        echo "fault code: " . $fault->faultcode;
        echo "<br>fault string: " . $fault->faultstring;
}

?>
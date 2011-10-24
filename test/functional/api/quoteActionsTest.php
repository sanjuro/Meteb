<?php

    include(dirname(__FILE__).'/../../bootstrap/functional.php');
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');

    $options = array(
		'classmap' => array(
		),
	);
    
  $newQuote = array(
	'quote_type_id' => 1,
    'commission' => 2,
	'main_sex' => 1,
	'main_dob' => '01/07/1936',
	'spouse_sex' => 2,
	'spouse_dob' => '01/07/1946',
 	'gp' => 60,
	'second_life' => 1,
	'annuity' => 0.00,
	'pp' => 10000000,
	'spouse_rev' => 3,
  	'date_of_fund_credit' => '01/07/2011',
   	'date_of_investment' => '01/10/2011',
  	'fund_amount' => '100000',
  	'fund_code' => 't',
    'fund_credit' => '100000',
    'fund_percentage' => '20.00',
 	'fund_percentage_ind' => '20.00',
  	'joint_life_date_of_birth' => '01/07/1946',
  	'joint_life_gender' => ,
  	'joint_life_ind' => ,
  	'joint_life_initials' => ,
  	'joint_life_perc' => ,
  	'joint_life_surname' => ,
  	'joint_life_title' => ,
  	'member_cell_no' => ,
  	'member_gender' => ,
  	'member_date_of_birth' => ,
  	'member_gender' => ,
  	'member_id_is_passport' => ,
  	'member_id_number' => ,
  	'member_initials' => ,
  	'member_ref_number' => ,
  	'member_surname' => ,
  	'member_title' => ,
  	'product_code' => ,
  	'request_by' => ,
  	'request_date_time' => ,
  	'request_id' => ,
  	'request_source' => ,
  	'request_status' => ,
  	'sp_code' => ,
  	'status_comment' => ,
  	'status_date' => ,
  );

    $c = new ckTestSoapClient($options);

	# Test newLogin
	
	$c->newLogin('11qqadwW333ssdsdssaas2', 'shadley', 'rad6hia')
	->isFaultEmpty()
	->isType('', 'string')
	;
	
	// var_dump($c->__getLastResponse());
	
	$test_token = $c->getResult(); 
	
	// echo '<pre>';print_r($test_token);
	
	$c->newQuote($test_token,5,$newQuote)
	->isFaultEmpty()
	->isType('', 'stdClass')
	;
	
	var_dump($c->__getLastResponse());	
	
	// var_dump($c->getFault());
	
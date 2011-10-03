<?php

    $app   = 'api';
    $debug = true;
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');
    
	
    $options = array(
		'classmap' => array(
		),
    );	
    
 	$newClient = new newQuoteRequest(                   
					1,
                    2,
                    1,
    				'01/07/1936',
                    2,
                    '01/07/1946',
                    60,
                    0.75,
    				0.00,
                    10000000,
                    0.15);

    $c = new ckTestSoapClient($options);

	# Test newLogin
	
	$c->newLogin('11qqadwW333ssdsdssaas2', 'shadley', 'rad6hia')
	->isFaultEmpty()
	->isType('', 'string')
	;
	
	var_dump($c->__getLastResponse());
	
	$test_token = $c->getResult();  

	$c->newQuote($test_token,
				$dateOfFundCredit, 
				$dateOfInvestment,
				$fundAmount,
				$fundCode,
				$fundCredit,
				$fundPercentage,
				$fundPercentInd,
				$jointLifeDateOfBirth,
				$jointLifeGender,
				$jointLifeInd,
				$jointLifeInitials,
				$jointLifePerc,
				$jointLifeSurname,
				$jointLifeTitle,
				$memberCellNo,
				$memberDateOfBirth,
				$memberDateOfRetirement,
				$memberGender,
				$memberIdIsPassport,
				$memberIdNumber,
				$memberInitials,
				$memberRefNumber,
				$memberSurname,
				$memberTitle,
				$productCode,
				$requestBy,
				$requestDateTime,
				$requestId,
				$requestSource,
				$requestStatus,
				$spCode,
				$statusComment,
				$statusDate)
	->isFaultEmpty()
	->isType('', 'stdClass')
	;
	var_dump($c->__getLastRequest());

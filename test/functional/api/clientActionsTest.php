<?php

  // test/functional/mathApiTest.php
    $app   = 'api';
    $debug = true;
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');


    $clientarray = array(
                    'first_name' => 'Jack Test',
                    'last_name' => 'jack@test.co.za',
                    'email_address' => 'Somecompany',
    				'id_number' => '812312312323',
                    'gender' => '1',
                    'dob' => '01/07/1936',
                    'spouse_first_name' => 'Jill Test',
                    'spouse_last_name' => 'jill@test.co.za',
    				'spouse_id_number' => '812312312323',
                    'spouse_dob' => '01/07/1946',
    );


    $options = array(
      'classmap' => array(
      ),
    );

    $c = new ckTestSoapClient($options);

    // test executeMultiply
    //$authData = new ClientAuthData('shadleypartner', 'rad6hia','5f24e4b8b6f7ce6287adb266ec8c45a950f55450');
	$c->CreateClient($clientarray)
      ->isFaultEmpty()
        ;
   var_dump($c->getResult());
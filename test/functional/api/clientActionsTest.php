<?php

  // test/functional/mathApiTest.php
    $app   = 'api';
    $debug = true;
    include(dirname(__FILE__).'/../../bootstrap/soaptest.php');


    $clientarray = array(
                    'customerName' => 'Jack Test',
                    'customerEmail' => 'prince@eset.co.za',
                    'companyName' => 'Somecompany');


    $options = array(
      'classmap' => array(
      ),
    );

    $c = new ckTestSoapClient($options);

    // test executeMultiply
    //$authData = new ClientAuthData('shadleypartner', 'rad6hia','5f24e4b8b6f7ce6287adb266ec8c45a950f55450');


      $c->CreateClient(array('a13dddbb43c9f5003b8fc35691f2302172ecd66','shadleypartner', 'rad6hia'))
      ->isFaultEmpty()
        ;
   var_dump($c->getFault()->__toString());
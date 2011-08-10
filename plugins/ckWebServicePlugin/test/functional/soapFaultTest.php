<?php
/**
 * This file is part of the ckWebServicePlugin
 *
 * @package   ckWebServicePlugin
 * @author    Christian Kerl <christian-kerl@web.de>
 * @copyright Copyright (c) 2008, Christian Kerl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id: soapFaultTest.php 29910 2010-06-20 12:02:42Z chrisk $
 */

$app = 'frontend';
$env = 'soapTestServiceApi';
$debug = true;

include_once(dirname(__FILE__).'/../bootstrap/functional.php');

$c = new ckTestSoapClient(array(), $test);

// test executeException
$c->test_exception()
  ->hasFault('TestException');

// test executeSoapFault
$c->test_soapFault()
  ->hasFault('TestSoapFault');
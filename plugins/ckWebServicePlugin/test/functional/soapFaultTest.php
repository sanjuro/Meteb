<?php
/**
 * This file is part of the ckWebServicePlugin
 *
 * @package   ckWebServicePlugin
 * @author    Christian Kerl <christian-kerl@web.de>
 * @copyright Copyright (c) 2008, Christian Kerl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id: soapFaultTest.php 26444 2010-01-10 00:30:13Z chrisk $
 */

$app = 'frontend';
$env = 'soapTestServiceApi';
$debug = true;

include_once(dirname(__FILE__).'/../bootstrap/functional.php');

$c = new ckTestSoapClient();

// test executeException
$c->test_exception()
  ->hasFault('TestException');

// test executeSoapFault
$c->test_soapFault()
  ->hasFault('TestSoapFault');
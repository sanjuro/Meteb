<?php
/**
 * This file is part of the ckWebServicePlugin
 *
 * @package   ckWebServicePlugin
 * @author    Christian Kerl <christian-kerl@web.de>
 * @copyright Copyright (c) 2008, Christian Kerl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id: functional.php 29910 2010-06-20 12:02:42Z chrisk $
 */

if (!isset($_SERVER['SYMFONY']))
{
  throw new RuntimeException('Could not find symfony core libraries.');
}
require_once($_SERVER['SYMFONY'].'/vendor/lime/lime.php');

$test = new lime_test(null, array(
  'force_colors' => true
));

$project  = isset($project) ? $project : 'project';
$root_dir = dirname(__FILE__).'/../fixtures/'.$project;

require_once($root_dir.'/config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration($app, isset($env) ? $env : 'soaptest', isset($debug) ? $debug : true);
sfContext::createInstance($configuration);

// remove all cache
ck_functional_test_shutdown();

register_shutdown_function('ck_functional_test_shutdown');

function ck_functional_test_shutdown()
{
  sfToolkit::clearDirectory(sfConfig::get('sf_cache_dir'));
  sfToolkit::clearDirectory(sfConfig::get('sf_log_dir'));
}

return true;
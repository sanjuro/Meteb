<?php
/**
 * This file is part of the ckWebServicePlugin
 *
 * @package   ckWebServicePlugin
 * @author    Christian Kerl <christian-kerl@web.de>
 * @copyright Copyright (c) 2008, Christian Kerl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id: ckWebServicePluginConfiguration.class.php 29916 2010-06-20 16:02:55Z chrisk $
 */

/**
 * Plugin configuration.
 *
 * @package    ckWebServicePlugin
 * @subpackage config
 * @author     Christian Kerl <christian-kerl@web.de>
 */
class ckWebServicePluginConfiguration extends sfPluginConfiguration
{
  private function isRegisterWsdlRoute()
  {
    return sfConfig::get('app_ck_web_service_plugin_routes_register', true) && in_array('ckWsdl', sfConfig::get('sf_enabled_modules', array()));
  }

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $this->dispatcher->connect('component.method_not_found', array('ckComponentEventListener', 'listenToComponentMethodNotFoundEvent'));

    if($this->isRegisterWsdlRoute())
    {
      $this->dispatcher->connect('routing.load_configuration', array($this, 'listenToRoutingLoadConfigurationEvent'));
    }

    spl_autoload_register(array(new ckGenericObjectAdapterFactory(sfConfig::get('sf_cache_dir')), 'autoload'));

    ckObjectWrapper::addObjectWrapper(new ckDefaultObjectWrapper());
    ckObjectWrapper::addObjectWrapper(new ckGenericObjectAdapterWrapper());
    ckObjectWrapper::addObjectWrapper(new ckArrayObjectWrapper());
    ckObjectWrapper::addObjectWrapper(new ckDoctrineRecordWrapper());
  }

  public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();
    $r->prependRoute('ck_wsdl_bind', new sfRoute('/:service.wsdl', array('module' => 'ckWsdl', 'action' => 'bind')));
  }
}

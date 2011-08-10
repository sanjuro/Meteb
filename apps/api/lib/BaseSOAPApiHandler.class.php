<?php

/**
 * This is an auto-generated SoapHandler. All changes to this file will be overwritten.
 */
class BaseSOAPApiHandler extends ckSoapHandler
{
  public function client_list($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'list', array($token));
  }

  public function login_authenticate($token, $username, $password)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('login', 'authenticate', array($token, $username, $password));
  }
}
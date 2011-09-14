<?php

/**
 * This is an auto-generated SoapHandler. All changes to this file will be overwritten.
 */
class BasesoapApiHandler extends ckSoapHandler
{
  public function newClient($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'new', array($token));
  }

  public function listClients($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'list', array($token));
  }

  public function newLogin($token, $username, $password)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('login', 'new', array($token, $username, $password));
  }

  public function newQuote($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('quote', 'new', array($token));
  }
}
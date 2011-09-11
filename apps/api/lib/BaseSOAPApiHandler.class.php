<?php

/**
 * This is an auto-generated SoapHandler. All changes to this file will be overwritten.
 */
class BaseSOAPApiHandler extends ckSoapHandler
{
  public function CreateClient($arrRequests)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'create', array($arrRequests));
  }

  public function ShowClients($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'show', array($token));
  }

  public function Authenticate($token, $username, $password)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('login', 'authenticate', array($token, $username, $password));
  }

  public function CreateQuote($arrRequests)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('quote', 'create', array($arrRequests));
  }
}
<?php

/**
 * This is an auto-generated SoapHandler. All changes to this file will be overwritten.
 */
class BaseSOAPApiHandler extends ckSoapHandler
{
  public function client_create($request)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'create', array($request));
  }

  public function client_show($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'show', array($token));
  }

  public function Login($input)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('login', 'authenticate', array($input));
  }

  public function quote_create($request)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('quote', 'create', array($request));
  }
}
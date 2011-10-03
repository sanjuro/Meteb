<?php

/**
 * This is an auto-generated SoapHandler. All changes to this file will be overwritten.
 */
class BasesoapApiHandler extends ckSoapHandler
{
  public function newClient($token, $newClient)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'new', array($token, $newClient));
  }

  public function listClients($token)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('client', 'show', array($token));
  }

  public function newLogin($token, $username, $password)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('login', 'new', array($token, $username, $password));
  }

  public function newQuote($token, $dateOfFundCredit, $dateOfInvestment, $fundAmount, $fundCode, $fundCredit, $fundPercentage, $fundPercentInd, $jointLifeDateOfBirth, $jointLifeGnder, $jointLifeInd, $jointLifeInitials, $jointLifePerc, $jointLifeSurname, $jointLifeTitle, $memberCellNo, $memberDateOfBirth, $memberDateOfRetirement, $memberGender, $memberIdIsPassport, $memberIdNumber, $memberInitials, $memberRefNumber, $memberSurname, $memberTitle, $productCode, $requestBy, $requestDateTime, $requestId, $requestSource, $requestStatus, $spCode, $statusComment, $statusDate)
  {
    return sfContext::getInstance()->getController()->invokeSoapEnabledAction('quote', 'new', array($token, $dateOfFundCredit, $dateOfInvestment, $fundAmount, $fundCode, $fundCredit, $fundPercentage, $fundPercentInd, $jointLifeDateOfBirth, $jointLifeGnder, $jointLifeInd, $jointLifeInitials, $jointLifePerc, $jointLifeSurname, $jointLifeTitle, $memberCellNo, $memberDateOfBirth, $memberDateOfRetirement, $memberGender, $memberIdIsPassport, $memberIdNumber, $memberInitials, $memberRefNumber, $memberSurname, $memberTitle, $productCode, $requestBy, $requestDateTime, $requestId, $requestSource, $requestStatus, $spCode, $statusComment, $statusDate));
  }
}
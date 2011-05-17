<?php

class myUser extends sfGuardSecurityUser
{
	
  public function getUserProfile()
  {
	$sfGuardUser =  $this->getGuardUser();
  }
}
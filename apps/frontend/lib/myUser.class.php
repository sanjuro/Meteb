<?php

class myUser extends sfGuardSecurityUser
{
  /**
   * Signs in the user on the application. If the user is an Advisor or Admin
   * they will be redirected to the Backend
   *
   * @param sfGuardUser $user The sfGuardUser id
   * @param boolean $remember Whether or not to remember the user
   * @param Doctrine_Connection $con A Doctrine_Connection object
   */
   public function signIn($user, $remember = false, $con = null)
   {
		
		if($user->hasGroup('administrator') || $user->hasGroup('advisor')){
			sfContext::getInstance()->getController()->redirect(sfConfig::get('app_url_backend'));
		}

		parent::signIn($user);		

	}
}
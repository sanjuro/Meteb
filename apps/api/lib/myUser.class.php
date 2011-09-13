<?php

/**
 * myUser
 * 
 * This class extends the sfGuardSecurityUser 
 * 
 * @package    meteb
 * @subpackage model
 * @author     Shadley Wentzel
 * @version    SVN: $Id: myUser.class.php 7490 2010-03-29 19:53:27Z swentzel $
 */
class myUser extends sfGuardSecurityUser
{
  /**
   * Function that sets up an api session and generates
   * the session token to be used in the API calls
   *
   * @return
   *
   * @param user  $user User object, the user that is signning in
  */
  public function signIn($user, $remember = false, $con = null) 
  {    
  	// parent::signIn($user);
  	
  	$this->setAuthenticated(true);
  	
  	$this->setAttribute('user_id', $user->getId(), 'user');
    
  	$user_id = $this->getAttribute('user_id', '', 'user');
  	
    $api_token = self::generateApiToken($user_id, $user->getUsername());
 
    $this->setAttribute('api_token', $api_token, 'user');

   }
   
   
  /**
   * Function that sets the api token in the user session
   *
   * @param string $api_token Api Token
   *
   * @return string Thew newly generated api token for the session
  */
  public function setApiToken($api_token) {
  	return $this->setAttribute('api_token', $api_token, 'user');
  }
  
  
  /**
   * Function that gets the dynamic api token for the session
   *
   * @param void
   *
   * @return user  $user User object, the user that is signning in
  */
  public function getApiToken() {
    return $this->getAttribute('api_token', '', 'user');
  }
    
   
  /**
   * Generates a API token for the session
   * 
   * @param string $user_id User id of user
   * @param string $username Username of user
   * @return string API token
   */
   private function generateApiToken($user_id, $username)
   {
	  $salt = md5(rand(100000, 999999).$user_id.$username);
	  return sha1($salt.$user_id);
   }
}
<?php

/**
 * Meteb User Class
 * 
 * This class will handle the business logic for the client
 * 
 * @package    meteb
 * @subpackage lib
 * @author     Shadley Wentzel
 * @version    GIT
 */
class MetebUser
{
	
	/**
	* Function authenticate an api user
	* 
	* @param string $username Username
	* @param string $password Password
	* @return string Generated username
	* 
	*/	
	public static function getAuthenticatedUser($username, $password)
	{ 
	  $q = Doctrine_Query::create()
		   ->from('sfGuardUser sgu')
		   ->where('sgu.username = ?', $username)
		   ->andWhere('sgu.is_active = ?', 1);
		  
	  $user = $q->fetchOne(); 	
	
	  // username exists?
	  if ($user)
	  {
	    // password is OK?
	    if (sha1($user->getSalt().$password) == $user->getPassword() && $user->getIsActive() == 1)
	    {
	      return $user;
	    }
	  }
	 
	  return null;
	}
	
}
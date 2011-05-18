<?php

/**
 * UserProfileTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserProfileTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UserProfileTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('UserProfile');
    }
    
    /**
     * Returns all clients associated to a user
     *
 	 * @param $userProfileId integer User Profile Id to find clients
     *
     * @return query The query to return results
     */
	public function getClientsForUser($userProfileId)
	{
	  $q = Doctrine_Query::create()
	      ->from('UserProfile up')
	      ->where('up.parent_user_profile_id = ?', $userProfileId);
	 
	    return $q;

	}
}
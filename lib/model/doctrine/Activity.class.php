<?php

/**
 * Activity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    meteb
 * @subpackage model
 * @author     Shadley Wentzel
 * @version    SVN: $Id: ActivityClass.php 7490 2010-03-29 19:53:27Z swentzel $
 */
class Activity extends BaseActivity
{
	/**
	 * Static Function to add a new Activity Object using the Activity type
	 * 
	 * @param integer $sfGuardUserId The user who did the activity
	 * @param integer $activityTypeId The type of Activity
	 * @param integer $title Extra Title if needed
	 * 
	 * @return UserProfile UserProfile Object
	 */	
	 public static function addActivty($sfGuardUserId, $activityTypeId, $title = '')
	 {
		$activity = new Activity();
		$activity->setSfuserId($sfGuardUserId);
		$activity->setActivitytypeId($activityTypeId);
		$activity->setTitle($title);
		$activity->save();
		  
		return $activity; 	
	 }
}
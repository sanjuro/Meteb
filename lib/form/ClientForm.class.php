<?php

/**
 * Client form.
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadlet Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClientForm extends BasesfGuardUserForm
{
  public $currentNetwork;
	
  public function configure()
  {
  	parent::configure();
  	
    if ($this->getOption("network") instanceof Network && ($this->getOption("network")))
	{
	    $this->currentNetwork = $this->getOption("network");
	}else{
		throw new InvalidArgumentException("You must pass a network object as an option to this form!");	
	}
  	
    unset(
      $this['id'], $this['algorithm'],$this['user_profile_id'],
      $this['first_name'], $this['last_name'],
      $this['salt'], $this['is_active'],
      $this['is_super_admin'], $this['last_login'],
      $this['created_at'], $this['updated_at'],
      $this['groups_list'], $this['permissions_list']
    );
    
    /**
     * Embed UserProfile Form
     */
	if(!$this->isNew()) 	
	{
		$userProfileObjs = $this->getObject()->getUserProfile()->execute(); 
	}else{
		$userProfileObjs = array();
	}
	
	if (count($userProfileObjs) < 1){
	      $userProfileObj = new UserProfile();  
	      $userProfileObjs[] = $userProfileObj;
	}
	
	$userProfilesForm = new sfForm();
	  
	$count = 0;    
	
  	if(!$this->isNew())
	{	
		foreach( $userProfileObjs as $key => $userProfileObj )
		{	 
			  $userProfilesForm->embedForm($key, new FrontendUserProfileForm( $userProfileObj ) );
	     
		}  
	}else{
		 $userProfilesForm->embedForm( 0, new FrontendUserProfileForm( $userProfileObj ) );
	}
	// embed the contacts forms
    $this->embedForm('userProfiles', $userProfilesForm);
  }
  
  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {

	if ($this->sfGuardUser)
	{
    $userProfilesForm = new sfForm();
  
    foreach($taintedValues['userProfiles'] as $key => $new_occurrence)
    {
      $userProfileObj = new UserProfile();
      $userProfileObj->setsfGuardUser($this->getObject());  
      $userProfileObj_form = new FrontendUserProfileForm($userProfileObj);
	
      $userProfilesForm->embedForm( $key, $userProfileObj_form );
    }
	
    $this->embedForm('userProfiles', $userProfilesForm);
	}
	
    parent::bind($taintedValues, $taintedFiles);
  }
}

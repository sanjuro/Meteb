<?php

/**
 * dashboard actions.
 *
 * @package    meteb
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	$this->clients = $this->getUser()->getGuardUser()->getClientsForUser();
	
	if($this->getUser()->hasGroup('administrator')){
		$this->advisors = $this->getUser()->getGuardUser()->getAdvisorsForUser();
	}else{
		$this->advisors = '';
	}	
	
	$this->activitys = $this->getUser()->getGuardUser()->getActivitysForUser();
	
	$this->quotes = $this->getUser()->getGuardUser()->getQuotesForUser();
  }
}

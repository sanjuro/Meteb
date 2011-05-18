<?php

/**
 * advisor actions.
 *
 * @package    meteb
 * @subpackage advisor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class advisorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$sfGuardUser = $this->getUser()->getGuardUser();
  	
  	$UserProfile = $sfGuardUser->getUserProfile();

  	$this->pager = new sfDoctrinePager(
	    'sfGuardUser',
	    20
	);
	$this->pager->setQuery(Doctrine::getTable('sfGuardUser')->getAllAdvisors()); 
	$this->pager->setPage($request->getParameter('page', 1));	 
	$this->pager->init();
  	
  }
  
 /**
  * Executes new action
  *
  * @param sfRequest $request A request object
  */
  public function executeNew(sfWebRequest $request)
  {		 
  	$this->form = new FrontendAdvisorForm();
  }

 /**
  * Executes create action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
   $this->form = new FrontendAdvisorForm();
   $this->processForm($request, $this->form);
   $this->setTemplate('new');
  }
  
 /**
  * Executes edit action
  *
  * @param sfRequest $request A request object
  */
  public function executeEdit(sfWebRequest $request)
  {
   $this->form = new FrontendAdvisorForm($this->getRoute()->getObject());
  }
  
  /**
  * Executes edit action
  *
  * @param sfRequest $request A request object
  */ 
  public function executeUpdate(sfWebRequest $request)
  {
   $this->form = new FrontendAdvisorForm($this->getRoute()->getObject());
   $this->processForm($request, $this->form);
   $this->setTemplate('edit');
  }
 
  /**
  * Executes edit action
  *
  * @param sfRequest $request A request object
  */ 
  public function executeDelete(sfWebRequest $request)
  {
   $request->checkCSRFProtection();
 
   $client = $this->getRoute()->getObject();
   $client->delete();
 
   $this->redirect('advisor/index');
  }
 
  /**
  * Method used to process a form
  *
  * @param sfRequest $request A request object
  */   
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
   $form->bind(
     $request->getParameter($form->getName()),
     $request->getFiles($form->getName())
   );
 
	  if ($form->isValid())
	   {
	    $client = $form->save();
	 
	    $this->getUser()->setFlash('notice', 'The advisor was added.');
	    
	    $this->redirect('advisor_show', $client);
	  }else {
	  	$this->getUser()->setFlash('error', 'There was a few errors while capturing the advisor details.');
	  	
	  }
 }
}

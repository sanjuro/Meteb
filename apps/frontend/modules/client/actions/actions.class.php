<?php

/**
 * client actions.
 *
 * @package    meteb
 * @subpackage client
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends sfActions
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
	$this->pager->setQuery(Doctrine::getTable('sfGuardUser')->getAllClients()); 
	$this->pager->setPage($request->getParameter('page', 1));	 
	$this->pager->init();
  	
  }
  
 /**
  * Executes dashboard action
  *
  * @param sfRequest $request A request object
  */
  public function executeDashboard(sfWebRequest $request)
  {		 
  	$this->form = new FrontendClientForm();
  }
  
 /**
  * Executes new action
  *
  * @param sfRequest $request A request object
  */
  public function executeNew(sfWebRequest $request)
  {		 
  	$this->form = new FrontendClientForm();
  }

 /**
  * Executes create action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
   $this->form = new FrontendClientForm();
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
   $this->form = new FrontendClientForm($this->getRoute()->getObject());
  }
  
  /**
  * Executes edit action
  *
  * @param sfRequest $request A request object
  */ 
  public function executeUpdate(sfWebRequest $request)
  {
   $this->form = new FrontendClientForm($this->getRoute()->getObject());
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
 
   $this->redirect('client/index');
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
	 
<<<<<<< HEAD
	    $this->getUser()->setFlash('notice', 'The client was added.');
	    
	    $this->redirect($this->generateUrl('client'));
=======
	    if($form->isNew())
	   		$this->getUser()->setFlash('notice', 'The client was added.');
	    else 
	    	$this->getUser()->setFlash('notice', 'The client was editted.');
	      
	    $this->redirect($this->generateUrl('client_edit', $client));
>>>>>>> 59f772dcfc403951a3d568390a97b104fbddbade
	  }else {
	  	$this->getUser()->setFlash('error', 'There was some errors capturing your client.');
	  	
	  }
 } 
}

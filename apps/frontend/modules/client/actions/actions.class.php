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
    $this->forward('default', 'module');
  }
  
 /**
  * Executes new action
  *
  * @param sfRequest $request A request object
  */
  public function executeNew(sfWebRequest $request)
  {
	  $this->form = new ClientForm($this->getUser());
  }

 /**
  * Executes create action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
	  $this->form = new ClientForm($this->getUser());
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
   $this->form = new ClientForm($this->getRoute()->getObject());
  }
  
  /**
  * Executes edit action
  *
  * @param sfRequest $request A request object
  */ 
  public function executeUpdate(sfWebRequest $request)
  {
   $this->form = new ClientForm($this->getRoute()->getObject());
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
 
    $this->redirect('client_show', $client);
  }
 }
 
}

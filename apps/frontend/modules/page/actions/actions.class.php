<?php

/**
 * page actions.
 *
 * @package    meteb
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{
	
 /**
  * Action to add the sign in form before
  * every action
  */
  public function preExecute() {
	$this->form = new sfGuardUserForm();	
  }	
	
 /**
  * Executes index action to render the index page
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
   
  }
  
 /**
  * Executes glossary action to render the glossary page
  *
  * @param sfRequest $request A request object
  */
  public function executeGlossary(sfWebRequest $request)
  {
   
  }  
  
 /**
  * Executes contact action to render the contact page
  *
  * @param sfRequest $request A request object
  */
  public function executeContact(sfWebRequest $request)
  {
   
  } 
}

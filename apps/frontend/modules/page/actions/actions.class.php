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
	$this->form = new sfGuardFormSignin();	
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

 /**
  * Executes about action to render the about page
  *
  * @param sfRequest $request A request object
  */
  public function executeAbout(sfWebRequest $request)
  {
   
  } 
    
 /**
  * Executes toolbox action to render the toolbox page
  *
  * @param sfRequest $request A request object
  */
  public function executeToolbox(sfWebRequest $request)
  {
   
  }  
  
 /**
  * Executes Annuities_Explained action to render the Annuities_Explained page
  *
  * @param sfRequest $request A request object
  */
  public function executeAnnuityexplained(sfWebRequest $request)
  {
   
  }  
  
 /**
  * Executes Annuity_Options action to render the Annuity_Options page
  *
  * @param sfRequest $request A request object
  */
  public function executeAnnuityoptions(sfWebRequest $request)
  {
   
  }    
  
 /**
  * Executes downloads action to render the downloads page
  *
  * @param sfRequest $request A request object
  */
  public function executeDownloads(sfWebRequest $request)
  {
   
  }    
  
 /**
  * Executes help action to render the help page
  *
  * @param sfRequest $request A request object
  */
  public function executeHelp(sfWebRequest $request)
  {
   
  }    
    
}

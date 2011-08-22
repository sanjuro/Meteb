<?php

/**
 * Quote actions.
 *
 * @package    meteb
 * @subpackage quote
 * @author     Shadley Wentzel <shad6ster@gmail.com>
 * @version    GIT
 */
class quoteActions extends sfActions
{
  /**
  * Executes the pre-execute session check on the API
  * call
  *
  * @param sfRequest $request A request object
  */
  public function preExecute()
  { 
	sfConfig::set('sf_web_debug', false);

  	$auth['token'] = $this->request->getParameter('token');

	// If the session does not have the generated api token. the session is
	// not authenticated or the passed api token does not match the session token
	// set 401 headers
	if(!($this->getUser()->isAuthenticated()) || !isset($auth['token']) 
		|| $auth['token'] != $this->getUser()->getApiToken())
	{
 		$this->response->setStatusCode('401');
 		$feedback = 'The user is not authenticated';
        return $this->renderPartial('messages/error', array('feedback' => $feedback));
	}
	
  }
 
  /**
  * Executes get a client action for the API interface
  * based on the client id parameter
  * 
  * @WSMethod(name='GenerateQuote', webservice="SOAPApi")
  * 
  * @param string $token Session token
  *
  * @return array Quote Data from generate business function
  */
  public function executeGenerate(sfWebRequest $request)
  {		
	$api_user = $this->getUser()->getGuardUser();
	
	if ($request->isMethod('post'))
    {    
    	/**
    	 * Get the request data and generate the quote date 
    	 * catch any input errors
    	 */
    	try 
		{  
	   	 	$quote_calculations = MetebQuote::generate($request, $quote->getCommission()->getTitle(), $pp, $annuity);
	   	 	   	 	
	   		$this->response->setStatusCode('200');           
			return $this->renderPartial('messages/entry', array('objects' => $quote_calculations));
	   	 	
		}catch (Exception $e){
			 			 	 
	 		$this->response->setStatusCode('401');
	 		$feedback = $e->getMessage();
	        return $this->renderPartial('messages/error', array('feedback' => $feedback));
				 	    
		}
		  
	   	$this->response->setStatusCode('200');           
		return $this->renderPartial('messages/entry', array('objects' => $clients));
    }
    else if ($request->isMethod('get'))
    {
 		$this->response->setStatusCode('401');
 		$feedback = 'Invalid request';
        return $this->renderPartial('messages/error', array('feedback' => $feedback));
    }  	

  } 
}

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
  * Executes create quote action for the API interface
  * based on the client id parameter using POST
  * 
  * @WSMethod(name='CreateQuote', webservice="SOAPApi")
  * 
  * @param string $token Session token
  *
  * @return array Quote Data from generate business function
  */
  public function executeCreate(sfWebRequest $request)
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
			/**
			 * Create new Client object
			 */
			$client = MetebQuoteApi::createClient($request);
			
			/**
			 * Create new associated UserProfile object
			 */
			$userProfile = MetebQuoteApi::createUserProfile($request, $client->getId(), $api_user);
							
			/**
			 * Create new Quote object
			 */
			$quote = MetebQuoteApi::createQuote($request, $client->getId());

			/**
			 * Build Quote Array for Shit Function
			 */
			$quoteInputArray = array();
			$quoteInputArray['quote_type_id'] = $quote->getQuoteTypeId();
			$quoteInputArray['commission'] = $quote->getCommission()->getTitle();
			$quoteInputArray['main_sex'] = $quote->getMainSex();
			$quoteInputArray['main_dob'] = $quote->getMainDob();
			$quoteInputArray['second_life'] = $quote->getSecondLife();
			$quoteInputArray['spouse_sex'] = $quote->getSpouseSex();
			$quoteInputArray['spouse_dob'] = $quote->getSpouseDob();
			$quoteInputArray['gp'] = $quote->getGp();
			$quoteInputArray['spouse_rev'] = $quote->getSpouseReversion()->getTitle();
			$quoteInputArray['pp'] = $quote->getPurchasePrice();
			$quoteInputArray['annuity'] = $quote->getAnnuity();
			
			/**
			 * Use the Shit function to get shit from it
			 */
	   	 	$quote_calculations = MetebQuote::generate($quoteInputArray);
	   	 	$quote_calculations['id'] = $quote->getId();
	   	 	
	   		$this->response->setStatusCode('200');           
			return $this->renderPartial('messages/object', array('object' => $quote_calculations));
	   	 	
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

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
			 * Create new Quote object
			 */
			$quote = new Quote();
			$quote->setClientId($request['client_id']);
			$quote->setQuoteTypeId($request['quote_type']);
			$quote->setSecondLife($request['second_life']);
			$quote->setMainSex($request['main_sex']);
			$quote->setMainDob($request['main_dob']);
			$quote->setSpouseSex($request['spouse_sex']);
			$quote->setSpouseDob($request['spouse_dob']);
			$quote->setGp($request['gp']);
			$quote->setSpouseReversionId($request['spouse_reversion']);
			$quote->setAnnuity($request['annuity']);
			$quote->setPurchasePrice($request['purchase_price']);
			$quote->setCommissionId($request['commission']);
			$quote->setCommenceAt($request['commence_at']);
			$quote->save();
			
			
			/**
			 * Create holder array from request
			 */
	   	 	$quote_calculations = MetebQuote::generate(	  
													      $quote->getQuoteTypeId(),
					   	 								  $quote->getMainSex(),
					   	 								  $quote->getMainDob(),
														  $quote->getSpouseSex(),
														  $quote->getSpouseDob(),
														  $quote->getSecondLife(),
					   	 								  $quote->getSpouseReversion()->getTitle(),
														  $quote->getGp(),	
														  $quote->getPurchasePrice(),  
					   	 								  $quote->getAnnuity(),
					   	 								  $quote->getCommission()->getTitle(),
					   	 								  $quote->getCommenceAt(),
														  $quote->setSpouseDob()
													  );
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

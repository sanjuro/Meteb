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
  }
 
	/**
	* Executes create quote action for the API interface
	* based on the client id parameter using POST
	*
	* @WSMethod(name='newQuote', webservice="SoapApi")
	*
	* @param string $token Api Session token
	* @param string $clientId Client id
	* @param array $quoteData
	*
	* @return newQuoteResponse $result
	*/
	public function executeNew(sfWebRequest $request)
	{		
		$token = $request->getParameter('token');
		
		$api_token = $this->getUser()->getAttribute('api_token', '', 'user');
	
		if (empty($token) && $token != $api_token) {
	            if($this->isSoapRequest()){
	                $e = new SoapFault('Server', 'The user is not authenticated!');
	                throw $e;
		}else{
	                $this->response->setStatusCode('401');
	                $feedback = 'The user is not authenticated';
	                $this->feedback  = $feedback;
	                return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
	            }
		}
		
		$clientId = $request->getParameter('clientId');
		
		$quoteData = $request->getParameter('quoteData'); 
		
		# Validate incoming info
		if (!self::validateName($clientId)) {
	
	            # Customer id might not be valid...
	
	            if($this->isSoapRequest()){
	                $e = $this->isSoapRequest() ? new SoapFault('Server', 'Invalid customer ID!') : new InvalidArgumentException('Invalid customer ID!');
	                throw $e;
		}else{
	                $this->response->setStatusCode('401');
	                $feedback = 'Invalid customer ID';
	                $this->feedback  = $feedback;
	                return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
	            }
		}	
	        
	    $client = Doctrine::getTable('sfGuardUser')	    
		      ->findOneById($clientId); 	
	        
		if(empty($client)){
	
	            if($this->isSoapRequest()){
	                $e = $this->isSoapRequest() ? new SoapFault('Server', 'Client requested could not be found.!') : new InvalidArgumentException('Client could not be found.!');
	                throw $e;
	            }else{
	                $this->response->setStatusCode('401');
	                $feedback = 'Client requested could not be found.';
	                $this->feedback  = $feedback;
	                return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
	            }
	
		}       
		
		try {	
	
				/**
				 * Create new Client object
				 */
				// $client = MetebQuoteApi::createClient($request);
				
				/**
				 * Create new associated UserProfile object
				 */
				// $userProfile = MetebQuoteApi::createUserProfile($request, $client->getId(), $api_user);
						
				/**
				 * Create new Quote object
				 */
				$quote = MetebQuoteApi::createQuote($quoteData, $client->getId());
				
				/**
				 * Use the function 
				 */
				
		   	 	$quote_calculations = $quote->getQuoteOutputTypes();
		   	 	$quote_calculations['id'] = $quote->getId();
		   	 	$quote_calculations['quote_id'] = $quote->getId();
		   	 	
	            $newQuoteResponseObj = new newQuoteResponse($quote->getId(),
	            											$quote_calculations['data_date'],
	            											$quote_calculations['quote_date'],
	            											$quote_calculations['commencement_date'],
	            											$quote_calculations['first_payment_date']);
	
	            $this->response->setStatusCode('200'); 
	            $this->result = $newQuoteResponseObj;
		   		          
				return $this->renderPartial('messages/object', array('object' => $quote_calculations ));		
	
		}catch (Exception $e){
	
	            if($this->isSoapRequest()){
	                $e = new SoapFault('Server', $e->getMessage());
	                throw $e;
	            }else{
	                $this->response->setStatusCode('401');
	                $feedback = $e->getMessage();
	                $this->feedback  = $feedback;
	                return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
	            }
		}	
	
	  } 
  
    /**
    * Validate clientId
    *
    * @param string $name
    * @return boolean
    */

    private static function validateName($name)
    {
        $validate = new sfValidatorString(array('min_length' => 1, 'max_length' => 20 ));

        try{
            $result = $validate->clean($name);
        }catch (sfValidatorError $e){
            return false;
        }

        return true;
    }  
}

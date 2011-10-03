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
  * @WSMethod(name='newQuote', webservice="soapApi")
  * 
  * @param string $token Api Session token
  * @param string $dateOfFundCredit 
  * @param string $dateOfInvestment 
  * @param string $fundAmount
  * @param string $fundCode
  * @param string $fundCredit
  * @param string $fundPercentage
  * @param string $fundPercentInd 
  * @param string $jointLifeDateOfBirth
  * @param string $jointLifeGender
  * @param string $jointLifeInd
  * @param string $jointLifeInitials
  * @param string $jointLifePerc
  * @param string $jointLifeSurname
  * @param string $jointLifeTitle
  * @param string $memberCellNo
  * @param string $memberDateOfBirth
  * @param string $memberDateOfRetirement
  * @param string $memberGender
  * @param string $memberIdIsPassport
  * @param string $memberIdNumber
  * @param string $memberInitials
  * @param string $memberRefNumber
  * @param string $memberSurname
  * @param string $memberTitle
  * @param string $productCode
  * @param string $requestBy
  * @param string $requestDateTime
  * @param string $requestId
  * @param string $requestSource
  * @param string $requestStatus
  * @param string $spCode
  * @param string $statusComment
  * @param string $statusDate
  * 
  * @return CreateQuoteResponse $result
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
	   	 	$this->quote_calculations = $quote->getQuoteOutputTypes();
	   	 	
	   	 	$this->quote = $quote;
	   	 	
	   		$this->response->setStatusCode('200');           
			return $this->renderPartial('messages/object', array('object' => $this->quote_calculations ));		

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
        $validate = new sfValidatorString(array('min_length' => 4, 'max_length' => 20 ));

        try{
            $result = $validate->clean($name);
        }catch (sfValidatorError $e){
            return false;
        }

        return true;
    }  
}

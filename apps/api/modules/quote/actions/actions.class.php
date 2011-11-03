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
    * @param newQuoteRequest $newQuote  Quote Information to be used for the new license
	*
	* @return string $result
	* 
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
		
		$q = $request->getParameter('newQuote');
		    
		
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
				// $quote = MetebQuoteApi::createQuote($q);
				$quote_calculations = MetebQuoteApi::createQuote($q);
				
				// $client = $quote->getClient();
				
				/**
				 * Use the function 
				 */
				
		   	 	// $quote_calculations = $quote->getQuoteOutputTypes();
		   	 	// $quote_calculations['id'] = $quote->getId();
		   	 	// $quote_calculations['quote_id'] = $quote->getId();
		   	 	
        		# Get Partial for PDF
				sfProjectConfiguration::getActive()->loadHelpers('Partial');
				
				$PDFContent = get_partial('quote/pdf', array( 'quote_calculations' => $quote_calculations, 'client' => $client, 'userprofile' => '', 'quote' => $quote) );        
        		   	 
		   	 
		        # Generate PDF
				$metebPDF = new metebPDF();
				$metebPDF->CreateSOAPQuote($PDFContent);
				$metebPDF->load_html($metebPDF->HTML);		
				
				
				// $quotePDf = $metebPDF->stream("Quotation.pdf");
		   	 		
	            // $newQuoteResponseObj = new newQuoteResponse();
	            $newQuoteResponseString = base64_encode($metebPDF->output_html());            
	            
	            $this->result = $newQuoteResponseString; 

                $this->response->setStatusCode('200');

                return $this->renderPartial('messages/message', array('message' => $this->result));
						
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

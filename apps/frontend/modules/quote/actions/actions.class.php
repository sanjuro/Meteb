<?php

require_once dirname(__FILE__).'/../lib/quoteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/quoteGeneratorHelper.class.php';

/**
 * quote actions.
 *
 * @package    meteb
 * @subpackage quote
 * @author     Shadley Wentzel
 * @version    GIT:
 */
class quoteActions extends autoQuoteActions
{
	
	/**
	 * This Action will handle creating a new quote for a client
	 * 
	 * @param object  $request
	 * @return unknown
	 */
	  public function executeNew(sfWebRequest $request)
	  {
	  	$userForQuote = $this->getRoute()->getObject();
	  	
	  	if(!empty($userForQuote)){ 
	  		$this->form = new FrontendQuoteForm('', array('currentUser' => $this->getUser()));
	  	}else{
	  		$this->form = new FrontendQuoteForm();
	  	}
	    
	  	$this->userForQuote = $userForQuote;
	    
	    $this->quote = $this->form->getObject();
	  }
	  	  
	 /**
	 * This Action will handle creating a new quote for a client
	 * 
	 * @param object  $request
	 * @return unknown
	 */
	  public function executeCreate(sfWebRequest $request)
	  {
	    $this->form = new FrontendQuoteForm('', array('currentUser' => $this->getUser()));  													 
	
	    $this->processForm($request, $this->form);
	    
	    $this->quote = $this->form->getObject();
	    
	  	$this->userForQuote = $this->quote->getGuardUser()->getName();
	
	    $this->setTemplate('new');
	  }	  
	  
	 /**
	 * This Action will handle Refreshing a quote and all its calculations
	 * 
	 * @param object  $request
	 * @return unknown
	 */
	  public function executeListRefresh(sfWebRequest $request)
	  {
	    $this->quote = $this->getRoute()->getObject();
	   
	    $refreshQuote = new Quote();
	    $refreshQuote = $this->quote->copy();
	    $refreshQuote->save();
	    
	    $this->redirect('@quote');
	  }
	  	  
	 /**
	 * This Action will handle Updating a quote and all its calculations
	 * 
	 * @param object  $request
	 * @return unknown
	 */
	  public function executeUpdate(sfWebRequest $request)
	  {
	    $this->quote = $this->getRoute()->getObject();
	    
	    $userForQuote = Doctrine::getTable('sfGuardUser')->findOneById($this->quote->getClientId());
	    
	    $this->form = new FrontendQuoteForm($this->quote, array('currentUser' => $this->getUser()));
	
	    $this->processForm($request, $this->form);
	
	    $this->setTemplate('edit');
	  }
	  	  
	 /**
	  * This Action will handle Generating a quote and all its calculations
	  * 
	  * @param object  $request
	  * @return unknown
	  */
  	  public function executeListView(sfWebRequest $request)
  	  {
        $quote = $this->getRoute()->getObject();
            
        $this->quote = $quote;
        
        $this->quote_calculations = $quote->getQuoteOutputTypes();
        
        $this->client = $quote->getClient();
        
        $userprofile = $this->client->getUserProfile();
        
        $this->userprofile = $userprofile[0];

      }
      
	/**
	 * This action handles the actual streaming of quotes to PDF
	 *
	 * @param sfWebRequest  $request
	 * @return unknown
	 */
	public function executePdf(sfWebRequest $request) {
		
		$quote = $this->getRoute()->getObject();
		
		sfConfig::set('sf_web_debug', false);
		
		$this->quote = $quote;
        
        $client = '';
        $userprofile = '';
        $client = $this->quote->getClient();
    	$userprofile = $client->getUserProfile();
    	$userprofile = $userprofile[0];

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
		 * Create holder array from request
		 */
   	 	$quote_calculations = $quote->getQuoteOutputTypes();
		
        // Get Partial for PDF
		sfProjectConfiguration::getActive()->loadHelpers('Partial');

		$PDFContent = get_partial('quote/pdf', array( 'quote_calculations' => $quote_calculations, 'client' => $client, 'userprofile' => $userprofile, 'quote' => $quote) );        

        // Generate PDF
		$metebPDF = new metebPDF();
		$metebPDF->CreateQuote($quote, $PDFContent);
		$metebPDF->load_html($metebPDF->HTML);
		$metebPDF->render();

		$metebPDF->stream("Quotation_".$quote->getId().".pdf");
		
		return sfView::NONE;
	}
	
	/**
	 * This Action will handle creating a new quote for a client, it also log this into
	 * the Activty table
	 * 
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 * 
	 * @return unknown
	 */
	  protected function processForm(sfWebRequest $request, sfForm $form)
	  {
	    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	    if ($form->isValid())
	    {
	      $notice = $form->getObject()->isNew() ? 'The quote was created successfully.' : 'The quote was updated successfully.';
		
	      try {
	        $quote = $form->save();
	        
	        if($form->isNew()){
        		ActivityTable::addActivty($this->getUser()->getGuardUser()->getId(), 2);
       		 }else {
        		ActivityTable::addActivty($this->getUser()->getGuardUser()->getId(), 4);
        	}
	      } catch (Doctrine_Validator_Exception $e) {
	
	        $errorStack = $form->getObject()->getErrorStack();
	
	        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
	        foreach ($errorStack as $field => $errors) {
	            $message .= "$field (" . implode(", ", $errors) . "), ";
	        }
	        $message = trim($message, ', ');
	
	        $this->getUser()->setFlash('error', $message);
	        return sfView::SUCCESS;
	      }
	
	      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $quote)));
	
	      if ($request->hasParameter('_save_and_add'))
	      {
	        $this->getUser()->setFlash('notice', $notice.' You can add another one below by selecting the client for the quote.');
	
	        $this->redirect('@client');
	      }
	      else if ($request->hasParameter('_save_and_pdf'))
	      {
	        $this->getUser()->setFlash('notice', $notice.' You quote has been saved and the pdf is being generated.');
	
	        $this->redirect(array('sf_route' => 'quote_pdf', 'sf_subject' => $quote));
	      }
	      else
	      { 
	        $this->getUser()->setFlash('notice', $notice);
	
	        $this->redirect(array('sf_route' => 'quote_edit', 'sf_subject' => $quote));
	      }
	    }
	    else
	    {
	      $this->getUser()->setFlash('error', 'The quote has not been saved due to some errors.', false);
	    }
	  }  
	  
	/**
	 * This will generate the query for returning quotes
	 * 
	 * @param object  $request
	 * @return unknown
	 */
	  protected function buildQuery()
	  {;
	    
	    $tableMethod = $this->configuration->getTableMethod();
	    if (null === $this->filters)
	    {
	      $this->filters = $this->configuration->getFilterForm($this->getFilters());
	    }
	
	    $this->filters->setTableMethod($tableMethod);
	
	    $query = $this->filters->buildQuery($this->getFilters());
	    
	    $query = Doctrine_Query::create()
		    		 ->from('Quote q')
		    		 ->where('q.created_by = ?', $this->getUser()->getGuardUser()->getId())
		    		 ->orWhere('q.client_id = ?', $this->getUser()->getGuardUser()->getId());
	  	
	    if ($tableMethod)
	    {
	      $query = Doctrine_Core::getTable('sfGuardUser')->$tableMethod($query);
	    }
		
	    $this->addSortQuery($query);
	
	    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
	    $query = $event->getReturnValue();
	
	    return $query;
	  }
	
}
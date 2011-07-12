<?php

require_once dirname(__FILE__).'/../lib/quoteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/quoteGeneratorHelper.class.php';

/**
 * quote actions.
 *
 * @package    meteb
 * @subpackage quote
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quoteActions extends autoQuoteActions
{
	/**
	 * This Action will handle creating a new quote for a client
	 */
	  public function executeNew(sfWebRequest $request)
	  {
	  	$userForQuote = $this->getRoute()->getObject();
	  	 
	  	if(!empty($userForQuote)){ 
	  		$this->form = new BackendQuoteForm('', array('userForQuote' => $userForQuote));
	  	}else{
	  		$this->form = $this->configuration->getForm();
	  	}
	    
	    $this->quote = $this->form->getObject();
	  }
	  
	 /**
	 * This Action will handle Generating a quote and all its calculations
	 */
  	  public function executeListGenerate(sfWebRequest $request)
  	  {
        $quote = $this->getRoute()->getObject();
            
        $annuity = $quote->calc_annuity($quote->getPri(), $quote->getPurchasePrice());
     	
        $pp = $quote->calc_pp($quote->getPri(), $annuity);
        
        $this->quote = $quote;
    	
        $this->quote_calculations = $quote->generate($quote->getCommission(), $pp, $annuity);
        // Meteb::TKO($this->quote_calculations);
      }
      
  
	/**
	 * This action handles the actual streaming of quotes to PDF
	 *
	 * @param object  $request
	 * @return unknown
	 */
	public function executePdf(sfWebRequest $request) {
		
		$quote = $this->getRoute()->getObject();
		
		sfConfig::set('sf_web_debug', false);
		
		$annuity = $quote->calc_annuity($quote->getPri(), $quote->getPurchasePrice());
     
        $pp = $quote->calc_pp($quote->getPri(), $annuity);
        
        $this->quote = $quote;
        
        $client = $this->quote->getClient();
    	$userprofile = $client->getUserProfile(0);
    	
        $quote_calculations = $quote->generate($quote->getCommission(), $pp, $annuity);
		
        // Get Partial for PDF
		sfProjectConfiguration::getActive()->loadHelpers('Partial');
				
		$PDFContent = get_partial('quote/pdf', array( 'quote_calculations' => $quote_calculations, 'client' => $client, 'userprofile' => $userprofile) );        
        
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
	 */
	  protected function processForm(sfWebRequest $request, sfForm $form)
	  {
	    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	    if ($form->isValid())
	    {
	      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
	
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
	        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');
	
	        $this->redirect('@quote_new');
	      }
	      else
	      {
	        $this->getUser()->setFlash('notice', $notice);
	
	        $this->redirect(array('sf_route' => 'quote_edit', 'sf_subject' => $quote));
	      }
	    }
	    else
	    {
	      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
	    }
	  }
	
}

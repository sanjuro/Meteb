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
	  
  public function executeListPdf(sfWebRequest $request)
  {
    $quote = $this->getRoute()->getObject();
    
    $annuity = $quote->calc_annuity();
    Meteb::TKO($annuity);
    $pp = $quote->calc_pp($annuity);
    
    $this->redirect('@quote_new');
  }
	
}

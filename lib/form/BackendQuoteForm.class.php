<?php

/**
 * BackendQuoteForm form.
 *
 * @package    meteb
 * @subpackage Quote form
 * @author     Shadley Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendQuoteForm extends BaseQuoteForm
{
  public function configure()
  {
  	parent::configure();
  	
  	if ($this->getOption("currentUser") instanceof sfUser && ($this->getOption("currentUser")))
	{
	    $currentUser = $this->getOption("currentUser");	    
	}
	
     $userForQuote = $this->getOption("userForQuote");	    


    unset(
      $this['id'], $this['created_by'],
      $this['initial_gross_annuity'], $this['initial_net_annuity'],
      $this['commence_at'], $this['first_annuity_increase'],
      $this['guaranteed_terms'], $this['premium_charge'],
      $this['fund_charge'], $this['administrative_charge'],
      $this['created_at'], $this['updated_at']
    );
    
	$this->setDefaults(array(
			'client_id'      => $userForQuote->getId(),
			 'main_sex'      => $userForQuote->getUserProfile()->getGenderId(),
		));
  }
}
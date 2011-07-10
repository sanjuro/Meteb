<?php

/**
 * BackendQuoteForm form.
 *
 * @package    meteb
 * @subpackage Quote form
 * @author     Shadley Wentzel
 * @version    GIT:
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
	
	if($this->getOption("userForQuote")){
     $userForQuote = $this->getOption("userForQuote");	 

     $userprofile = $userForQuote->getUserProfile();
	}

    unset(
      $this['id'], $this['created_by'],
      $this['initial_gross_annuity'], $this['initial_net_annuity'],
      $this['commence_at'], $this['expires_at'], $this['first_annuity_increase'],
      $this['guaranteed_terms'], $this['premium_charge'],
      $this['fund_charge'], $this['administrative_charge'],
      $this['created_at'], $this['updated_at']
    );
    
	$this->widgetSchema['gp'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Guanrateed Period', 'choices' => array( 0 => '0 months', 1 => '60 months', 2 => '120 months')));

	$this->widgetSchema['pri'] = new sfWidgetFormInputText(
	     	array( 'label' => 'Post Retirement Interest rate'));
	     	
	$this->widgetSchema['spouse_reversion'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Spouse Revesion', 'choices' => array( 0 => '0%', 1 => '25%', 2 => '50%', 3 => '75%', 4 => '100%')));
    
	$this->widgetSchema['second_life'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Second Life', 'choices' => array( 0 => 'no', 1 => 'yes')));
    
	$this->widgetSchema['main_dob'] = new sfWidgetFormDateJQueryUI(
			array("change_month" => true, "change_year" => true));
	
	$this->widgetSchema['spouse_dob'] = new sfWidgetFormDateJQueryUI(
			array("change_month" => true, "change_year" => true));
    
  	if($this->getOption("userForQuote")){
		$this->setDefaults(array(
			'client_id'      => $userForQuote->getId(),
			'main_sex'       => $userprofile[0]->getGenderId(),
			'main_dob'       => $userprofile[0]->getDob(),
			'spouse_sex'     => $userprofile[0]->getSpouseGenderId(),
		));
	}

  }
}
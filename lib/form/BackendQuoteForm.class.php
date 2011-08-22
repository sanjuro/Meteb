<?php

/**
 * BackendQuoteForm form, extends the base qutoe form renames some labels.
 * Also sets the created by field using the logged in user
 *
 * @package    meteb
 * @subpackage Quote form
 * @author     Shadley Wentzel
 * @version    GIT:
 */
class BackendQuoteForm extends BaseQuoteForm
{
  public $currentUser;
	
  public function configure()
  {
  	$years = range(date('Y') - 90, date('Y'));  
  	
  	
  	parent::configure();
  	
  	if ($this->getOption("currentUser") instanceof sfUser && ($this->getOption("currentUser"))){
	    $this->currentUser = $this->getOption("currentUser");	    
	}

	if($this->getOption("userForQuote")){
     $userForQuote = $this->getOption("userForQuote");	 

     $userprofile = $userForQuote->getUserProfile();
	}

    unset(
      $this['id'], $this['created_by'], $this['pri'],
      $this['initial_gross_annuity'], $this['initial_net_annuity'],
      $this['expires_at'], $this['first_annuity_increase'],
      $this['guaranteed_terms'], $this['premium_charge'],
      $this['fund_charge'], $this['administrative_charge'],
      $this['created_at'], $this['updated_at']
    );
    
 	$this->widgetSchema['quote_type_id'] = new sfWidgetFormDoctrineChoice ( array('model' => 'QuoteType', 
													  'add_empty' => "Select a Quote Type",
													  'label' => 'Province/Region',
												), array ( ));   
												
	$this->validatorSchema['quote_type_id'] = new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'QuoteType'));
	
    
	$this->widgetSchema['gp'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Guanrateed Period', 'choices' => array( 0 => '0 months', 60 => '60 months', 120 => '120 months')));
	     	
	$this->widgetSchema['spouse_reversion_id'] = new sfWidgetFormDoctrineChoice(
	     	array( 'model' => 'SpouseReversion',  'label' => 'Spouse Reversion', 'add_empty' => "Select a Spouse Reversion"), array ( ));  
    
	$this->widgetSchema['second_life'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Is there a spouse?', 'choices' => array( 0 => 'no', 1 => 'yes')));
	     	
	$this->widgetSchema['commence_at'] = new sfWidgetFormDateJQueryUI(
			array("label" => "Commenencement Date", "change_month" => true, "change_year" => true));
    
	$this->widgetSchema['main_dob'] = new sfWidgetFormDate(
			array("label" => "Date of Birth", "format" => "%day%/%month%/%year%", 'years' => array_combine($years, $years)) );
	
	$this->widgetSchema['spouse_dob'] = new sfWidgetFormDate(
			array("label" => "Spouse Date Date of Birth", "format" => "%day%/%month%/%year%", 'years' => array_combine($years, $years)) );
			
	$this->widgetSchema['commission_id'] = new sfWidgetFormDoctrineChoice(
	     	array( 'model' => 'Commission',  'label' => 'Commission Percentage', 'add_empty' => "Select a Commission"), array ( ));  
	     	
	$this->widgetSchema['spouse_sex'] = new sfWidgetFormDoctrineChoice(array('label' => 'Spouse Gender', 'model' => $this->getRelatedModelName('SpouseGender'), 'add_empty' => true));
	
	$this->validatorSchema['spouse_reversion_id'] = new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'SpouseReversion'));
    
	$dateNow = new DateTime(date('Y-m-d'));
	$dateNow->modify('+1 month');
	
  	if($this->getOption("userForQuote")){
		$this->setDefaults(array(
			'client_id'      => $userForQuote->getId(),
			'main_sex'       => $userprofile[0]->getGenderId(),
			'main_dob'       => $userprofile[0]->getDob(),
			'spouse_sex'     => $userprofile[0]->getSpouseGenderId(),
		    'commence_at'    => $dateNow->format('Y-m-d'),
		));
	}
  }
  
  public function updateObject($values = null)
  { 
    if (is_null($values))
    {
      $values = $this->values;
    }
    	
    $values['created_by'] =  $this->currentUser->getGuardUser()->getId();

    $values['pri_id'] = 1;
    
	$values = $this->processValues($values);
	
    $this->doUpdateObject($values);

    // embedded forms
    $this->updateObjectEmbeddedForms($values);

    return $this->getObject();
  }
}
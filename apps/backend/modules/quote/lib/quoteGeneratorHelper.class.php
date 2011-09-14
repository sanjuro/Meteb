<?php

/**
 * quote module helper.
 *
 * @package    meteb
 * @subpackage quote
 * @author     Shadley Wentzel <shad6ster@gmail.com>
 * @version    GIT
 */
class quoteGeneratorHelper extends BaseQuoteGeneratorHelper
{
	
	/**
	 * This function generates a link button in the quote for to save a new quote and generate the pdf
	 * 
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 * 
	 * @return unknown
	 */
	public function linkToSaveAndPdf($object, $params)
    {    
     return '<li class="sf_admin_action_save_and_pdf"><input value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_pdf" type="submit"></li>';
    }
    
	/**
	 * This function generates a link button in the quote to generate the pdf
	 * 
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 * 
	 * @return unknown
	 */
	public function linkToGenerate($object, $params)
    {    
     return '<li class="sf_admin_action_generate_pdf"><input value="'.__($params['label'], array(), 'sf_admin').'" name="_generate_pdf" type="submit"></li>';
    }
    
	/**
	 * This function generates a link button in the quote to refersh the quote
	 * 
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 * 
	 * @return unknown
	 */
	public function linkToRefresh($object, $params)
    {    
     return '<li class="sf_admin_action_refresh">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('refresh'), $object).'</li>';
    }
	
}

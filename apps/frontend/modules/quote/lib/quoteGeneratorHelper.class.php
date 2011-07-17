<?php

/**
 * quote module helper.
 *
 * @package    meteb
 * @subpackage quote
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
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
	
}

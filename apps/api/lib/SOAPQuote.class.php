<?php
/**
 * SOAP Quote Class
 * 
 * This class define all the request and respone definitions for Quote API
 * calls
 * 
 * @package    meteb
 * @subpackage SOAP
 * @author     Shadley Wentzel<shad6ster@gmail.com>
 * @version    GIT
 */


class newQuoteResponse 
{
	
    /**
     * Quote Id
     * 
     * @var integer
     */
    public $quote_data;
     

	public function __construct($quote_data)
	{
		$this->quote_id = $quote_data;
	}    
}
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
    public $quote_id;
    
    /**
     * Quote data date
     * 
     * @var string
     */
    public $data_date;
    
    /**
     * Quote date
     * 
     * @var string
     */
    public $quote_date;   

    /**
     * Quote commencement date
     * 
     * @var string
     */
    public $commencement_date;     

    /**
     * Quote first payment date
     * 
     * @var string
     */
    public $first_payment_date;    

	public function __construct($quote_id, $data_date, $quote_date, $commencement_date, $first_payment_date)
	{
		$this->quote_id = $quote_id;
		$this->data_date = $data_date;
		$this->quote_date = $quote_date;
		$this->commencement_date = $commencement_date;
		$this->first_payment_date = $first_payment_date;
	}    
}
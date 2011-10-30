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
class newQuoteRequest
{
     /**
	 * client_id
     * 
     * @var string
     */
    public $client_id;	
	
     /**
	 * date_prepared
     * 
     * @var string
     */
    public $date_prepared;
    
     /**
	 * main_name
     * 
     * @var string
     */
    public $main_name;

     /**
	 * main_dob
     * 
     * @var string
     */
    public $main_dob;

     /**
	 * gender_main
     * 
     * @var string
     */
    public $gender_main;    
    
}

class newQuoteResponse 
{
	
    /**
     * Quote Id
     * 
     * @var integer
     */
    public $quote_data;   
}
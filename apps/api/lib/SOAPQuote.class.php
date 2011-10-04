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
     * Quote Type
     * 
     * @var integer
     */
    public $quote_type;

    /**
     * Second Life for quote
     * 
     * @var integer
    */
    public $second_life;

    /**
     * Main sex for quote
     *
     * @var integer
     */
    public $main_sex;
    
    /**
     * Date of Birth of main member
     *
     * @var string
     */
    public $main_dob;
    
    /**
     * Spouses gender
     *
     * @var integer
     */
    public $spouse_sex;
    
    /**
     * Spouse Date of Birth
     *
     * @var string
     */
    public $spouse_dob;
    
    /**
     * Guarantee Period in months
     *
     * @var integer
     */
    public $gp;
    
     /**
     * Spouse Reversion if second life is on quote
     *
     * @var double
     */
    public $spouse_reversion;
    
    /**
     * Annutity value
     *
     * @var string
     */
    public $annuity;    
    
     /**
     * Purhcase price for quote
     *
     * @var double
     */
    public $purchase_price;  

    /**
     * Quoute commission
     *
     * @var double
     */
    public $commission;    
    
}

class newQuoteResponse 
{
	
    /**
     * Qute first name
     * 
     * @var integer
     */
    public $quote_id;
}
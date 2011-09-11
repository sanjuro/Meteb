<?php
/**
 * SOAP Client Class
 * 
 * This class define all the request and respone definitoions for Quote API
 * calls
 * 
 * @package    meteb
 * @subpackage SOAP
 * @author     Shadley Wentzel<shad6ster@gmail.com>
 * @version    GIT
 */
class CreateClientRequest
{
    /**
     * Client first name
     * 
     * @var string
     */
    public $first_name;

    /**
     * Client Last Name
     * 
     * @var string
    */
    public $last_name;

    /**
     * Client EmailAddress
     *
     * @var string
     */
    public $email_address;
    
    /**
     * Client Id
     *
     * @var string
     */
    public $id_number;
    
    /**
     * Client Gender
     *
     * @var integer
     */
    public $gender;
    
    /**
     * Client Date of Birth
     *
     * @var string
     */
    public $dob;
    
    /**
     * Spouse First name
     *
     * @var string
     */
    public $spouse_first_name;
    
     /**
     * Spouse Last name
     *
     * @var string
     */
    public $spouse_last_name;
    
    /**
     * Spouse Id
     *
     * @var string
     */
    public $spouse_id_number;    
    
     /**
     * Spouse Gender
     *
     * @var integer
     */
    public $spouse_gender;  

    /**
     * Spouse Date of Birth
     *
     * @var string
     */
    public $spouse_dob;    
    
}

class CreateClientResponse 
{
	
    /**
     * Client first name
     * 
     * @var string
     */
    public $first_name;
}
<?php
/**
 * SOAP Login Class
 * 
 * This class define all the request and respone definitoions for Login API
 * calls
 * 
 * @package    meteb
 * @subpackage SOAP
 * @author     Shadley Wentzel<shad6ster@gmail.com>
 * @version    GIT
 */
class LoginRequest
{
    /**
     * Client Token
     *
     * @var string
     */
    public $token;
	
    /**
     * Client Username
     * 
     * @var string
     */
    public $username;

    /**
     * Client Password
     * 
     * @var string
    */
    public $password;
      
}

class LoginResponse 
{
	
    /**
     * Generated
     * 
     * @var string
     */
    public $api_token;
}
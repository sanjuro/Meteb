<?php

/**
 * login actions.
 *
 * @package    eset
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{

	/**
	 * Action to remove the debug
	 */
	public function preExecute() {
		sfConfig::set('sf_web_debug', false);
	}



	/**
	 * Action to authenticate the api request
	 *
	 * @WSMethod(name='newLogin',webservice="SoapApi")
	 * 
     * @param string $token    Client Token
     * @param string $username Client Username
     * @param string $password Client Password
     *
     * @return string $result
	 */
	public function executeNew(sfWebRequest $request) {
	
		// now, analayze the PHP_AUTH_DIGEST var  
		$auth['token'] = $request->getParameter('token');
		$auth['username'] = $request->getParameter('username');
		$auth['password'] = $request->getParameter('password');
	
 		$api_userprofile = Doctrine::getTable('UserProfile')->findOneByToken($auth['token']);
 	
 		$this->forward404Unless($api_userprofile, 'Invalid API Token !!');
 		 
 		$user = Doctrine::getTable('sfGuardUser')->findOneById($api_userprofile->getSfuserId());		
 		 		
 		if(is_object($user)){

  		    $api_token = self::generateApiToken($user->getId(), $user->getUsername());	
		    $this->getUser()->setAttribute('api_token', $api_token, 'user');
			
			$this->getUser()->signIn($user);
			
 			$api_token = $this->getUser()->getAttribute('api_token', '', 'user'); 
            $object['id'] = $user->getId();
            $object['api_key'] =  $api_token;
              	
            $this->message = $api_token;
	 		return $this->renderPartial('messages/message', array('message' => $this->message));        
			
 		}else{
 		    $this->response->setStatusCode('401');

 		 	if($this->isSoapRequest()){
 				$e = new SoapFault('Server', 'The user is not authenticated!');
 				throw $e;
 			}else{
 				$feedback = 'The user is not authenticated';
 		   		$this->feedback  = $feedback;
            	return $this->renderPartial('messages/error', array('feedback' => $this->feedback));
 			}
 		}
		
	}
	
  /**
   * Generates a API token for the session
   * 
   * @param string $user_id User id of user
   * @param string $username Username of user
   * @return string API token
   */
   private function generateApiToken($user_id, $username)
   {
	  $salt = md5(rand(100000, 999999).$user_id.$username);
	  return sha1($salt.$user_id);
   }
}
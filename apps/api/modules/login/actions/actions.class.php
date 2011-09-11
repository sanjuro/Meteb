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
	 * Action to  authenticate the api request
	 * 
     * @WSMethod(name='Authenticate', webservice='SOAPApi')
     * @WSHeader(name='AuthHeader', type='AuthData')
	 * 
     * @param string $token    Client Token
     * @param string $username Client Username
     * @param string $password Client Password
     *
     * @return array $object API Token and ID
	 */
	public function executeAuthenticate(sfWebRequest $request) {
	
		// now, analayze the PHP_AUTH_DIGEST var  
		$auth['token'] = $this->request->getParameter('token');
		$auth['username'] = $this->request->getParameter('username');
		$auth['password'] = $this->request->getParameter('password');
		
 		$api_userprofile = Doctrine::getTable('UserProfile')->findOneByToken($auth['token']);
 		
 		$this->forward404Unless($api_userprofile,'Invalid API Token !!');
 		
 		$user = MetebUser::getAuthenticatedUser($auth); 		
 	
 		if(is_object($user)){
 			$this->getUser()->signIn($user);
 			$api_token = $this->getUser()->getAttribute('api_token', '', 'user');
            $object['id'] = $user->getId();
            $object['api_key'] =  $api_token;
           
 		 	if ($this->isSoapRequest()){
	 			return $object;
	 		}else{
	 			$this->response->setStatusCode('200');
	 			return $this->renderPartial('messages/object', array('object' => $object));
	 		}           
			
 		}else{
 		    $this->response->setStatusCode('401');
 		    $feedback = 'The user is not authenticated';
            return $this->renderPartial('messages/error', array('feedback' => $feedback));
 		}
		
	}
}
 <?php


 class AuthHeaderListener
 {
     const HEADER = 'AuthHeader';

     public static function handleAuthHeader($event)
     {
         if($event['header'] == self::HEADER)
         {
             if(!empty($event['data']->username) && !empty($event['data']->password) && !empty($event['data']->token) )
             {
                 $auth['token'] = $this->request->getParameter('token');
                 $auth['username'] = $this->request->getParameter('username');
                 $auth['password'] = $this->request->getParameter('password');

                 $group = GroupPeer::retrieveByToken($auth['token']);

                 $this->forward404Unless($group,'Invalid Client Token sucker fool !!');

                 $auth['groupid'] = $group->getId();

                 $user = UserPeer::getAuthenticatedUser($auth);


                 if(is_object($user)){
                     $this->getUser()->signIn($user);
                     $api_token = $this->getUser()->getAttribute('api_token', '', 'user');
                     $object['id'] = $user->getId();
                     $object['api_key'] =  $api_token;
                     sfContext::getInstance()->getUser()->setAuthenticated(true);
                     return true;
                 }else{

                     return false;
                 }


             }


         }

     }
 }
<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__).'/../lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeSignin($request)
  {  
    $user = $this->getUser();
    
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();
	
    if ($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('signin'));
      
      if ($this->form->isValid())
      { 
        $values = $this->form->getValues(); 
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);
       
        /**
         * Check creation date of client if older than 2 months set to inactive
         */
        if($this->getUser()->hasGroup('client')){
        	$creationDate = new DateTime($this->getUser()->getGuardUser()->getCreatedAt());
        	
        	$todayDate = new DateTime(date('Y-m-d'));   
        	
			$interval = '';
        	$interval = $creationDate->diff($todayDate);

        	if($interval->days > 60){
        		$this->getUser()->getGuardUser()->setIsActive(false);
        		$this->getUser()->getGuardUser()->save();
        	}
        	
        }
        
        /**
         * Only allow active clients to login
         */
       if(!$this->getUser()->getGuardUser()->getIsActive()){
        	
   			 $this->getUser()->signOut();
   			 
    		 $this->getUser()->setFlash('error', 'Your login has expired please contact Momentum to renew it.');
        }

        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      // $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }
}

<?php

require_once dirname(__FILE__).'/../lib/clientGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clientGeneratorHelper.class.php';

/**
 * client actions.
 *
 * @package    meteb
 * @subpackage client
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends autoClientActions
{
  public function preExecute()
  {
    $this->configuration = new clientGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new clientGeneratorHelper();

    parent::preExecute();
  }

  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }


  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm('',array('currentUser' => $this->getUser()));
    $this->sf_guard_user = $this->form->getObject();   
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm('',array('currentUser' => $this->getUser()));
    $this->sf_guard_user = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->sf_guard_user = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->sf_guard_user,array('currentUser' => $this->getUser()));
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->sf_guard_user = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->sf_guard_user,array('currentUser' => $this->getUser()));

    $this->processForm($request, $this->form);
    
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@client');
  }

  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@client');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@client');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('@client');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('sfGuardUser')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@client');
  }
  
  public function executeBatchEnable(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
 
    $q = Doctrine_Query::create()
      ->from('sfGuardUser sfgu')
      ->whereIn('sfgu.id', $ids);
 
    foreach ($q->execute() as $sfGuardUser)
    {
      $sfGuardUser->setIsActive(true);
    }
 
    $this->getUser()->setFlash('notice', 'The selected clients have been enabled successfully.');
 
    $this->redirect('@client');
  }
  
  public function executeBatchDisable(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
 
    $q = Doctrine_Query::create()
      ->from('sfGuardUser sfgu')
      ->whereIn('sfgu.id', $ids);
 
    foreach ($q->execute() as $sfGuardUser)
    {
      $sfGuardUser->setIsActive(false);
    }
 
    $this->getUser()->setFlash('notice', 'The selected clients have been disabled successfully.');
 
    $this->redirect('@client');
  }
  
  public function executeListEnable(sfWebRequest $request)
  {
    $sfGuardUser = $this->getRoute()->getObject();
    $sfGuardUser->setIsActive(true);
 
    $this->getUser()->setFlash('notice', 'The selected client has been enabled successfully.');
 
    $this->redirect('@client');
  }
  
  public function executeListDisable(sfWebRequest $request)
  {
    $sfGuardUser = $this->getRoute()->getObject();
    $sfGuardUser->setIsActive(false);
 
    $this->getUser()->setFlash('notice', 'The selected client has been disabled successfully.');
 
    $this->redirect('@client');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $sf_guard_user = $form->save();
        
        if($form->isNew()){
        	ActivityTable::addActivty($this->getUser()->getGuardUser()->getId(), 1);
        }else {
        	ActivityTable::addActivty($this->getUser()->getGuardUser()->getId(), 3);
        }
         
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $sf_guard_user)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@client_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'client_edit', 'sf_subject' => $sf_guard_user));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }


  protected function getPager()
  {
    $pager = $this->configuration->getPager('sfGuardUser');
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('client.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('client.page', 1, 'admin_module');
  }

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    
    if ($this->getUser()->hasGroup('administrator')){
	    $query = Doctrine_Query::create()
	    		 ->from('sfGuardUser sfgu')
	    		 ->leftJoin('sfgu.UserProfile up')
	    		 ->leftJoin('sfgu.sfGuardUserGroup sfgg')
	    		 ->where('sfgg.group_id = 3');
  	}else{
	    $query = Doctrine_Query::create()
	    		 ->from('sfGuardUser sfgu')
	    		 ->leftJoin('sfgu.UserProfile up')
	    		 ->where('up.parent_user_id = ?', $this->getUser()->getGuardUser()->getId());
  	}
  	
    if ($tableMethod)
    {
      $query = Doctrine_Core::getTable('sfGuardUser')->$tableMethod($query);
    }
	
    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }

  protected function addSortQuery($query)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    if (!in_array(strtolower($sort[1]), array('asc', 'desc')))
    {
      $sort[1] = 'asc';
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('client.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('client.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('client.sort', $sort, 'admin_module');
  }

  protected function isValidSortColumn($column)
  {
    return Doctrine_Core::getTable('sfGuardUser')->hasColumn($column);
  }
}

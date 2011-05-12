<?php

/**
 * network actions.
 *
 * @package    Spark
 * @subpackage network
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class sfGuardUserActions extends autosfGuardUserActions
{
  /*
  protected function getPager()
  {
  	$pager = new sfDoctrinePager(
	    'sfGuardUser',
	    10
	);
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }
  
  
  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    
    $query = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a'),
      ->where('NetworkUser.network_id = ?', $this->getUser()->getNeworkId());
      
    $query = Doctrine_Core::getTable('sfGuardUser')->getBackendUsersForClient($query);

    if ($tableMethod)
    {
      $query = Doctrine_Core::getTable('sfGuardUser')->$tableMethod($query);
    }

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }
  */
}
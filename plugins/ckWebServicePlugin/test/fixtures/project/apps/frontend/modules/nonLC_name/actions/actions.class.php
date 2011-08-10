<?php

/**
 * nonLC_name actions.
 *
 * @package    project
 * @subpackage nonLC_name
 * @author     Christian Kerl <christian-kerl@web.de>
 * @version    SVN: $Id: actions.class.php 29915 2010-06-20 16:00:35Z chrisk $
 */
class nonLC_nameActions extends sfActions
{
  /**
   * @WSMethod(webservice='TestServiceApi')
   *
   * @return string
   */
  public function executeGetResult($request)
  {
    $this->anotherCustomProperty = 'Fail!';

    $this->myCustomResult = 'MyCustomResult';
  }
}

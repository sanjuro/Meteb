<?php

/**
 * BaseQuotehistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $client_id
 * @property integer $financialadvisor_id
 * @property sfGuardUser $Client
 * @property sfGuardUser $Advisor
 * 
 * @method integer      getId()                  Returns the current record's "id" value
 * @method integer      getClientId()            Returns the current record's "client_id" value
 * @method integer      getFinancialadvisorId()  Returns the current record's "financialadvisor_id" value
 * @method sfGuardUser  getClient()              Returns the current record's "Client" value
 * @method sfGuardUser  getAdvisor()             Returns the current record's "Advisor" value
 * @method Quotehistory setId()                  Sets the current record's "id" value
 * @method Quotehistory setClientId()            Sets the current record's "client_id" value
 * @method Quotehistory setFinancialadvisorId()  Sets the current record's "financialadvisor_id" value
 * @method Quotehistory setClient()              Sets the current record's "Client" value
 * @method Quotehistory setAdvisor()             Sets the current record's "Advisor" value
 * 
 * @package    meteb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuotehistory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('quotehistory');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('client_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('financialadvisor_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Client', array(
             'local' => 'client_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser as Advisor', array(
             'local' => 'financialadvisor_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
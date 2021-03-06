<?php

/**
 * BaseActivity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $sfuser_id
 * @property string $title
 * @property integer $activitytype_id
 * @property ActivityType $ActivityType
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer      getId()              Returns the current record's "id" value
 * @method integer      getSfuserId()        Returns the current record's "sfuser_id" value
 * @method string       getTitle()           Returns the current record's "title" value
 * @method integer      getActivitytypeId()  Returns the current record's "activitytype_id" value
 * @method ActivityType getActivityType()    Returns the current record's "ActivityType" value
 * @method sfGuardUser  getSfGuardUser()     Returns the current record's "sfGuardUser" value
 * @method Activity     setId()              Sets the current record's "id" value
 * @method Activity     setSfuserId()        Sets the current record's "sfuser_id" value
 * @method Activity     setTitle()           Sets the current record's "title" value
 * @method Activity     setActivitytypeId()  Sets the current record's "activitytype_id" value
 * @method Activity     setActivityType()    Sets the current record's "ActivityType" value
 * @method Activity     setSfGuardUser()     Sets the current record's "sfGuardUser" value
 * 
 * @package    meteb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseActivity extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('activity');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('sfuser_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('activitytype_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ActivityType', array(
             'local' => 'activitytype_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'sfuser_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
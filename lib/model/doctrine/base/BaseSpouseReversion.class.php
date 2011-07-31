<?php

/**
 * BaseSpouseReversion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property decimal $title
 * @property Doctrine_Collection $Quote
 * 
 * @method integer             getId()    Returns the current record's "id" value
 * @method decimal             getTitle() Returns the current record's "title" value
 * @method Doctrine_Collection getQuote() Returns the current record's "Quote" collection
 * @method SpouseReversion     setId()    Sets the current record's "id" value
 * @method SpouseReversion     setTitle() Sets the current record's "title" value
 * @method SpouseReversion     setQuote() Sets the current record's "Quote" collection
 * 
 * @package    meteb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSpouseReversion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('spouse_reversion');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('title', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 2,
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Quote', array(
             'local' => 'id',
             'foreign' => 'spouse_reversion_id'));
    }
}
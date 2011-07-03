<?php

/**
 * BaseQuote
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $client_id
 * @property integer $created_by
 * @property integer $second_life
 * @property integer $main_sex
 * @property timestamp $main_dob
 * @property integer $spouse_sex
 * @property timestamp $spouse_dob
 * @property integer $gp
 * @property decimal $spouse_reversion
 * @property decimal $pri
 * @property decimal $purchase_price
 * @property decimal $initial_gross_annuity
 * @property decimal $initial_net_annuity
 * @property decimal $commission
 * @property timestamp $commence_at
 * @property timestamp $first_annuity_increase
 * @property integer $guaranteed_terms
 * @property decimal $premium_charge
 * @property decimal $fund_charge
 * @property decimal $administrative_charge
 * @property sfGuardUser $Client
 * @property sfGuardUser $Parent
 * @property Gender $Gender
 * @property Gender $SpouseGender
 * 
 * @method integer     getId()                     Returns the current record's "id" value
 * @method integer     getClientId()               Returns the current record's "client_id" value
 * @method integer     getCreatedBy()              Returns the current record's "created_by" value
 * @method integer     getSecondLife()             Returns the current record's "second_life" value
 * @method integer     getMainSex()                Returns the current record's "main_sex" value
 * @method timestamp   getMainDob()                Returns the current record's "main_dob" value
 * @method integer     getSpouseSex()              Returns the current record's "spouse_sex" value
 * @method timestamp   getSpouseDob()              Returns the current record's "spouse_dob" value
 * @method integer     getGp()                     Returns the current record's "gp" value
 * @method decimal     getSpouseReversion()        Returns the current record's "spouse_reversion" value
 * @method decimal     getPri()                    Returns the current record's "pri" value
 * @method decimal     getPurchasePrice()          Returns the current record's "purchase_price" value
 * @method decimal     getInitialGrossAnnuity()    Returns the current record's "initial_gross_annuity" value
 * @method decimal     getInitialNetAnnuity()      Returns the current record's "initial_net_annuity" value
 * @method decimal     getCommission()             Returns the current record's "commission" value
 * @method timestamp   getCommenceAt()             Returns the current record's "commence_at" value
 * @method timestamp   getFirstAnnuityIncrease()   Returns the current record's "first_annuity_increase" value
 * @method integer     getGuaranteedTerms()        Returns the current record's "guaranteed_terms" value
 * @method decimal     getPremiumCharge()          Returns the current record's "premium_charge" value
 * @method decimal     getFundCharge()             Returns the current record's "fund_charge" value
 * @method decimal     getAdministrativeCharge()   Returns the current record's "administrative_charge" value
 * @method sfGuardUser getClient()                 Returns the current record's "Client" value
 * @method sfGuardUser getParent()                 Returns the current record's "Parent" value
 * @method Gender      getGender()                 Returns the current record's "Gender" value
 * @method Gender      getSpouseGender()           Returns the current record's "SpouseGender" value
 * @method Quote       setId()                     Sets the current record's "id" value
 * @method Quote       setClientId()               Sets the current record's "client_id" value
 * @method Quote       setCreatedBy()              Sets the current record's "created_by" value
 * @method Quote       setSecondLife()             Sets the current record's "second_life" value
 * @method Quote       setMainSex()                Sets the current record's "main_sex" value
 * @method Quote       setMainDob()                Sets the current record's "main_dob" value
 * @method Quote       setSpouseSex()              Sets the current record's "spouse_sex" value
 * @method Quote       setSpouseDob()              Sets the current record's "spouse_dob" value
 * @method Quote       setGp()                     Sets the current record's "gp" value
 * @method Quote       setSpouseReversion()        Sets the current record's "spouse_reversion" value
 * @method Quote       setPri()                    Sets the current record's "pri" value
 * @method Quote       setPurchasePrice()          Sets the current record's "purchase_price" value
 * @method Quote       setInitialGrossAnnuity()    Sets the current record's "initial_gross_annuity" value
 * @method Quote       setInitialNetAnnuity()      Sets the current record's "initial_net_annuity" value
 * @method Quote       setCommission()             Sets the current record's "commission" value
 * @method Quote       setCommenceAt()             Sets the current record's "commence_at" value
 * @method Quote       setFirstAnnuityIncrease()   Sets the current record's "first_annuity_increase" value
 * @method Quote       setGuaranteedTerms()        Sets the current record's "guaranteed_terms" value
 * @method Quote       setPremiumCharge()          Sets the current record's "premium_charge" value
 * @method Quote       setFundCharge()             Sets the current record's "fund_charge" value
 * @method Quote       setAdministrativeCharge()   Sets the current record's "administrative_charge" value
 * @method Quote       setClient()                 Sets the current record's "Client" value
 * @method Quote       setParent()                 Sets the current record's "Parent" value
 * @method Quote       setGender()                 Sets the current record's "Gender" value
 * @method Quote       setSpouseGender()           Sets the current record's "SpouseGender" value
 * 
 * @package    meteb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuote extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('quote');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('client_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('created_by', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('second_life', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('main_sex', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('main_dob', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('spouse_sex', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('spouse_dob', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('gp', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('spouse_reversion', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 5,
             'length' => 10,
             ));
        $this->hasColumn('pri', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 3,
             'length' => 10,
             ));
        $this->hasColumn('purchase_price', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 2,
             'length' => 15,
             ));
        $this->hasColumn('initial_gross_annuity', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 2,
             'length' => 15,
             ));
        $this->hasColumn('initial_net_annuity', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 2,
             'length' => 15,
             ));
        $this->hasColumn('commission', 'decimal', 18, array(
             'type' => 'decimal',
             'scale' => 6,
             'length' => 18,
             ));
        $this->hasColumn('commence_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('first_annuity_increase', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('guaranteed_terms', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('premium_charge', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 5,
             'length' => 15,
             ));
        $this->hasColumn('fund_charge', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 5,
             'length' => 15,
             ));
        $this->hasColumn('administrative_charge', 'decimal', 15, array(
             'type' => 'decimal',
             'scale' => 5,
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Client', array(
             'local' => 'client_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser as Parent', array(
             'local' => 'created_by',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Gender', array(
             'local' => 'main_sex',
             'foreign' => 'id'));

        $this->hasOne('Gender as SpouseGender', array(
             'local' => 'spouse_sex',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
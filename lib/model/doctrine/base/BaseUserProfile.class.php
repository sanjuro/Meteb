<?php

/**
 * BaseUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $sfuser_id
 * @property integer $gender_id
 * @property integer $status_id
 * @property integer $parent_user_id
 * @property string $fsp_license_number
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property date $dob
 * @property string $telephone
 * @property string $mobile
 * @property string $idnumber
 * @property string $fax
 * @property string $postaladdress
 * @property string $streetaddress
 * @property string $spouse_name
 * @property string $spouse_surname
 * @property date $spouse_dob
 * @property integer $spouse_gender_id
 * @property string $spouseidnumber
 * @property string $company
 * @property sfGuardUser $sfGuardUser
 * @property Gender $Gender
 * @property ClientStatus $ClientStatus
 * @property sfGuardUser $ParentUser
 * 
 * @method integer      getId()                 Returns the current record's "id" value
 * @method integer      getSfuserId()           Returns the current record's "sfuser_id" value
 * @method integer      getGenderId()           Returns the current record's "gender_id" value
 * @method integer      getStatusId()           Returns the current record's "status_id" value
 * @method integer      getParentUserId()       Returns the current record's "parent_user_id" value
 * @method string       getFspLicenseNumber()   Returns the current record's "fsp_license_number" value
 * @method string       getTitle()              Returns the current record's "title" value
 * @method string       getName()               Returns the current record's "name" value
 * @method string       getSurname()            Returns the current record's "surname" value
 * @method date         getDob()                Returns the current record's "dob" value
 * @method string       getTelephone()          Returns the current record's "telephone" value
 * @method string       getMobile()             Returns the current record's "mobile" value
 * @method string       getIdnumber()           Returns the current record's "idnumber" value
 * @method string       getFax()                Returns the current record's "fax" value
 * @method string       getPostaladdress()      Returns the current record's "postaladdress" value
 * @method string       getStreetaddress()      Returns the current record's "streetaddress" value
 * @method string       getSpouseName()         Returns the current record's "spouse_name" value
 * @method string       getSpouseSurname()      Returns the current record's "spouse_surname" value
 * @method date         getSpouseDob()          Returns the current record's "spouse_dob" value
 * @method integer      getSpouseGenderId()     Returns the current record's "spouse_gender_id" value
 * @method string       getSpouseidnumber()     Returns the current record's "spouseidnumber" value
 * @method string       getCompany()            Returns the current record's "company" value
 * @method sfGuardUser  getSfGuardUser()        Returns the current record's "sfGuardUser" value
 * @method Gender       getGender()             Returns the current record's "Gender" value
 * @method ClientStatus getClientStatus()       Returns the current record's "ClientStatus" value
 * @method sfGuardUser  getParentUser()         Returns the current record's "ParentUser" value
 * @method UserProfile  setId()                 Sets the current record's "id" value
 * @method UserProfile  setSfuserId()           Sets the current record's "sfuser_id" value
 * @method UserProfile  setGenderId()           Sets the current record's "gender_id" value
 * @method UserProfile  setStatusId()           Sets the current record's "status_id" value
 * @method UserProfile  setParentUserId()       Sets the current record's "parent_user_id" value
 * @method UserProfile  setFspLicenseNumber()   Sets the current record's "fsp_license_number" value
 * @method UserProfile  setTitle()              Sets the current record's "title" value
 * @method UserProfile  setName()               Sets the current record's "name" value
 * @method UserProfile  setSurname()            Sets the current record's "surname" value
 * @method UserProfile  setDob()                Sets the current record's "dob" value
 * @method UserProfile  setTelephone()          Sets the current record's "telephone" value
 * @method UserProfile  setMobile()             Sets the current record's "mobile" value
 * @method UserProfile  setIdnumber()           Sets the current record's "idnumber" value
 * @method UserProfile  setFax()                Sets the current record's "fax" value
 * @method UserProfile  setPostaladdress()      Sets the current record's "postaladdress" value
 * @method UserProfile  setStreetaddress()      Sets the current record's "streetaddress" value
 * @method UserProfile  setSpouseName()         Sets the current record's "spouse_name" value
 * @method UserProfile  setSpouseSurname()      Sets the current record's "spouse_surname" value
 * @method UserProfile  setSpouseDob()          Sets the current record's "spouse_dob" value
 * @method UserProfile  setSpouseGenderId()     Sets the current record's "spouse_gender_id" value
 * @method UserProfile  setSpouseidnumber()     Sets the current record's "spouseidnumber" value
 * @method UserProfile  setCompany()            Sets the current record's "company" value
 * @method UserProfile  setSfGuardUser()        Sets the current record's "sfGuardUser" value
 * @method UserProfile  setGender()             Sets the current record's "Gender" value
 * @method UserProfile  setClientStatus()       Sets the current record's "ClientStatus" value
 * @method UserProfile  setParentUser()         Sets the current record's "ParentUser" value
 * 
 * @package    meteb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_profile');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('sfuser_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('gender_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('status_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('parent_user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('fsp_license_number', 'string', 12, array(
             'type' => 'string',
             'length' => 12,
             ));
        $this->hasColumn('title', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('name', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('surname', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('dob', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('telephone', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('mobile', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('idnumber', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('fax', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('postaladdress', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('streetaddress', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('spouse_name', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('spouse_surname', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('spouse_dob', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('spouse_gender_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('spouseidnumber', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('company', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'sfuser_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Gender', array(
             'local' => 'gender_id',
             'foreign' => 'id'));

        $this->hasOne('ClientStatus', array(
             'local' => 'status_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as ParentUser', array(
             'local' => 'parent_user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $searchable0 = new Doctrine_Template_Searchable(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'surname',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($searchable0);
    }
}
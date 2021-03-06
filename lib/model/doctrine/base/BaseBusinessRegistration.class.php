<?php

/**
 * BaseBusinessRegistration
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $business_name
 * @property string $business_regno
 * @property string $business_sector
 * @property string $office_telephone
 * @property string $fax
 * @property string $post_box
 * @property string $location
 * @property string $sector
 * @property string $district
 * @property string $city_province
 * @property string $token
 * 
 * @method string               getBusinessName()     Returns the current record's "business_name" value
 * @method string               getBusinessRegno()    Returns the current record's "business_regno" value
 * @method string               getBusinessSector()   Returns the current record's "business_sector" value
 * @method string               getOfficeTelephone()  Returns the current record's "office_telephone" value
 * @method string               getFax()              Returns the current record's "fax" value
 * @method string               getPostBox()          Returns the current record's "post_box" value
 * @method string               getLocation()         Returns the current record's "location" value
 * @method string               getSector()           Returns the current record's "sector" value
 * @method string               getDistrict()         Returns the current record's "district" value
 * @method string               getCityProvince()     Returns the current record's "city_province" value
 * @method string               getToken()            Returns the current record's "token" value
 * @method BusinessRegistration setBusinessName()     Sets the current record's "business_name" value
 * @method BusinessRegistration setBusinessRegno()    Sets the current record's "business_regno" value
 * @method BusinessRegistration setBusinessSector()   Sets the current record's "business_sector" value
 * @method BusinessRegistration setOfficeTelephone()  Sets the current record's "office_telephone" value
 * @method BusinessRegistration setFax()              Sets the current record's "fax" value
 * @method BusinessRegistration setPostBox()          Sets the current record's "post_box" value
 * @method BusinessRegistration setLocation()         Sets the current record's "location" value
 * @method BusinessRegistration setSector()           Sets the current record's "sector" value
 * @method BusinessRegistration setDistrict()         Sets the current record's "district" value
 * @method BusinessRegistration setCityProvince()     Sets the current record's "city_province" value
 * @method BusinessRegistration setToken()            Sets the current record's "token" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBusinessRegistration extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('business_registration');
        $this->hasColumn('business_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('business_regno', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('business_sector', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('office_telephone', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('fax', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('post_box', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('location', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('sector', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('district', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('city_province', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('token', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
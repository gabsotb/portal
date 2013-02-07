<?php

/**
 * BaseBusinessRegistration
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $business_name
 * @property string $business_regno
 * 
 * @method string               getBusinessName()   Returns the current record's "business_name" value
 * @method string               getBusinessRegno()  Returns the current record's "business_regno" value
 * @method BusinessRegistration setBusinessName()   Sets the current record's "business_name" value
 * @method BusinessRegistration setBusinessRegno()  Sets the current record's "business_regno" value
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
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
<?php

/**
 * BaseStartupexpenses
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_plan
 * @property integer $year1
 * @property integer $year2
 * @property integer $year3
 * @property integer $year4
 * @property integer $year5
 * @property string $token
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getBusinessPlan()          Returns the current record's "business_plan" value
 * @method integer               getYear1()                 Returns the current record's "year1" value
 * @method integer               getYear2()                 Returns the current record's "year2" value
 * @method integer               getYear3()                 Returns the current record's "year3" value
 * @method integer               getYear4()                 Returns the current record's "year4" value
 * @method integer               getYear5()                 Returns the current record's "year5" value
 * @method string                getToken()                 Returns the current record's "token" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method Startupexpenses       setBusinessPlan()          Sets the current record's "business_plan" value
 * @method Startupexpenses       setYear1()                 Sets the current record's "year1" value
 * @method Startupexpenses       setYear2()                 Sets the current record's "year2" value
 * @method Startupexpenses       setYear3()                 Sets the current record's "year3" value
 * @method Startupexpenses       setYear4()                 Sets the current record's "year4" value
 * @method Startupexpenses       setYear5()                 Sets the current record's "year5" value
 * @method Startupexpenses       setToken()                 Sets the current record's "token" value
 * @method Startupexpenses       setInvestmentApplication() Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStartupexpenses extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('startupexpenses');
        $this->hasColumn('business_plan', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('year1', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('year2', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('year3', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('year4', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('year5', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
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
        $this->hasOne('InvestmentApplication', array(
             'local' => 'business_plan',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable(array(
             'created' => 
             array(
              'name' => 'created_by',
              'type' => 'string',
              'onUpdate' => 'CASCADE',
              'onDelete' => 'SET NULL',
              'options' => 
              array(
              'notnull' => true,
              'default' => 'None',
              ),
             ),
             'updated' => 
             array(
              'name' => 'updated_by',
              'type' => 'string',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}
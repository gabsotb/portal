<?php

/**
 * BaseStructurefinancial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_plan
 * @property integer $local_source
 * @property integer $foreign_source
 * @property string $token
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getBusinessPlan()          Returns the current record's "business_plan" value
 * @method integer               getLocalSource()           Returns the current record's "local_source" value
 * @method integer               getForeignSource()         Returns the current record's "foreign_source" value
 * @method string                getToken()                 Returns the current record's "token" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method Structurefinancial    setBusinessPlan()          Sets the current record's "business_plan" value
 * @method Structurefinancial    setLocalSource()           Sets the current record's "local_source" value
 * @method Structurefinancial    setForeignSource()         Sets the current record's "foreign_source" value
 * @method Structurefinancial    setToken()                 Sets the current record's "token" value
 * @method Structurefinancial    setInvestmentApplication() Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStructurefinancial extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('structurefinancial');
        $this->hasColumn('business_plan', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('local_source', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('foreign_source', 'integer', null, array(
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
             'foreign' => 'id'));

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
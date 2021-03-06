<?php

/**
 * Basefinacialstructure
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_plan
 * @property integer $local
 * @property integer $foreign
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getBusinessPlan()          Returns the current record's "business_plan" value
 * @method integer               getLocal()                 Returns the current record's "local" value
 * @method integer               getForeign()               Returns the current record's "foreign" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method finacialstructure     setBusinessPlan()          Sets the current record's "business_plan" value
 * @method finacialstructure     setLocal()                 Sets the current record's "local" value
 * @method finacialstructure     setForeign()               Sets the current record's "foreign" value
 * @method finacialstructure     setInvestmentApplication() Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basefinacialstructure extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('finacialstructure');
        $this->hasColumn('business_plan', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('local', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('foreign', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
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
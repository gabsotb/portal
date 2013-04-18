<?php

/**
 * BaseProjectSummary
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $investment_id
 * @property string $business_sector
 * @property string $business_sector_description
 * @property string $techinical_viability
 * @property integer $planned_investment
 * @property integer $employment_created
 * @property string $job_categories
 * @property string $token
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getInvestmentId()                Returns the current record's "investment_id" value
 * @method string                getBusinessSector()              Returns the current record's "business_sector" value
 * @method string                getBusinessSectorDescription()   Returns the current record's "business_sector_description" value
 * @method string                getTechinicalViability()         Returns the current record's "techinical_viability" value
 * @method integer               getPlannedInvestment()           Returns the current record's "planned_investment" value
 * @method integer               getEmploymentCreated()           Returns the current record's "employment_created" value
 * @method string                getJobCategories()               Returns the current record's "job_categories" value
 * @method string                getToken()                       Returns the current record's "token" value
 * @method InvestmentApplication getInvestmentApplication()       Returns the current record's "InvestmentApplication" value
 * @method ProjectSummary        setInvestmentId()                Sets the current record's "investment_id" value
 * @method ProjectSummary        setBusinessSector()              Sets the current record's "business_sector" value
 * @method ProjectSummary        setBusinessSectorDescription()   Sets the current record's "business_sector_description" value
 * @method ProjectSummary        setTechinicalViability()         Sets the current record's "techinical_viability" value
 * @method ProjectSummary        setPlannedInvestment()           Sets the current record's "planned_investment" value
 * @method ProjectSummary        setEmploymentCreated()           Sets the current record's "employment_created" value
 * @method ProjectSummary        setJobCategories()               Sets the current record's "job_categories" value
 * @method ProjectSummary        setToken()                       Sets the current record's "token" value
 * @method ProjectSummary        setInvestmentApplication()       Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProjectSummary extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('project_summary');
        $this->hasColumn('investment_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('business_sector', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('business_sector_description', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
        $this->hasColumn('techinical_viability', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('planned_investment', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('employment_created', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('job_categories', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
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
             'local' => 'investment_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable(array(
             'created:{ name' => 'created_by,type: string,onUpdate: CASCADE,onDelete: SET NULL,options: {notnull: true,default: None}}',
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
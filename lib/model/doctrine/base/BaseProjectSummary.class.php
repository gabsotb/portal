<?php

/**
 * BaseProjectSummary
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $investment_id
 * @property string $business_sector
 * @property string $techinical_viability
 * @property string $planned_investment
 * @property string $employment_created
 * @property string $job_categories
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getInvestmentId()          Returns the current record's "investment_id" value
 * @method string                getBusinessSector()        Returns the current record's "business_sector" value
 * @method string                getTechinicalViability()   Returns the current record's "techinical_viability" value
 * @method string                getPlannedInvestment()     Returns the current record's "planned_investment" value
 * @method string                getEmploymentCreated()     Returns the current record's "employment_created" value
 * @method string                getJobCategories()         Returns the current record's "job_categories" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method ProjectSummary        setInvestmentId()          Sets the current record's "investment_id" value
 * @method ProjectSummary        setBusinessSector()        Sets the current record's "business_sector" value
 * @method ProjectSummary        setTechinicalViability()   Sets the current record's "techinical_viability" value
 * @method ProjectSummary        setPlannedInvestment()     Sets the current record's "planned_investment" value
 * @method ProjectSummary        setEmploymentCreated()     Sets the current record's "employment_created" value
 * @method ProjectSummary        setJobCategories()         Sets the current record's "job_categories" value
 * @method ProjectSummary        setInvestmentApplication() Sets the current record's "InvestmentApplication" value
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
             ));
        $this->hasColumn('business_sector', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('techinical_viability', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('planned_investment', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('employment_created', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('job_categories', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('InvestmentApplication', array(
             'local' => 'investment_id',
             'foreign' => 'id'));

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
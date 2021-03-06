<?php

/**
 * BaseBusinessPlan
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $investment_id
 * @property string $project_brief
 * @property string $exemption_on_machinery
 * @property string $exemption_raw_materials
 * @property string $land_ownership_document
 * @property string $bill_of_quantiy
 * @property string $drawings
 * @property string $construction_permits
 * @property string $investment_allowances
 * @property string $additional_incentives
 * @property string $visa_work_permits
 * @property string $token
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getInvestmentId()            Returns the current record's "investment_id" value
 * @method string                getProjectBrief()            Returns the current record's "project_brief" value
 * @method string                getExemptionOnMachinery()    Returns the current record's "exemption_on_machinery" value
 * @method string                getExemptionRawMaterials()   Returns the current record's "exemption_raw_materials" value
 * @method string                getLandOwnershipDocument()   Returns the current record's "land_ownership_document" value
 * @method string                getBillOfQuantiy()           Returns the current record's "bill_of_quantiy" value
 * @method string                getDrawings()                Returns the current record's "drawings" value
 * @method string                getConstructionPermits()     Returns the current record's "construction_permits" value
 * @method string                getInvestmentAllowances()    Returns the current record's "investment_allowances" value
 * @method string                getAdditionalIncentives()    Returns the current record's "additional_incentives" value
 * @method string                getVisaWorkPermits()         Returns the current record's "visa_work_permits" value
 * @method string                getToken()                   Returns the current record's "token" value
 * @method InvestmentApplication getInvestmentApplication()   Returns the current record's "InvestmentApplication" value
 * @method BusinessPlan          setInvestmentId()            Sets the current record's "investment_id" value
 * @method BusinessPlan          setProjectBrief()            Sets the current record's "project_brief" value
 * @method BusinessPlan          setExemptionOnMachinery()    Sets the current record's "exemption_on_machinery" value
 * @method BusinessPlan          setExemptionRawMaterials()   Sets the current record's "exemption_raw_materials" value
 * @method BusinessPlan          setLandOwnershipDocument()   Sets the current record's "land_ownership_document" value
 * @method BusinessPlan          setBillOfQuantiy()           Sets the current record's "bill_of_quantiy" value
 * @method BusinessPlan          setDrawings()                Sets the current record's "drawings" value
 * @method BusinessPlan          setConstructionPermits()     Sets the current record's "construction_permits" value
 * @method BusinessPlan          setInvestmentAllowances()    Sets the current record's "investment_allowances" value
 * @method BusinessPlan          setAdditionalIncentives()    Sets the current record's "additional_incentives" value
 * @method BusinessPlan          setVisaWorkPermits()         Sets the current record's "visa_work_permits" value
 * @method BusinessPlan          setToken()                   Sets the current record's "token" value
 * @method BusinessPlan          setInvestmentApplication()   Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBusinessPlan extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('business_plan');
        $this->hasColumn('investment_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('project_brief', 'string', 20000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20000,
             ));
        $this->hasColumn('exemption_on_machinery', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('exemption_raw_materials', 'string', 4000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 4000,
             ));
        $this->hasColumn('land_ownership_document', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('bill_of_quantiy', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('drawings', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('construction_permits', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('investment_allowances', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('additional_incentives', 'string', 4000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 4000,
             ));
        $this->hasColumn('visa_work_permits', 'string', 4000, array(
             'type' => 'string',
             'notnull' => false,
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
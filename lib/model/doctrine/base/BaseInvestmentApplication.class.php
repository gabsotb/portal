<?php

/**
 * BaseInvestmentApplication
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $registration_number
 * @property string $company_address
 * @property integer $job_created
 * @property string $job_category
 * @property string $company_legal_nature
 * @property string $company_representative
 * @property string $application_letter
 * @property string $incorporation_certificate
 * @property string $shareholding_list
 * @property string $company_logo
 * @property Doctrine_Collection $InvestmentBusinessPlan
 * @property Doctrine_Collection $InvestmentSummary
 * @property Doctrine_Collection $ApplicationAssigment
 * @property Doctrine_Collection $InvestmentAppBusinesStatus
 * @property Doctrine_Collection $InvestmentApprovedBusiness
 * @property Doctrine_Collection $InvestmentRejectedBusiness
 * @property Doctrine_Collection $InvestmentCertificate
 * 
 * @method string                getName()                       Returns the current record's "name" value
 * @method string                getRegistrationNumber()         Returns the current record's "registration_number" value
 * @method string                getCompanyAddress()             Returns the current record's "company_address" value
 * @method integer               getJobCreated()                 Returns the current record's "job_created" value
 * @method string                getJobCategory()                Returns the current record's "job_category" value
 * @method string                getCompanyLegalNature()         Returns the current record's "company_legal_nature" value
 * @method string                getCompanyRepresentative()      Returns the current record's "company_representative" value
 * @method string                getApplicationLetter()          Returns the current record's "application_letter" value
 * @method string                getIncorporationCertificate()   Returns the current record's "incorporation_certificate" value
 * @method string                getShareholdingList()           Returns the current record's "shareholding_list" value
 * @method string                getCompanyLogo()                Returns the current record's "company_logo" value
 * @method Doctrine_Collection   getInvestmentBusinessPlan()     Returns the current record's "InvestmentBusinessPlan" collection
 * @method Doctrine_Collection   getInvestmentSummary()          Returns the current record's "InvestmentSummary" collection
 * @method Doctrine_Collection   getApplicationAssigment()       Returns the current record's "ApplicationAssigment" collection
 * @method Doctrine_Collection   getInvestmentAppBusinesStatus() Returns the current record's "InvestmentAppBusinesStatus" collection
 * @method Doctrine_Collection   getInvestmentApprovedBusiness() Returns the current record's "InvestmentApprovedBusiness" collection
 * @method Doctrine_Collection   getInvestmentRejectedBusiness() Returns the current record's "InvestmentRejectedBusiness" collection
 * @method Doctrine_Collection   getInvestmentCertificate()      Returns the current record's "InvestmentCertificate" collection
 * @method InvestmentApplication setName()                       Sets the current record's "name" value
 * @method InvestmentApplication setRegistrationNumber()         Sets the current record's "registration_number" value
 * @method InvestmentApplication setCompanyAddress()             Sets the current record's "company_address" value
 * @method InvestmentApplication setJobCreated()                 Sets the current record's "job_created" value
 * @method InvestmentApplication setJobCategory()                Sets the current record's "job_category" value
 * @method InvestmentApplication setCompanyLegalNature()         Sets the current record's "company_legal_nature" value
 * @method InvestmentApplication setCompanyRepresentative()      Sets the current record's "company_representative" value
 * @method InvestmentApplication setApplicationLetter()          Sets the current record's "application_letter" value
 * @method InvestmentApplication setIncorporationCertificate()   Sets the current record's "incorporation_certificate" value
 * @method InvestmentApplication setShareholdingList()           Sets the current record's "shareholding_list" value
 * @method InvestmentApplication setCompanyLogo()                Sets the current record's "company_logo" value
 * @method InvestmentApplication setInvestmentBusinessPlan()     Sets the current record's "InvestmentBusinessPlan" collection
 * @method InvestmentApplication setInvestmentSummary()          Sets the current record's "InvestmentSummary" collection
 * @method InvestmentApplication setApplicationAssigment()       Sets the current record's "ApplicationAssigment" collection
 * @method InvestmentApplication setInvestmentAppBusinesStatus() Sets the current record's "InvestmentAppBusinesStatus" collection
 * @method InvestmentApplication setInvestmentApprovedBusiness() Sets the current record's "InvestmentApprovedBusiness" collection
 * @method InvestmentApplication setInvestmentRejectedBusiness() Sets the current record's "InvestmentRejectedBusiness" collection
 * @method InvestmentApplication setInvestmentCertificate()      Sets the current record's "InvestmentCertificate" collection
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseInvestmentApplication extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('investment_application');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('registration_number', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('company_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('job_created', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('job_category', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('company_legal_nature', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('company_representative', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('application_letter', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('incorporation_certificate', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('shareholding_list', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('company_logo', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BusinessPlan as InvestmentBusinessPlan', array(
             'local' => 'id',
             'foreign' => 'investment_id'));

        $this->hasMany('ProjectSummary as InvestmentSummary', array(
             'local' => 'id',
             'foreign' => 'investment_id'));

        $this->hasMany('TaskAssignment as ApplicationAssigment', array(
             'local' => 'id',
             'foreign' => 'investmentapp_id'));

        $this->hasMany('BusinessApplicationStatus as InvestmentAppBusinesStatus', array(
             'local' => 'id',
             'foreign' => 'business_id'));

        $this->hasMany('ApprovedApplications as InvestmentApprovedBusiness', array(
             'local' => 'id',
             'foreign' => 'business_id'));

        $this->hasMany('RejectedApplications as InvestmentRejectedBusiness', array(
             'local' => 'id',
             'foreign' => 'business_id'));

        $this->hasMany('Payment as InvestmentCertificate', array(
             'local' => 'id',
             'foreign' => 'business_id'));

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
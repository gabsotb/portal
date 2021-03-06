<?php

/**
 * BaseTaxExemptionDetails
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $office_name
 * @property string $office_code
 * @property string $company_name
 * @property string $investment_certificate
 * @property integer $company_tin
 * @property string $declarant_name
 * @property string $declarant_reference
 * @property string $declarant_code
 * @property string $electronic_request_number
 * @property string $electronic_authrization_number
 * @property string $customs_declaration_reference
 * @property string $revenue_officer
 * @property timestamp $revenue_officer_e_verification_date
 * @property string $revenue_officer_remarks
 * @property string $rdb_officer_remarks
 * @property string $status
 * @property Doctrine_Collection $TaxDetailsItems
 * 
 * @method string              getOfficeName()                          Returns the current record's "office_name" value
 * @method string              getOfficeCode()                          Returns the current record's "office_code" value
 * @method string              getCompanyName()                         Returns the current record's "company_name" value
 * @method string              getInvestmentCertificate()               Returns the current record's "investment_certificate" value
 * @method integer             getCompanyTin()                          Returns the current record's "company_tin" value
 * @method string              getDeclarantName()                       Returns the current record's "declarant_name" value
 * @method string              getDeclarantReference()                  Returns the current record's "declarant_reference" value
 * @method string              getDeclarantCode()                       Returns the current record's "declarant_code" value
 * @method string              getElectronicRequestNumber()             Returns the current record's "electronic_request_number" value
 * @method string              getElectronicAuthrizationNumber()        Returns the current record's "electronic_authrization_number" value
 * @method string              getCustomsDeclarationReference()         Returns the current record's "customs_declaration_reference" value
 * @method string              getRevenueOfficer()                      Returns the current record's "revenue_officer" value
 * @method timestamp           getRevenueOfficerEVerificationDate()     Returns the current record's "revenue_officer_e_verification_date" value
 * @method string              getRevenueOfficerRemarks()               Returns the current record's "revenue_officer_remarks" value
 * @method string              getRdbOfficerRemarks()                   Returns the current record's "rdb_officer_remarks" value
 * @method string              getStatus()                              Returns the current record's "status" value
 * @method Doctrine_Collection getTaxDetailsItems()                     Returns the current record's "TaxDetailsItems" collection
 * @method TaxExemptionDetails setOfficeName()                          Sets the current record's "office_name" value
 * @method TaxExemptionDetails setOfficeCode()                          Sets the current record's "office_code" value
 * @method TaxExemptionDetails setCompanyName()                         Sets the current record's "company_name" value
 * @method TaxExemptionDetails setInvestmentCertificate()               Sets the current record's "investment_certificate" value
 * @method TaxExemptionDetails setCompanyTin()                          Sets the current record's "company_tin" value
 * @method TaxExemptionDetails setDeclarantName()                       Sets the current record's "declarant_name" value
 * @method TaxExemptionDetails setDeclarantReference()                  Sets the current record's "declarant_reference" value
 * @method TaxExemptionDetails setDeclarantCode()                       Sets the current record's "declarant_code" value
 * @method TaxExemptionDetails setElectronicRequestNumber()             Sets the current record's "electronic_request_number" value
 * @method TaxExemptionDetails setElectronicAuthrizationNumber()        Sets the current record's "electronic_authrization_number" value
 * @method TaxExemptionDetails setCustomsDeclarationReference()         Sets the current record's "customs_declaration_reference" value
 * @method TaxExemptionDetails setRevenueOfficer()                      Sets the current record's "revenue_officer" value
 * @method TaxExemptionDetails setRevenueOfficerEVerificationDate()     Sets the current record's "revenue_officer_e_verification_date" value
 * @method TaxExemptionDetails setRevenueOfficerRemarks()               Sets the current record's "revenue_officer_remarks" value
 * @method TaxExemptionDetails setRdbOfficerRemarks()                   Sets the current record's "rdb_officer_remarks" value
 * @method TaxExemptionDetails setStatus()                              Sets the current record's "status" value
 * @method TaxExemptionDetails setTaxDetailsItems()                     Sets the current record's "TaxDetailsItems" collection
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTaxExemptionDetails extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tax_exemption_details');
        $this->hasColumn('office_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('office_code', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('company_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('investment_certificate', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('company_tin', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('declarant_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('declarant_reference', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('declarant_code', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('electronic_request_number', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('electronic_authrization_number', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('customs_declaration_reference', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('revenue_officer', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('revenue_officer_e_verification_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => false,
             ));
        $this->hasColumn('revenue_officer_remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
             ));
        $this->hasColumn('rdb_officer_remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
             ));
        $this->hasColumn('status', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('TaxExemptionItems as TaxDetailsItems', array(
             'local' => 'id',
             'foreign' => 'tax_details_id'));

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
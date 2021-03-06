<?php

/**
 * BasePayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_id
 * @property string $payment_status
 * @property string $slip_number
 * @property string $token
 * 
 * @method integer getBusinessId()     Returns the current record's "business_id" value
 * @method string  getPaymentStatus()  Returns the current record's "payment_status" value
 * @method string  getSlipNumber()     Returns the current record's "slip_number" value
 * @method string  getToken()          Returns the current record's "token" value
 * @method Payment setBusinessId()     Sets the current record's "business_id" value
 * @method Payment setPaymentStatus()  Sets the current record's "payment_status" value
 * @method Payment setSlipNumber()     Sets the current record's "slip_number" value
 * @method Payment setToken()          Sets the current record's "token" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePayment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('payment');
        $this->hasColumn('business_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('payment_status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'notpaid',
             'length' => 255,
             ));
        $this->hasColumn('slip_number', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
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
<?php

/**
 * BaseEIApplicationStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $company_id
 * @property string $application_status
 * @property string $comments
 * @property EIApplication $EIApplication
 * 
 * @method integer             getCompanyId()          Returns the current record's "company_id" value
 * @method string              getApplicationStatus()  Returns the current record's "application_status" value
 * @method string              getComments()           Returns the current record's "comments" value
 * @method EIApplication       getEIApplication()      Returns the current record's "EIApplication" value
 * @method EIApplicationStatus setCompanyId()          Sets the current record's "company_id" value
 * @method EIApplicationStatus setApplicationStatus()  Sets the current record's "application_status" value
 * @method EIApplicationStatus setComments()           Sets the current record's "comments" value
 * @method EIApplicationStatus setEIApplication()      Sets the current record's "EIApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIApplicationStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_application_status');
        $this->hasColumn('company_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('application_status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('comments', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIApplication', array(
             'local' => 'company_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
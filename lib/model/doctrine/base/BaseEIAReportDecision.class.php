<?php

/**
 * BaseEIAReportDecision
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $report_id
 * @property integer $decision
 * @property string $comment
 * @property EIAReports $EIAReports
 * 
 * @method integer           getReportId()   Returns the current record's "report_id" value
 * @method integer           getDecision()   Returns the current record's "decision" value
 * @method string            getComment()    Returns the current record's "comment" value
 * @method EIAReports        getEIAReports() Returns the current record's "EIAReports" value
 * @method EIAReportDecision setReportId()   Sets the current record's "report_id" value
 * @method EIAReportDecision setDecision()   Sets the current record's "decision" value
 * @method EIAReportDecision setComment()    Sets the current record's "comment" value
 * @method EIAReportDecision setEIAReports() Sets the current record's "EIAReports" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIAReportDecision extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_report_decision');
        $this->hasColumn('report_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('decision', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('comment', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIAReports', array(
             'local' => 'report_id',
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
<?php

/**
 * BaseEIAAssessmentDecision
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $taskassignment_id
 * @property string $eia_stage
 * @property string $verdict
 * @property string $remarks
 * @property string $token
 * @property EITaskAssignment $EITaskAssignment
 * 
 * @method integer               getTaskassignmentId()  Returns the current record's "taskassignment_id" value
 * @method string                getEiaStage()          Returns the current record's "eia_stage" value
 * @method string                getVerdict()           Returns the current record's "verdict" value
 * @method string                getRemarks()           Returns the current record's "remarks" value
 * @method string                getToken()             Returns the current record's "token" value
 * @method EITaskAssignment      getEITaskAssignment()  Returns the current record's "EITaskAssignment" value
 * @method EIAAssessmentDecision setTaskassignmentId()  Sets the current record's "taskassignment_id" value
 * @method EIAAssessmentDecision setEiaStage()          Sets the current record's "eia_stage" value
 * @method EIAAssessmentDecision setVerdict()           Sets the current record's "verdict" value
 * @method EIAAssessmentDecision setRemarks()           Sets the current record's "remarks" value
 * @method EIAAssessmentDecision setToken()             Sets the current record's "token" value
 * @method EIAAssessmentDecision setEITaskAssignment()  Sets the current record's "EITaskAssignment" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIAAssessmentDecision extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_assessment_decision');
        $this->hasColumn('taskassignment_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('eia_stage', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('verdict', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
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
        $this->hasOne('EITaskAssignment', array(
             'local' => 'taskAssignment_id',
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
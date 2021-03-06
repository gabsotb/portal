<?php

/**
 * BaseTor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property string $issues_assessed
 * @property string $specific_tasks
 * @property string $stake_holders
 * @property string $experts
 * @property string $token
 * @property EIAProjectDetail $EIAProjectDetail
 * 
 * @method integer          getEiaprojectId()     Returns the current record's "eiaproject_id" value
 * @method string           getIssuesAssessed()   Returns the current record's "issues_assessed" value
 * @method string           getSpecificTasks()    Returns the current record's "specific_tasks" value
 * @method string           getStakeHolders()     Returns the current record's "stake_holders" value
 * @method string           getExperts()          Returns the current record's "experts" value
 * @method string           getToken()            Returns the current record's "token" value
 * @method EIAProjectDetail getEIAProjectDetail() Returns the current record's "EIAProjectDetail" value
 * @method Tor              setEiaprojectId()     Sets the current record's "eiaproject_id" value
 * @method Tor              setIssuesAssessed()   Sets the current record's "issues_assessed" value
 * @method Tor              setSpecificTasks()    Sets the current record's "specific_tasks" value
 * @method Tor              setStakeHolders()     Sets the current record's "stake_holders" value
 * @method Tor              setExperts()          Sets the current record's "experts" value
 * @method Tor              setToken()            Sets the current record's "token" value
 * @method Tor              setEIAProjectDetail() Sets the current record's "EIAProjectDetail" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tor');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('issues_assessed', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('specific_tasks', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('stake_holders', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('experts', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
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
        $this->hasOne('EIAProjectDetail', array(
             'local' => 'eiaproject_id',
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
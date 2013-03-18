<?php

/**
 * BaseEIATorStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property integer $sent_by
 * @property string $comments
 * @property string $token
 * @property EIAProjectDetail $EIAProjectDetail
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer          getEiaprojectId()     Returns the current record's "eiaproject_id" value
 * @method integer          getSentBy()           Returns the current record's "sent_by" value
 * @method string           getComments()         Returns the current record's "comments" value
 * @method string           getToken()            Returns the current record's "token" value
 * @method EIAProjectDetail getEIAProjectDetail() Returns the current record's "EIAProjectDetail" value
 * @method sfGuardUser      getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method EIATorStatus     setEiaprojectId()     Sets the current record's "eiaproject_id" value
 * @method EIATorStatus     setSentBy()           Sets the current record's "sent_by" value
 * @method EIATorStatus     setComments()         Sets the current record's "comments" value
 * @method EIATorStatus     setToken()            Sets the current record's "token" value
 * @method EIATorStatus     setEIAProjectDetail() Sets the current record's "EIAProjectDetail" value
 * @method EIATorStatus     setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIATorStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_tor_status');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('sent_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('comments', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
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
        $this->hasOne('EIAProjectDetail', array(
             'local' => 'eiaproject_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'sent_by',
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
<?php

/**
 * BaseMessageLogs
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $message_sender
 * @property string $message_recipient
 * @property string $message
 * @property string $status
 * 
 * @method string      getMessageSender()     Returns the current record's "message_sender" value
 * @method string      getMessageRecipient()  Returns the current record's "message_recipient" value
 * @method string      getMessage()           Returns the current record's "message" value
 * @method string      getStatus()            Returns the current record's "status" value
 * @method MessageLogs setMessageSender()     Sets the current record's "message_sender" value
 * @method MessageLogs setMessageRecipient()  Sets the current record's "message_recipient" value
 * @method MessageLogs setMessage()           Sets the current record's "message" value
 * @method MessageLogs setStatus()            Sets the current record's "status" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMessageLogs extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('message_logs');
        $this->hasColumn('message_sender', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('message_recipient', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('message', 'string', 50000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50000,
             ));
        $this->hasColumn('status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
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
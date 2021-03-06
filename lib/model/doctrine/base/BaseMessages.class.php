<?php

/**
 * BaseMessages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $sender
 * @property string $recepient
 * @property string $sender_email
 * @property string $recepient_email
 * @property string $cc_email
 * @property string $message_subject
 * @property string $message
 * @property string $attachement
 * @property string $token
 * 
 * @method string   getSender()          Returns the current record's "sender" value
 * @method string   getRecepient()       Returns the current record's "recepient" value
 * @method string   getSenderEmail()     Returns the current record's "sender_email" value
 * @method string   getRecepientEmail()  Returns the current record's "recepient_email" value
 * @method string   getCcEmail()         Returns the current record's "cc_email" value
 * @method string   getMessageSubject()  Returns the current record's "message_subject" value
 * @method string   getMessage()         Returns the current record's "message" value
 * @method string   getAttachement()     Returns the current record's "attachement" value
 * @method string   getToken()           Returns the current record's "token" value
 * @method Messages setSender()          Sets the current record's "sender" value
 * @method Messages setRecepient()       Sets the current record's "recepient" value
 * @method Messages setSenderEmail()     Sets the current record's "sender_email" value
 * @method Messages setRecepientEmail()  Sets the current record's "recepient_email" value
 * @method Messages setCcEmail()         Sets the current record's "cc_email" value
 * @method Messages setMessageSubject()  Sets the current record's "message_subject" value
 * @method Messages setMessage()         Sets the current record's "message" value
 * @method Messages setAttachement()     Sets the current record's "attachement" value
 * @method Messages setToken()           Sets the current record's "token" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMessages extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('messages');
        $this->hasColumn('sender', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('recepient', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('sender_email', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('recepient_email', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('cc_email', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('message_subject', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('message', 'string', 20000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20000,
             ));
        $this->hasColumn('attachement', 'string', 255, array(
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
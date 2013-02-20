<?php

/**
 * BaseMessages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $sender
 * @property string $recepient
 * @property string $message
 * @property string $attachement
 * 
 * @method string   getSender()      Returns the current record's "sender" value
 * @method string   getRecepient()   Returns the current record's "recepient" value
 * @method string   getMessage()     Returns the current record's "message" value
 * @method string   getAttachement() Returns the current record's "attachement" value
 * @method Messages setSender()      Sets the current record's "sender" value
 * @method Messages setRecepient()   Sets the current record's "recepient" value
 * @method Messages setMessage()     Sets the current record's "message" value
 * @method Messages setAttachement() Sets the current record's "attachement" value
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
        $this->hasColumn('message', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('attachement', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
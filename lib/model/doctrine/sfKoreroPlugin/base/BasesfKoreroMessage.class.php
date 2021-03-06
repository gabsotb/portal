<?php

/**
 * BasesfKoreroMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $channel_id
 * @property integer $user_id
 * @property string $message
 * @property sfKoreroChannel $sfKoreroChannel
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer         getId()              Returns the current record's "id" value
 * @method integer         getChannelId()       Returns the current record's "channel_id" value
 * @method integer         getUserId()          Returns the current record's "user_id" value
 * @method string          getMessage()         Returns the current record's "message" value
 * @method sfKoreroChannel getSfKoreroChannel() Returns the current record's "sfKoreroChannel" value
 * @method sfGuardUser     getSfGuardUser()     Returns the current record's "sfGuardUser" value
 * @method sfKoreroMessage setId()              Sets the current record's "id" value
 * @method sfKoreroMessage setChannelId()       Sets the current record's "channel_id" value
 * @method sfKoreroMessage setUserId()          Sets the current record's "user_id" value
 * @method sfKoreroMessage setMessage()         Sets the current record's "message" value
 * @method sfKoreroMessage setSfKoreroChannel() Sets the current record's "sfKoreroChannel" value
 * @method sfKoreroMessage setSfGuardUser()     Sets the current record's "sfGuardUser" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfKoreroMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_korero_message');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('channel_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('message', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfKoreroChannel', array(
             'local' => 'channel_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}
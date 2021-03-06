<?php

/**
 * BaseSession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $id
 * @property string $sessiondata
 * @property integer $time
 * @property string $token
 * 
 * @method string  getId()          Returns the current record's "id" value
 * @method string  getSessiondata() Returns the current record's "sessiondata" value
 * @method integer getTime()        Returns the current record's "time" value
 * @method string  getToken()       Returns the current record's "token" value
 * @method Session setId()          Sets the current record's "id" value
 * @method Session setSessiondata() Sets the current record's "sessiondata" value
 * @method Session setTime()        Sets the current record's "time" value
 * @method Session setToken()       Sets the current record's "token" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSession extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('session');
        $this->hasColumn('id', 'string', 32, array(
             'type' => 'string',
             'primary' => true,
             'length' => 32,
             ));
        $this->hasColumn('sessiondata', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('time', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
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
        
    }
}
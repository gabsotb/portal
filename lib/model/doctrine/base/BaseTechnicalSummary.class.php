<?php

/**
 * BaseTechnicalSummary
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $tor_id
 * @property string $report
 * @property string $comment
 * @property Tor $Tor
 * 
 * @method integer          getTorId()   Returns the current record's "tor_id" value
 * @method string           getReport()  Returns the current record's "report" value
 * @method string           getComment() Returns the current record's "comment" value
 * @method Tor              getTor()     Returns the current record's "Tor" value
 * @method TechnicalSummary setTorId()   Sets the current record's "tor_id" value
 * @method TechnicalSummary setReport()  Sets the current record's "report" value
 * @method TechnicalSummary setComment() Sets the current record's "comment" value
 * @method TechnicalSummary setTor()     Sets the current record's "Tor" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTechnicalSummary extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('technical_summary');
        $this->hasColumn('tor_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('report', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
        $this->hasColumn('comment', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Tor', array(
             'local' => 'tor_id',
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
<?php

/**
 * BaseEIAProjectSurroundingSpecies
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $project_surrounding_id
 * @property string $birds_animals
 * @property string $trees_vegetation
 * @property string $fisheries
 * @property string $token
 * @property string $resubmit
 * @property EIAProjectSurrounding $EIAProjectSurrounding
 * 
 * @method integer                      getProjectSurroundingId()   Returns the current record's "project_surrounding_id" value
 * @method string                       getBirdsAnimals()           Returns the current record's "birds_animals" value
 * @method string                       getTreesVegetation()        Returns the current record's "trees_vegetation" value
 * @method string                       getFisheries()              Returns the current record's "fisheries" value
 * @method string                       getToken()                  Returns the current record's "token" value
 * @method string                       getResubmit()               Returns the current record's "resubmit" value
 * @method EIAProjectSurrounding        getEIAProjectSurrounding()  Returns the current record's "EIAProjectSurrounding" value
 * @method EIAProjectSurroundingSpecies setProjectSurroundingId()   Sets the current record's "project_surrounding_id" value
 * @method EIAProjectSurroundingSpecies setBirdsAnimals()           Sets the current record's "birds_animals" value
 * @method EIAProjectSurroundingSpecies setTreesVegetation()        Sets the current record's "trees_vegetation" value
 * @method EIAProjectSurroundingSpecies setFisheries()              Sets the current record's "fisheries" value
 * @method EIAProjectSurroundingSpecies setToken()                  Sets the current record's "token" value
 * @method EIAProjectSurroundingSpecies setResubmit()               Sets the current record's "resubmit" value
 * @method EIAProjectSurroundingSpecies setEIAProjectSurrounding()  Sets the current record's "EIAProjectSurrounding" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIAProjectSurroundingSpecies extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_project_surrounding_species');
        $this->hasColumn('project_surrounding_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('birds_animals', 'string', 5000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 5000,
             ));
        $this->hasColumn('trees_vegetation', 'string', 5000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 5000,
             ));
        $this->hasColumn('fisheries', 'string', 5000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 5000,
             ));
        $this->hasColumn('token', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('resubmit', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIAProjectSurrounding', array(
             'local' => 'project_surrounding_id',
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
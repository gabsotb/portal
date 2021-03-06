<?php

/**
 * BaseEIAProjectOperationPhase
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property boolean $domestic_influence
 * @property boolean $domestic_wastewater_treatment
 * @property string $domestic_influence_remarks
 * @property boolean $solid_wastes
 * @property boolean $solid_wastes_segregation
 * @property boolean $solid_wastes_proper_collection
 * @property boolean $solid_wastes_proper_housekeeping
 * @property string $solid_wastes_remarks
 * @property boolean $increased_traffic
 * @property boolean $increased_traffic_rules_adhere
 * @property boolean $increased_traffic_signables
 * @property string $increased_traffice_remarks
 * @property boolean $fire_risk
 * @property boolean $fire_risk_extinguishers
 * @property boolean $fire_risk_exit_stairs
 * @property string $fire_risk_remarks
 * @property string $token
 * @property string $resubmit
 * @property EIAProjectDetail $EIAProjectDetail
 * 
 * @method integer                  getEiaprojectId()                     Returns the current record's "eiaproject_id" value
 * @method boolean                  getDomesticInfluence()                Returns the current record's "domestic_influence" value
 * @method boolean                  getDomesticWastewaterTreatment()      Returns the current record's "domestic_wastewater_treatment" value
 * @method string                   getDomesticInfluenceRemarks()         Returns the current record's "domestic_influence_remarks" value
 * @method boolean                  getSolidWastes()                      Returns the current record's "solid_wastes" value
 * @method boolean                  getSolidWastesSegregation()           Returns the current record's "solid_wastes_segregation" value
 * @method boolean                  getSolidWastesProperCollection()      Returns the current record's "solid_wastes_proper_collection" value
 * @method boolean                  getSolidWastesProperHousekeeping()    Returns the current record's "solid_wastes_proper_housekeeping" value
 * @method string                   getSolidWastesRemarks()               Returns the current record's "solid_wastes_remarks" value
 * @method boolean                  getIncreasedTraffic()                 Returns the current record's "increased_traffic" value
 * @method boolean                  getIncreasedTrafficRulesAdhere()      Returns the current record's "increased_traffic_rules_adhere" value
 * @method boolean                  getIncreasedTrafficSignables()        Returns the current record's "increased_traffic_signables" value
 * @method string                   getIncreasedTrafficeRemarks()         Returns the current record's "increased_traffice_remarks" value
 * @method boolean                  getFireRisk()                         Returns the current record's "fire_risk" value
 * @method boolean                  getFireRiskExtinguishers()            Returns the current record's "fire_risk_extinguishers" value
 * @method boolean                  getFireRiskExitStairs()               Returns the current record's "fire_risk_exit_stairs" value
 * @method string                   getFireRiskRemarks()                  Returns the current record's "fire_risk_remarks" value
 * @method string                   getToken()                            Returns the current record's "token" value
 * @method string                   getResubmit()                         Returns the current record's "resubmit" value
 * @method EIAProjectDetail         getEIAProjectDetail()                 Returns the current record's "EIAProjectDetail" value
 * @method EIAProjectOperationPhase setEiaprojectId()                     Sets the current record's "eiaproject_id" value
 * @method EIAProjectOperationPhase setDomesticInfluence()                Sets the current record's "domestic_influence" value
 * @method EIAProjectOperationPhase setDomesticWastewaterTreatment()      Sets the current record's "domestic_wastewater_treatment" value
 * @method EIAProjectOperationPhase setDomesticInfluenceRemarks()         Sets the current record's "domestic_influence_remarks" value
 * @method EIAProjectOperationPhase setSolidWastes()                      Sets the current record's "solid_wastes" value
 * @method EIAProjectOperationPhase setSolidWastesSegregation()           Sets the current record's "solid_wastes_segregation" value
 * @method EIAProjectOperationPhase setSolidWastesProperCollection()      Sets the current record's "solid_wastes_proper_collection" value
 * @method EIAProjectOperationPhase setSolidWastesProperHousekeeping()    Sets the current record's "solid_wastes_proper_housekeeping" value
 * @method EIAProjectOperationPhase setSolidWastesRemarks()               Sets the current record's "solid_wastes_remarks" value
 * @method EIAProjectOperationPhase setIncreasedTraffic()                 Sets the current record's "increased_traffic" value
 * @method EIAProjectOperationPhase setIncreasedTrafficRulesAdhere()      Sets the current record's "increased_traffic_rules_adhere" value
 * @method EIAProjectOperationPhase setIncreasedTrafficSignables()        Sets the current record's "increased_traffic_signables" value
 * @method EIAProjectOperationPhase setIncreasedTrafficeRemarks()         Sets the current record's "increased_traffice_remarks" value
 * @method EIAProjectOperationPhase setFireRisk()                         Sets the current record's "fire_risk" value
 * @method EIAProjectOperationPhase setFireRiskExtinguishers()            Sets the current record's "fire_risk_extinguishers" value
 * @method EIAProjectOperationPhase setFireRiskExitStairs()               Sets the current record's "fire_risk_exit_stairs" value
 * @method EIAProjectOperationPhase setFireRiskRemarks()                  Sets the current record's "fire_risk_remarks" value
 * @method EIAProjectOperationPhase setToken()                            Sets the current record's "token" value
 * @method EIAProjectOperationPhase setResubmit()                         Sets the current record's "resubmit" value
 * @method EIAProjectOperationPhase setEIAProjectDetail()                 Sets the current record's "EIAProjectDetail" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIAProjectOperationPhase extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_project_operation_phase');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('domestic_influence', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('domestic_wastewater_treatment', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('domestic_influence_remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
             ));
        $this->hasColumn('solid_wastes', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('solid_wastes_segregation', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('solid_wastes_proper_collection', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('solid_wastes_proper_housekeeping', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('solid_wastes_remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
             ));
        $this->hasColumn('increased_traffic', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('increased_traffic_rules_adhere', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('increased_traffic_signables', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('increased_traffice_remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
             ));
        $this->hasColumn('fire_risk', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('fire_risk_extinguishers', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('fire_risk_exit_stairs', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('fire_risk_remarks', 'string', 2000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2000,
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
        $this->hasOne('EIAProjectDetail', array(
             'local' => 'eiaproject_id',
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
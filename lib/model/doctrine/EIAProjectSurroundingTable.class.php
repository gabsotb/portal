<?php

/**
 * EIAProjectSurroundingTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIAProjectSurroundingTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIAProjectSurroundingTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIAProjectSurrounding');
    }
	
	public static $units= array(
		'meters' =>'m',
		'kilometers' => 'Km'
	);
	
	public function getUnits()
	{
		return self::$units;
	}

	public function getProjectSurroundingId()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the id of the user logged
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_a_project_surrounding.id FROM e_i_a_project_surrounding WHERE created_by = '$userId' order by e_i_a_project_surrounding.id desc limit 1 ");
		
		foreach($query as $q){
			$id=$q['id'];
		}
		
		return $id;
	}
}
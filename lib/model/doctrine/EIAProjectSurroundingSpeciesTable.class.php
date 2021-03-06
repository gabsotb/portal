<?php

/**
 * EIAProjectSurroundingSpeciesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIAProjectSurroundingSpeciesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIAProjectSurroundingSpeciesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIAProjectSurroundingSpecies');
    }
	///
	///method to search for a certain id
	public function queryForId($project_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id, token from   e_i_a_project_surrounding_species WHERE project_surrounding_id = '$project_id' limit 1 ");
	 ///
	 return $query;
	}
	public function getTablePrimaryIdAndToken($project_surrounding_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id, token FROM e_i_a_project_surrounding_species WHERE project_surrounding_id = '$project_surrounding_id'");
	 //
	 return $query;
	}
	//repetition will correct this ******************************** while debugging
	public function getProjectSurroundingSpeciesTokenAndId($project_surrounding_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id, token FROM e_i_a_project_surrounding_species WHERE project_surrounding_id = '$project_surrounding_id'");
	 //
	 return $query;
	}
	///
	
}
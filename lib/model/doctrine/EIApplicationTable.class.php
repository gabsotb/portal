<?php

/**
 * EIApplicationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIApplicationTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIApplicationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIApplication');
    }
	public function getUserEIApplications(Doctrine_Query $query = null)
	{
	$userid = sfContext::getInstance()->getUser()->getGuardUser()->getUsername(); // get the username of the user logged
	// let use the doctrine manager secure 
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT * FROM e_i_application 
		where updated_by= '$userid'
		");
		return $query; 
	}
	// This method selects data from the investment table and returns it to the controller if called
	public function getTotalIEApplications(Doctrine_Query $query = null)
	{
	 if($query == null)
	 {
	   //execute a select statement to return data in InvestmentApplication table
	  $q = Doctrine_Core::getTable('EIApplication')
	     ->createQuery('a')
        ->execute();
		return $q;
	 }
	}
	
}
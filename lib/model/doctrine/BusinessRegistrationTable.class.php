<?php

/**
 * BusinessRegistrationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BusinessRegistrationTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BusinessRegistrationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BusinessRegistration');
    }
	//Method returns all business registration numbers
	public function getAllBusinessRegistrationNumbers()
	{
	 //
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT business_regno FROM
       business_registration");
	 $number = null ;
	 $value = null;
	 $sample = null;
	 foreach($query as $value)
		 {
			$number = array($value['business_regno'] => $value['business_regno']) ;
			//print ($value['business_regno']);
			//print "<br/>" ;
		 }
		 //
		// print ($value['business_regno']);
		/// exit;
	   return $number;
	
	 }
	 
	
}
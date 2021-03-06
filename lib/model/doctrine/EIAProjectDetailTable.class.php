<?php

/**
 * EIAProjectDetailTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIAProjectDetailTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIAProjectDetailTable
     */
	 //set default values for  sectors, districts, provinces
	 
				
			  static public $sectors = array(
				'gitenga' => 'Gitenga',
				'kanyinya' => 'Kanyinya',
				'kigali' => 'Kigali',
				'kimisagara' => 'Kimisagara',
				'mageregere' => 'Mageregere',
				'muhima' => 'Muhima',
				'nyakabanda' => 'Nyakabanda',
				'nyamirambo' => 'Nyamirambo',
				'nyarugenge' => 'Nyarugenge',
				'rwenzameyo' => 'Rwenzameyo',
				
			  );
			  //
			  static public $districts = array(
				           'Bugesera' => 'Bugesera',
						   'Gatsibo' => 'Gatsibo',
						   'Kayonza' => 'Kayonza',
						   'Kirehe' => 'Kirehe',
						   'Ngoma' => 'Ngoma',
						   'Nyagatare' => 'Nyagatare',
						   'Rwamagana' => 'Rwamagana',
						   'Gasabo' => 'Gasabo',
						   'Kicukiro' => 'Kicukiro',
						   'Nyarugenge' => 'Nyarugenge',
						   'Burera' => 'Burera',
						   'Gakenke'=> 'Gakenke',
						   'Gicumbi' => 'Gicumbi',
						   'Musanze' => 'Musanze',
						   'Rulindo' => 'Rulindo',
						   'Gisagara' => 'Gisagara',
						   'Huye' => 'Huye',
						   'Kamonyi' => 'Kamonyi',
						   'Muhanga' => 'Muhanga',
						   'Nyamagabe' => 'Nyamagabe',
						   'Nyanza' => 'Nyanza',
						   'Nyaruguru' => 'Nyaruguru',
						   'Ruhango' => 'Ruhango',
						   'Karongi' => 'Karongi',
						   'Ngororero' => 'Ngororero',
						   'Nyabihu' => 'Nyabihu',
						  'Nyamasheke' => 'Nyamasheke',
						   'Rubavu' => 'Rubavu',
						   'Rusizi' => 'Rusizi',
						   'Rutsiro' => 'Rutsiro',
				
			  );
			  static public $provinces = array(
				'East Province' => 'East Province',
				'Kigali Province' => 'Kigali Province',
				'North Province' => 'North Province',
				'South Province' => 'South Province',
				'West Province' => 'West Province',
			  );
  /* Functions to return  sectors, provinces and district names in Rwanda */
     
	   public function getSectors()
	  {
	   return self::$sectors ;
	  }
	   public function getDistricts()
	  {
	   return self::$districts ;
	  }
	   public function getProvinces()
	  {
	   return self::$provinces ;
	  }
	  /////////////////////////
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIAProjectDetail');
    }
	//this function searchs this table and makes sure that a particular reference number does not exist. if it is the first, record,
	//we set a starting point and if a record exists we increment it
	public function createIncrementalReferenceNumber()
	{
	  $start = 10000 ; //start number
	  $id = 1;
	  $date = date('Y');
	 // $newNumber = $start + 1 ; // new number incremental
	  //query to select the first record
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT project_reference_number, id FROM e_i_a_project_detail
	  ORDER BY e_i_a_project_detail.id DESC LIMIT 1"); //this should return the last record inserted
	  $number = null ;
	  $primary_id = null;
	  //loop
	  //
	  /*
	  foreach($query as $q)
	  {
	   $number = $q['project_reference_number'] ;
	  }
	  //check the value of $number 
	  if($number == null)
	  {
	   //start point
	   return $text."-".$start."-".$year;
	  }
	  if($number != null)
	  {
	    //continue with incrementing the number
		$value = $number + 1 ;
		return $text."-".$value."-".$year;
		//return $value;
	  } */
	  //////
	  //loop
	  foreach($query as $q)
	  {
	   $number = $q['project_reference_number'] ;
	   $primary_id = $q['id'] ;
	  }
	  //check the value of $number 
	  if($number == null && $primary_id == null)
	  {
	   //start point
	   return $id."-".$start."-".$date;
	  }
	  if($number != null && $primary_id != null)
	  {
	    //continue with incrementing the number
		
		$value = $number + $start ;
		$id_value = $primary_id + $id ;
		return $id_value."-".$value."-".$date;
	  }
	  //////
	}

	public function getProjectId()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the id of the user logged
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_a_project_detail.id FROM e_i_a_project_detail WHERE created_by = '$userId' order by e_i_a_project_detail.id desc limit 1 ");
		
		foreach($query as $q){
			$id=$q['id'];
		}
		
		return $id;
	}
	///
	public function getUserSubmission($logged_user_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id,project_reference_number,token FROM  e_i_a_project_detail where created_by = '$logged_user_id' ");
	 return $query;
	}
	//method to get token from this table given an id of the record
	public function getProjectDetailToken($id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT token FROM e_i_a_project_detail WHERE id = '$id' limit 1");
	 //
	 $token = null;
	 foreach($query as $q)
	 {
	   $token = $q['token'];
	 }
	 return $token;
	}
		///Function to get Users who can work on applications for EIA Certificates
	public function getAllEIACertWorkers($data_admins,$managers)
	{
	 $users = Doctrine_Core::getTable('BusinessPlan')->getAllWorkersUserNames($data_admins,$managers);
	 $user_names = array() ;
	 $value = null;
	 foreach($users as $value)
	 {
		$user_names[] = array($value['id'] => $value['username']) ;
	 }
	 $real = array();
	 foreach($user_names as $r)
	 {
	  
	  $real[] = $r;
	 }
	 return $real; 
	}
	//function to retrieve applicant details
	public function getInvestorInfo($project_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select updated_by, email_address from e_i_a_project_detail left join sf_guard_user on e_i_a_project_detail.created_by = sf_guard_user.id ");
	 //
	 return $query;
	}
	//method to retrieve project reference number
	public function getReferenceNo($project_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT project_reference_number from e_i_a_project_detail where id = '$project_id' ");
	 $number = null ;
	 foreach($query as $q)
	 {
	  $number = $q['project_reference_number'];
	 }
	 return $number;
	}
	///
}
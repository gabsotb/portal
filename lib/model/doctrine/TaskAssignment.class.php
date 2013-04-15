<?php

/**
 * TaskAssignment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TaskAssignment extends BaseTaskAssignment
{
    //test we write functions to return the group and business
    private  $group;
    private  $name;
  //setter methods
	   public function setGroup($group)
	   {
		$this->group = $group;
	   }
	  public function getGroup()
	  {
	   return $this->group;
	  }
	  //
	  public function setCompany($name)
	  {
	   $this->name = $name;
	  }
	  public function getCompany()
	  {
	   return $this->name;
	  }
    public function save(Doctrine_Connection $conn = null)
	  {
	   $conn = $conn ? $conn : $this->getTable()->getConnection();
	   $conn->beginTransaction();
			  try
			  {
				  //we will override this method. we update the application status of this investor. for now we use coded status
				  //later we will try and find a better solution
				  $businessStatus = new BusinessApplicationStatus();
				  //we retrieve the neccessary values from this model
				  $id = $this->getInvestmentappId() ;
					  //$name = $this->getUserAssigned();
					 // print $name ; exit;
				  
				  // pass id of the item to update
				  $value = "assigned";
				  $this->updateStatus($id,$value);
				  $value = "Your Document has been assigned to a RDB Data Admin Staff ";
			      $this->updateComment($id,$value);
				  $value = 30 ;
				  $this->updateValue($id, $value );
				  //setting token
				  if (!$this->getToken() )
					  {
						$this->setToken(sha1(date('Y').rand(11111, 99999)));
					  }
				 // exit;
				  ///
				  $ret = parent::save($conn);
					$conn->commit();
					return $ret ;
				
			  }
			  catch(Exception $e)
			  {
			  $conn->rollBack();
			  throw $e;
			  }
	  }
  //my custom toString method
  public function __toString()
  {
    return sprintf('%s',$this->getName());
  }
	   //this method is used to update the status of a business application during form submission
  public function updateStatus($id,$value)
  {
   /* $q = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("UPDATE business_application_status SET application_status = 'Processing' WHERE id ='$id'
	"); */
	$query = Doctrine_Core::getTable('BusinessApplicationStatus')->updateStatus($id,$value);
	
  }
  //update the comment
  public function updateComment($id,$value)
  {
   $query = Doctrine_Core::getTable('BusinessApplicationStatus')->updateComment($id,$value);
  }
  //update value
  public function updateValue($id,$value)
  {
   $query = Doctrine_Core::getTable('BusinessApplicationStatus')->updateValue($id,$value);
  }
  //
  public function updateTaskRejection($taskId)
	{
	  $query = Doctrine_Core::getTable('TaskAssignment')->updateTaskStatusRejection($taskId);
	}
}
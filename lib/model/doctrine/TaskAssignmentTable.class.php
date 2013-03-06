<?php

/**
 * TaskAssignmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TaskAssignmentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TaskAssignmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TaskAssignment');
    }
	//this method retrieves the user assigned jobs i.e. jobs for the current user
	public function getUserTasks($userId)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT  task_assignment.investmentapp_id,
	 task_assignment.instructions,task_assignment.work_status,
	 task_assignment.duedate, investment_application.name FROM task_assignment LEFT JOIN investment_application ON 
	 task_assignment.investmentapp_id = investment_application.id WHERE task_assignment.user_assigned ='$userId' AND 
	 task_assignment.work_status = 'notstarted'
	 ") ;
	 return $query;
	}
	//Get Tasks of this user who's status is not complete
	public function getUserTasksNotComplete($userId)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT task_assignment.investmentapp_id,
	 task_assignment.instructions,task_assignment.work_status,
	 task_assignment.duedate, investment_application.name, investment_application.location FROM task_assignment 
	 LEFT JOIN investment_application ON 
	 task_assignment.investmentapp_id = investment_application.id WHERE task_assignment.user_assigned ='$userId' AND 
	 task_assignment.work_status != 'complete' AND task_assignment.work_status != 'notstarted'
	 ") ;
	 return $query;
	}
	
	//Get Tasks of this user who's status is  complete
	public function getUserTasksComplete($userId)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT task_assignment.investmentapp_id,
	 task_assignment.instructions,task_assignment.work_status,task_assignment.user_assigned,
	 task_assignment.duedate, task_assignment.created_at,investment_application.name FROM task_assignment LEFT JOIN investment_application ON 
	 task_assignment.investmentapp_id = investment_application.id WHERE task_assignment.user_assigned ='$userId' AND 
	 task_assignment.work_status = 'complete'
	 ") ;
	 return $query;
	}
	//get all application details for Investment Certificate for a given user
	public function getApplicationDetails($id)
	{
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN investment_application ON task_assignment.investmentapp_id = investment_application.id  LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id WHERE task_assignment.investmentapp_id = '$id'
	  ") ;
	  //
	  //we also need to change the status of business application 
	  //Task should be started and the investor should see processing and detailed comment
	  //set variables to make function reusable 
	  //Now here we call the 3 functions in the BusinessApplicationStatus Table to update status ,comment and progress bar
	  /*Values to Set*/
	  $value1 = "processing";
	  $value2 = "The RDB Staff is now process and validating you application. 
	  Please wait. Thankyou";
	  $value3 = 50;
	  $this->updateBusinessApplicationStatus($id,$value1,$value2,$value3);
	  $this->updateTaskStatus($id);
	  return $query;
	  
	}
	//update tasks status on this table for this user i.e. logged in user
	public function updateTaskStatus($taskId)
	{
	 $value = "started";
	 //
      $q = Doctrine_Query::create()
	 ->UPDATE('TaskAssignment')
	 ->SET('work_status', '?' , $value)
	 ->WHERE('investmentapp_id = ?', $taskId);
	 $q->execute();
	}
	//this function updates the status of work to reporting i.e. report generation status
	//within this method we will also update status of BusinessApplicationStatus table for the user to analyze
	public function updateUserTaskStatus($taskId)
	{
	 $work_status = "reporting" ;
	  $q = Doctrine_Query::create()
	 ->UPDATE('TaskAssignment')
	 ->SET('work_status', '?' , $work_status)
	 ->WHERE('investmentapp_id = ?', $taskId);
	 $q->execute();
	 ///call methods for BusinessApplicationStatus update
	 //set variables
	  $value1 = "reporting";
	  $value2 = "The RDB Staff is now analyzing and generating a business proposal summary report. 
	  Please wait for acceptance of your application. Thankyou";
	  $value3 = 70;
	 $this->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
	}
	//called after sending an email to the user
	public function updateUserTaskStatus2($taskId)
	{
	 $work_status = "awaitingpayment" ;
	  $q = Doctrine_Query::create()
	 ->UPDATE('TaskAssignment')
	 ->SET('work_status', '?' , $work_status)
	 ->WHERE('investmentapp_id = ?', $taskId);
	 $q->execute();
	 ///call methods for BusinessApplicationStatus update
	 //set variables
	  $value1 = "accepted";
	  $value2 = "Your Application for Investment Certificate has been accepted.
	  An email with further instruction for payment has been sent to your accout email. Thankyou";
	  $value3 = 80;
	 $this->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
	}
	//update business application status for the user to see that the task has been started
	public function updateBusinessApplicationStatus($id,$value1,$value2,$value3)
	{
	  
	  $q1 = Doctrine_Core::getTable('BusinessApplicationStatus')->updateStatus($id,$value1);
	  $q2 = Doctrine_Core::getTable('BusinessApplicationStatus')->updateComment($id,$value2 );
	  $q3 = Doctrine_Core::getTable('BusinessApplicationStatus')->updateValue($id,$value3);
	  
	}
	//the third part comes after confirmation of payment
	public function updateUserTaskStatus3($taskId)
	{
	 $work_status = "paymentconfirmed" ;
	  $q = Doctrine_Query::create()
	 ->UPDATE('TaskAssignment')
	 ->SET('work_status', '?' , $work_status)
	 ->WHERE('investmentapp_id = ?', $taskId);
	 $q->execute();
	 ///call methods for BusinessApplicationStatus update
	 //set variables
	  $value1 = "paymentconfirmed";
	  $value2 = "Your Payment for Administrative Fee has been confirmed. Please wait for your Certificate of
    investment Thankyou";
	  $value3 = 90;
	 $this->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
	}
	//the final part is after issuing of certificate.
	public function updateUserTaskStatus4($taskId)
	{
	   $work_status = "complete" ;
	  $q = Doctrine_Query::create()
		 ->UPDATE('TaskAssignment')
		 ->SET('work_status', '?' , $work_status)
		 ->WHERE('investmentapp_id = ?', $taskId);
		 $q->execute();
	}
	//this method is called after successful confirmation of payment. parameter passed is name of business
	public function updatingPaymentStatus($businesName)
	{
	  $query =  Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT task_assignment.id, task_assignment.investmentapp_id FROM task_assignment
	   LEFT JOIN investment_application ON task_assignment.investmentapp_id = investment_application.id
	   WHERE investment_application.name = '$businesName'
	  ");
	  //
	  return $query;
	}
	/*
	Before we issue a Certificate, we will confirm the status of payment
	*/
	public function getStatus($id)
	{
	 $query =  Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT task_assignment.work_status FROM task_assignment
	   LEFT JOIN investment_application ON task_assignment.investmentapp_id = investment_application.id
	   WHERE investment_application.id = '$id'
	  ");
	  //
	  return $query;
	}
	/*We use this method to retrieve tasks which this logged administrator has assigned to data admins*/
	public function getAssignedTasks($username)
	{
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	  SELECT task_assignment.id, sf_guard_user.username,investment_application.name,task_assignment.work_status,task_assignment.duedate, task_assignment.instructions,
	  task_assignment.created_at from task_assignment left join sf_guard_user on task_assignment.user_assigned = sf_guard_user.id
	  left join investment_application on task_assignment.investmentapp_id = investment_application.id
	  where task_assignment.updated_by = '$username' 
	  ");
	  return $query;
	}
	//This method will return the email address of a user 
	public function getUserEmailAddress($id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	 SELECT email_address,username from sf_guard_user where sf_guard_user.id = '$id'
	 ");
	 return $query;
	}
	//we will create a function that will return only the id and name of a user who belongs to investment certificate data admins or eia data admins 
	public function getDataAdmins($group)
	{
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	    SELECT sf_guard_user.id,sf_guard_user.username
		from sf_guard_user_group left join sf_guard_group on sf_guard_user_group.group_id = sf_guard_group.id
		left join sf_guard_user on sf_guard_user_group.user_id = sf_guard_user.id
		 where sf_guard_group.name = '$group'
	   ");
	   $values = null;
	    foreach($query as $q)
		{
		 $values = array($q['id'] => $q['username']);
		}
		//
	
	 return $values;
	}
	//we also want to make sure that the select dropdown box contains the correct business name for the admin to easily assign job to a data admin
	//
	public function getCompanyName($name)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	    SELECT investment_application.id,investment_application.name
		from investment_application 
		 where investment_application.name = '$name'
	   ");
	   $values = null;
	    foreach($query as $q)
		{
		 $values = array($q['id'] => $q['name']);
		}
	 return $values;
	}
	
}
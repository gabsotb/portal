<?php
class TaskAssignmentFormVariables
{
 
    //test we write functions to return the group and business
    private  $group;
    private  $name;
  //setter methods
	   public function setGroup($group)
	   {
		$this->group = $group;
		 print "Group is ".$this->group; exit;
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
}

?>
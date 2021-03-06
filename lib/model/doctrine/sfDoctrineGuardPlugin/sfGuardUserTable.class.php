<?php

/**
 * sfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserTable extends PluginsfGuardUserTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfGuardUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }
	///
	public function getUserGroup($username_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select sf_guard_user_group.group_id from sf_guard_user left join sf_guard_user_group on sf_guard_user.id = sf_guard_user_group.user_id where sf_guard_user.id = '$username_id' ");
	 return $query;
	}
	///we return total number of users
	public function getTotalUsers()
	{
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT count(username) as users FROM sf_guard_user");
	  $users = 0;
	  foreach($query  as $q)
	  {
	   $users = $q['users'];
	  }
	  return $users;
	}
	//get users with a group
	public function getUserWithGroup()
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select count(sf_guard_user_group.group_id) as staff  from sf_guard_user left join sf_guard_user_group on sf_guard_user.id = sf_guard_user_group.user_id");
	 $user_with_group = 0;
	 foreach($query as $q)
	 {
	  $user_with_group = $q['staff'];
	 }
	 return $user_with_group;
	 //
	}
	//count users with certain role
	public function countUsers($role)
	{
	   $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	    SELECT count(sf_guard_user.username) as users
		from sf_guard_user_group left join sf_guard_group on sf_guard_user_group.group_id = sf_guard_group.id
		left join sf_guard_user on sf_guard_user_group.user_id = sf_guard_user.id
		 where sf_guard_group.name = '$role'
	   ");
	   $number = 0;
	   foreach($query as $q)
	   {
	    $number = $q['users'];
	   }
	   return $number;
	}
}
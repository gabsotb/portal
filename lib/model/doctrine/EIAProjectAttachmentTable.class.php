<?php

/**
 * EIAProjectAttachmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIAProjectAttachmentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIAProjectAttachmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIAProjectAttachment');
    }
	public function queryForId($project_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id, token from  e_i_a_project_attachment WHERE eiaproject_id = '$project_id' limit 1 ");
	 ///
	 return $query;
	}
	 //method to get token  and id from this table given an id of the record
	public function getProjectDetailTokenAndId($eiaproject_id)
	{
	 //print "eiaproject_id is ".$eiaproject_id ;exit;
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT token, id FROM e_i_a_project_operation_phase WHERE eiaproject_id = '$eiaproject_id' limit 1");
	 //
	 
	 return $query;
	}
}
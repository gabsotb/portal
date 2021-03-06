<?php

/**
 * EIApplicationStatusTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIApplicationStatusTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIApplicationStatusTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIApplicationStatus');
    }
	
	public function getUserStatus()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_a_project_detail.project_title,e_i_a_project_detail.id,e_i_application_status.application_status,e_i_application_status.comments,e_i_application_status.percentage,e_i_application_status.eiaproject_id FROM e_i_application_status LEFT JOIN e_i_a_project_detail ON e_i_a_project_detail.id = e_i_application_status.eiaproject_id WHERE e_i_a_project_detail.created_by = '$userId' ");
		 
		return $query;
	}	
	public function getApplicationStatus($status)
	{
		$query=Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_application_status.id,e_i_a_project_detail.project_reference_number,e_i_a_project_detail.project_title,e_i_a_project_developer.developer_name FROM e_i_application_status LEFT JOIN e_i_a_project_detail ON e_i_a_project_detail.id = e_i_application_status.eiaproject_id LEFT JOIN e_i_a_project_developer ON e_i_a_project_developer.eiaproject_id = e_i_a_project_detail.id WHERE e_i_application_status.application_status = '$status' ORDER BY e_i_a_project_detail.project_reference_number DESC ");
		
		return $query;
	}
	public function updateStatus($eiaProjectId,$status)
	{
		$q= Doctrine_Query::create()
		->update('EIApplicationStatus s')
		->set('s.application_status', '?', $status)
		->where('s.eiaproject_id = ?', $eiaProjectId);
		return $q->execute();
	}
	public function updateComment($eiaProjectId,$comment)
	{
		$q= Doctrine_Query::create()
		->update('EIApplicationStatus s')
		->set('s.comments', '?', $comment)
		->where('s.eiaproject_id = ?', $eiaProjectId);
		return $q->execute();
	}
	public function updatePercentage($eiaProjectId,$percent)
	{
		$q= Doctrine_Query::create()
		->update('EIApplicationStatus s')
		->set('s.percentage', '?', $percent)
		->where('s.eiaproject_id = ?', $eiaProjectId);
		return $q->execute();
	}
}
		
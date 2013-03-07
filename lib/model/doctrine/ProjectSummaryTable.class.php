<?php

/**
 * ProjectSummaryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProjectSummaryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProjectSummaryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProjectSummary');
    }
	//get Applicant details for the pdf
	public function getApplicantDetails($id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT investment_application.name, 
	 investment_application.location, sf_guard_user.first_name,sf_guard_user.last_name  FROM investment_application
	 LEFT JOIN sf_guard_user ON investment_application.created_by = sf_guard_user.id WHERE
	 investment_application.id = '$id'"); 
	 return $query;
	}
}
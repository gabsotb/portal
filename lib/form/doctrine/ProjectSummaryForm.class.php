<?php

/**
 * ProjectSummary form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProjectSummaryForm extends BaseProjectSummaryForm
{
  public function configure()
  {
   $this->setDefault('created_at',date('Y-m-d H:i:s'));
   unset($this['updated_at'],$this['updated_by'],$this['created_by'], $this['token'], $this['created_at']);
   //
   $this->widgetSchema->setLabels(array(
			  'created_at'    => 'Date'
			));
	//
  $this->widgetSchema['investment_id']	= new sfWidgetFormInputHidden();
  //now we get the session variable and use it for setting default value for this form
  $session_variable = sfContext::getInstance()->getUser()->getAttribute('investment_id');
  $this->setDefault('investment_id', $session_variable);
  //we also get the values for business sector and set it
   $query = Doctrine_Core::getTable('ProjectSummary')->getBusinessInformation($session_variable);
   //
	 $business_sector = null;
	 foreach($query as $q)
	 {
	  $business_sector_desc = $q['business_sector'];
	 }
	 ///
	 $this->setDefault('business_sector_description', $business_sector_desc);
	 $this->widgetSchema['business_sector'] = new sfWidgetFormChoice(array(
	  'label' => 'Choose Business Sector',
	  'choices'  => Doctrine_Core::getTable('ProjectSummary')->getBusinessSectors(),
	  'expanded' => false,
    ));
	///we also calculate the number of jobs for local and foreign employees
	$jobs_local_query = Doctrine_Core::getTable('ProjectSummary')->getTotalLocalJobs($session_variable);
	$jobs_foreign_query = Doctrine_Core::getTable('ProjectSummary')->getTotalForeignJobs($session_variable);
	 //
	 $local_jobs = 0;
	 foreach($jobs_local_query as $q)
	 {
	  $local_jobs = $q['year1'] + $q['year2'] + $q['year3'] + $q['year4'] + $q['year5'];
	 }
	//
	$foreign_jobs = 0;
	$total_jobs = 0;
	//
	foreach($jobs_foreign_query as $q)
	 {
	  $foreign_jobs = $q['year1'] + $q['year2'] + $q['year3'] + $q['year4'] + $q['year5'];
	 }
	 ///addition
	 $total_jobs = $local_jobs + $foreign_jobs ;
	$this->setDefault('employment_created', $total_jobs);
	///////////////////////////////////////////////////we calculate the amount of investment planned by this investor
	$costs_query = Doctrine_Core::getTable('ProjectSummary')->getTotalFinancialCost($session_variable);
	$costs = 0;
	//
	foreach($costs_query as $q)
	{
	 $costs = $q['year1'] + $q['year2'] + $q['year3'] + $q['year4'] + $q['year5'];
	}
	//
	$performace_query = Doctrine_Core::getTable('ProjectSummary')->getTotalPlannedPerformance($session_variable);
	$performace = 0;
	foreach($performace_query as $q)
	{
	 $performace = $q['year1'] + $q['year2'] + $q['year3'] + $q['year4'] + $q['year5'];
	}
	//
	$startup_query = Doctrine_Core::getTable('ProjectSummary')->getTotalStartupExpense($session_variable);
	$startup = 0;
	foreach($startup_query as $q)
	{
	 $startup = $q['year1'] + $q['year2'] + $q['year3'] + $q['year4'] + $q['year5'];
	}
	//
	$structure_query = Doctrine_Core::getTable('ProjectSummary')->getTotalStructureFinancial($session_variable);
	$structure = 0;
	foreach($structure_query as $q)
	{
	 $structure = $q['local_source'] + $q['foreign_source'];
	}
	////
	$total_costs = $costs + $performace + $startup + $structure ;
	$this->setDefault('planned_investment', $total_costs);
	///////////////////////////////////////////////////////////////////////////
  }
}

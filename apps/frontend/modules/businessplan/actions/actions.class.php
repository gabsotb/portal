<?php

/**
 * businessplan actions.
 *
 * @package    rdbeportal
 * @subpackage businessplan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class businessplanActions extends sfActions
{
  //we are going to define some action method to autoload and save data to database table costs
  //Saves Investment Financial costs
  public function executeSave(sfWebRequest $request)
  {
     //Now we get the id and username of current logged user
	
	 
			try {
			   $param = $request->getParameter('id');
			   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	           $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
			  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
			  // $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
			  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
			   $business_plan = $request->getParameter('id');
			    ///
			    $db = Doctrine_Manager::getInstance()->getCurrentConnection(); 
				$query = null;
			  $colMap = array(
			    
				0 => 'year1',
				1 => 'year2',
				2 => 'year3',
				3 => 'year4',
				4 => 'year5'
			  );
			  
			  if ($_POST['changes']) {
			  
				foreach ($_POST['changes'] as $change) {
				//(0, 0, 79, 987) this is what is returned by changes
				/*from (0, 0, 79, 987) 
				 i noticed that 0 = is the id i.e. rowId, the next 0 is colId, and 79 is old value while 987 is the new value to update 
				
				*/
				 $value1 = $change[0] ; // this is what is used for rowId
				 $value2 = $change[1]; // it is used for columnId
				 $value3 = $change[2]; // this is the old value
				 $value4 = $change[3]; //this is the new value
				 //
				  $column = "";
				  //
				 switch($value2)
				 {
				  case 0:
				   $column = "year1" ;
				   break;
				  case 1: 
				   $column = "year2" ;
				   break;
				  case 2:
				   $column = "year3" ;
				   break;
				  case 3:
				    $column = "year4" ;
					break;
				  case 4:
				   $column = "year5" ;
				   break;
				  default:
				  $column = "undefined";
				 }
				 //we will select from table where column value is $change[4] where business_id and created_by belongs to this user,
				 //from that we retrieve the id and use it. we limit result to just 1 
				 
				
				 //
				 $myquery = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id FROM costs WHERE $column IN ($value3) and business_plan = $business_plan and created_by = $userId LIMIT 1 ") ;
				  $rowId  = 0 ; 
				  foreach($myquery as $myId)
				  {
				   $rowId = $myId['id'] ;
				  } 
			
				  $colId  = $change[1];
				  $newVal = $change[3];
				  
				  if (!isset($colMap[$colId])) 
				  {
					echo "\n spadam";
					continue;
				  }

				
					$query = $db->prepare('UPDATE costs SET `' . $colMap[$colId] . '` = :newVal, created_by = :userId , updated_by = :userName
					WHERE id = :id and business_plan = :business_plan'); 
					//
					  $query->bindValue(':id',$rowId , PDO::PARAM_INT);
					  $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					  $query->bindValue(':userId', $userId, PDO::PARAM_INT );
					  $query->bindValue(':userName', $userName, PDO::PARAM_STR );
					  $query->bindValue(':business_plan', $business_plan, PDO::PARAM_INT);
					  $query->execute();
				}
			
			  } 

			  $out = array(
				'result' => 'ok'
			  );
			  echo json_encode($out);
			  exit;
			 
			}
			catch (PDOException $e) 
			{
			  print 'Exception : ' . $e->getMessage();
			}	
	//
  }
  //Loads Investment Expenses i.e. Including Data Initializaion
  public function executeLoading(sfWebRequest $request)
  {
         /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				
				  $db = Doctrine_Manager::getInstance()->getCurrentConnection();
			      $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				  $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
				  //let us use another better method
				 // $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
				  //this point needs meditation
				  //$company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessNameStatusNotRejected($userId);
				  
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
				  ///get parameter id passed
				  $business_plan = $request->getParameter('id');
				  
				//  print($business_plan); exit;
				  //working if we select all
				  $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM costs  where business_plan = '$business_plan'  limit 5 ") ;
				  //we select only records belonging to this particular user
				  /*$data =  $db->fetchAssoc("SELECT id, fixed_cost, year1, year2, year3, year4, year5 WHERE business_plan = '$business_plan' FROM costs ") ; */ 
				 // print_r($userName);
                //  print_r($business_plan);

				 
				 if($data == null)
				 {
				    $query = $db->prepare("INSERT INTO `costs` (`id`, `business_plan`,  `year1`, `year2`, `year3`, `year4`, `year5`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName')");
					$query->execute();
					 exit;
				}
					
					//else we just show data
				 if($data != null)
				 {
				   $out = array('costs' => $data) ;
				   
				   echo(json_encode($out)); exit;
				   //$this->redirect('businessplan/new?id='.$company);
				 }
					
					
					
				 }
				 
				 
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  //Method for Start up Expenses Loading and Save methods
  public function executeSavestartup(sfWebRequest $request)
  {
     try {
			   $param = $request->getParameter('id');
			   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	           $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
			 //  $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
			  // $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
			  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
			   $business_plan = $request->getParameter('id');
			    ///
			    $db = Doctrine_Manager::getInstance()->getCurrentConnection(); 
				$query = null;
			  $colMap = array(
			    
				0 => 'year1',
				1 => 'year2',
				2 => 'year3',
				3 => 'year4',
				4 => 'year5'
			  );
			  
			  if ($_POST['changes']) {
			  
				foreach ($_POST['changes'] as $change) {
				//(0, 0, 79, 987) this is what is returned by changes
				/*from (0, 0, 79, 987) 
				 i noticed that 0 = is the id i.e. rowId, the next 0 is colId, and 79 is old value while 987 is the new value to update 
				
				*/
				 $value1 = $change[0] ; // this is what is used for rowId
				 $value2 = $change[1]; // it is used for columnId
				 $value3 = $change[2]; // this is the old value
				 $value4 = $change[3]; //this is the new value
				 //
				  $column = "";
				  //
				 switch($value2)
				 {
				  case 0:
				   $column = "year1" ;
				   break;
				  case 1: 
				   $column = "year2" ;
				   break;
				  case 2:
				   $column = "year3" ;
				   break;
				  case 3:
				    $column = "year4" ;
					break;
				  case 4:
				   $column = "year5" ;
				   break;
				  default:
				  $column = "undefined";
				 }
				 //we will select from table where column value is $change[4] where business_id and created_by belongs to this user,
				 //from that we retrieve the id and use it. we limit result to just 1 
				 
				
				 //
				 $myquery = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id FROM startupexpenses WHERE $column IN ($value3) and business_plan = $business_plan and created_by = $userId LIMIT 1 ") ;
				  $rowId  = 0 ; 
				  foreach($myquery as $myId)
				  {
				   $rowId = $myId['id'] ;
				  } 
			
				  $colId  = $change[1];
				  $newVal = $change[3];
				  
				  if (!isset($colMap[$colId])) 
				  {
					echo "\n spadam";
					continue;
				  }

				
					$query = $db->prepare('UPDATE startupexpenses SET `' . $colMap[$colId] . '` = :newVal, created_by = :userId , updated_by = :userName
					WHERE id = :id and business_plan = :business_plan'); 
					//
					  $query->bindValue(':id',$rowId , PDO::PARAM_INT);
					  $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					  $query->bindValue(':userId', $userId, PDO::PARAM_INT );
					  $query->bindValue(':userName', $userName, PDO::PARAM_STR );
					  $query->bindValue(':business_plan', $business_plan, PDO::PARAM_INT);
					  $query->execute();
				}
			
			  } 

			  $out = array(
				'result' => 'ok'
			  );
			  echo json_encode($out);
			  exit;
			 
			}
			catch (PDOException $e) 
			{
			  print 'Exception : ' . $e->getMessage();
			}	
  }
   public function executeLoadstartup(sfWebRequest $request)
  {
    /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				
				  $db = Doctrine_Manager::getInstance()->getCurrentConnection();
			      $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				  $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
				  
				 // $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
				//  print($business_plan); exit;
				///get parameter id passed
				  $business_plan = $request->getParameter('id');
				  //working if we select all
				  $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM startupexpenses  where business_plan = '$business_plan'  limit 5 ") ;
				  //we select only records belonging to this particular user
				  /*$data =  $db->fetchAssoc("SELECT id, fixed_cost, year1, year2, year3, year4, year5 WHERE business_plan = '$business_plan' FROM costs ") ; */ 
				 // print_r($business_plan); exit;
				 
				 if($data == null)
				 {
				    $query = $db->prepare("INSERT INTO `startupexpenses` (`id`, `business_plan`,  `year1`, `year2`, `year3`, `year4`, `year5`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName')");
					$query->execute();
					 exit;
				}
					
					//else we just show data
				 if($data != null)
				 {
				   $out = array('startupexpenses' => $data) ;
				   
				   echo(json_encode($out)); exit;
				   //$this->redirect('businessplan/new?id='.$company);
				 }
					
					
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  //For Financial Structure
  public function executeSavefinancial(sfWebRequest $request)
  {
      try {
			   $param = $request->getParameter('id');
			   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	           $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
			  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
			   //$company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
			 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
			   $business_plan = $request->getParameter('id');
			    ///
			    $db = Doctrine_Manager::getInstance()->getCurrentConnection(); 
				$query = null;
			  $colMap = array(
			    
				0 => 'local_source',
				1 => 'foreign_source'
			  );
			  
			  if ($_POST['changes']) {
			  
				foreach ($_POST['changes'] as $change) {
				//(0, 0, 79, 987) this is what is returned by changes
				/*from (0, 0, 79, 987) 
				 i noticed that 0 = is the id i.e. rowId, the next 0 is colId, and 79 is old value while 987 is the new value to update 
				
				*/
				 $value1 = $change[0] ; // this is what is used for rowId
				 $value2 = $change[1]; // it is used for columnId
				 $value3 = $change[2]; // this is the old value
				 $value4 = $change[3]; //this is the new value
				 //
				  $column = "";
				  //
				 switch($value2)
				 {
				  case 0:
				   $column = "local_source" ;
				   break;
				  case 1: 
				   $column = "foreign_source" ;
				   break;
				  default:
				  $column = "undefined";
				 }
				 //we will select from table where column value is $change[4] where business_id and created_by belongs to this user,
				 //from that we retrieve the id and use it. we limit result to just 1 
				 
				
				 //
				 $myquery = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id FROM structurefinancial WHERE $column IN ($value3) and business_plan = $business_plan and created_by = $userId LIMIT 1 ") ;
				  $rowId  = 0 ; 
				  foreach($myquery as $myId)
				  {
				   $rowId = $myId['id'] ;
				  } 
			
				  $colId  = $change[1];
				  $newVal = $change[3];
				  
				  if (!isset($colMap[$colId])) 
				  {
					echo "\n spadam";
					continue;
				  }

				
					$query = $db->prepare('UPDATE structurefinancial SET `' . $colMap[$colId] . '` = :newVal, created_by = :userId , updated_by = :userName
					WHERE id = :id and business_plan = :business_plan'); 
					//
					  $query->bindValue(':id',$rowId , PDO::PARAM_INT);
					  $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					  $query->bindValue(':userId', $userId, PDO::PARAM_INT );
					  $query->bindValue(':userName', $userName, PDO::PARAM_STR );
					  $query->bindValue(':business_plan', $business_plan, PDO::PARAM_INT);
					  $query->execute();
				}
			
			  } 

			  $out = array(
				'result' => 'ok'
			  );
			  echo json_encode($out);
			  exit;
			 
			}
			catch (PDOException $e) 
			{
			  print 'Exception : ' . $e->getMessage();
			}	
  }
  public function executeLoadfinancial(sfWebRequest $request)
  {
    /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				
				  $db = Doctrine_Manager::getInstance()->getCurrentConnection();
			      $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				  $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				  //$business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
				  
				//  $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
				 ///get parameter id passed
				  $business_plan = $request->getParameter('id');
				  //working if we select all
				  $data =  $db->fetchAssoc("SELECT id, local_source, foreign_source FROM structurefinancial  where business_plan = '$business_plan'  limit 5 ") ;
				  //we select only records belonging to this particular user
				  /*$data =  $db->fetchAssoc("SELECT id, fixed_cost, year1, year2, year3, year4, year5 WHERE business_plan = '$business_plan' FROM costs ") ; */ 
				 // print_r($business_plan); exit;
				 
				 if($data == null)
				 {
				    $query = $db->prepare("INSERT INTO `structurefinancial` (`id`, `business_plan`,  `local_source`, `foreign_source`,  `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
					(NULL, '$business_plan', 0, 0,  '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName')");
					$query->execute();
					 exit;
				}
					
					//else we just show data
				 if($data != null)
				 {
				   $out = array('financial' => $data) ;
				   
				   echo(json_encode($out)); exit;
				   //$this->redirect('businessplan/new?id='.$company);
				 }
					
					
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  ///// for Employment Created by the Investors Job
  public function executeSavelocal(sfWebRequest $request) // for local jobs
  {
   
     try {
			   $param = $request->getParameter('id');
			   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	           $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
			 //  $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
			 
			//   $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
			 //  $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
			    ///
				 $business_plan = $request->getParameter('id');
			    $db = Doctrine_Manager::getInstance()->getCurrentConnection(); 
				$query = null;
			  $colMap = array(
			    
				0 => 'year1',
				1 => 'year2',
				2 => 'year3',
				3 => 'year4',
				4 => 'year5'
			  );
			  
			  if ($_POST['changes']) {
			  
				foreach ($_POST['changes'] as $change) {
				//(0, 0, 79, 987) this is what is returned by changes
				/*from (0, 0, 79, 987) 
				 i noticed that 0 = is the id i.e. rowId, the next 0 is colId, and 79 is old value while 987 is the new value to update 
				
				*/
				 $value1 = $change[0] ; // this is what is used for rowId
				 $value2 = $change[1]; // it is used for columnId
				 $value3 = $change[2]; // this is the old value
				 $value4 = $change[3]; //this is the new value
				 //
				  $column = "";
				  //
				 switch($value2)
				 {
				  case 0:
				   $column = "year1" ;
				   break;
				  case 1: 
				   $column = "year2" ;
				   break;
				  case 2:
				   $column = "year3" ;
				   break;
				  case 3:
				    $column = "year4" ;
					break;
				  case 4:
				   $column = "year5" ;
				   break;
				  default:
				  $column = "undefined";
				 }
				 //we will select from table where column value is $change[4] where business_id and created_by belongs to this user,
				 //from that we retrieve the id and use it. we limit result to just 1 
				 
				
				 //
				 $myquery = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id FROM employementlocal WHERE $column IN ($value3) and business_plan = $business_plan and created_by = $userId LIMIT 1 ") ;
				  $rowId  = 0 ; 
				  foreach($myquery as $myId)
				  {
				   $rowId = $myId['id'] ;
				  } 
			
				  $colId  = $change[1];
				  $newVal = $change[3];
				  
				  if (!isset($colMap[$colId])) 
				  {
					echo "\n spadam";
					continue;
				  }

				
					$query = $db->prepare('UPDATE employementlocal SET `' . $colMap[$colId] . '` = :newVal, created_by = :userId , updated_by = :userName
					WHERE id = :id and business_plan = :business_plan'); 
					//
					  $query->bindValue(':id',$rowId , PDO::PARAM_INT);
					  $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					  $query->bindValue(':userId', $userId, PDO::PARAM_INT );
					  $query->bindValue(':userName', $userName, PDO::PARAM_STR );
					  $query->bindValue(':business_plan', $business_plan, PDO::PARAM_INT);
					  $query->execute();
				}
			
			  } 

			  $out = array(
				'result' => 'ok'
			  );
			  echo json_encode($out);
			  exit;
			 
			}
			catch (PDOException $e) 
			{
			  print 'Exception : ' . $e->getMessage();
			}	
  }
  public function executeLoadlocal(sfWebRequest $request) //for loading local jobs
  {
     /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				
				  $db = Doctrine_Manager::getInstance()->getCurrentConnection();
			      $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				  $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				//  $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
				
				//  $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
				 ///get parameter id passed
				  $business_plan = $request->getParameter('id');
				  //working if we select all
				  $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM  employementlocal  where business_plan = '$business_plan'  limit 5 ") ;
				  //we select only records belonging to this particular user
				  /*$data =  $db->fetchAssoc("SELECT id, fixed_cost, year1, year2, year3, year4, year5 WHERE business_plan = '$business_plan' FROM costs ") ; */ 
				 // print_r($business_plan); exit;
				 
				 if($data == null)
				 {
				    $query = $db->prepare("INSERT INTO `employementlocal` (`id`, `business_plan`,  `year1`, `year2`, `year3`, `year4`,`year5`,   `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
					(NULL, '$business_plan', 0, 0, 0, 0, 0,  '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName')");
					$query->execute();
					 exit;
				}
					
					//else we just show data
				 if($data != null)
				 {
				   $out = array('local' => $data) ;
				   
				   echo(json_encode($out)); exit;
				   //$this->redirect('businessplan/new?id='.$company);
				 }
					
					
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  //for expatriate jobs
   public function executeSaveforeign(sfWebRequest $request) // for local jobs
  {
   
     try {
			   $param = $request->getParameter('id');
			   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	           $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
			//   $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
			
			 //  $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
			 //  $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
			    ///
				 $business_plan = $request->getParameter('id');
			    $db = Doctrine_Manager::getInstance()->getCurrentConnection(); 
				$query = null;
			  $colMap = array(
			    
				0 => 'year1',
				1 => 'year2',
				2 => 'year3',
				3 => 'year4',
				4 => 'year5'
			  );
			  
			  if ($_POST['changes']) {
			  
				foreach ($_POST['changes'] as $change) {
				//(0, 0, 79, 987) this is what is returned by changes
				/*from (0, 0, 79, 987) 
				 i noticed that 0 = is the id i.e. rowId, the next 0 is colId, and 79 is old value while 987 is the new value to update 
				
				*/
				 $value1 = $change[0] ; // this is what is used for rowId
				 $value2 = $change[1]; // it is used for columnId
				 $value3 = $change[2]; // this is the old value
				 $value4 = $change[3]; //this is the new value
				 //
				  $column = "";
				  //
				 switch($value2)
				 {
				  case 0:
				   $column = "year1" ;
				   break;
				  case 1: 
				   $column = "year2" ;
				   break;
				  case 2:
				   $column = "year3" ;
				   break;
				  case 3:
				    $column = "year4" ;
					break;
				  case 4:
				   $column = "year5" ;
				   break;
				  default:
				  $column = "undefined";
				 }
				 //we will select from table where column value is $change[4] where business_id and created_by belongs to this user,
				 //from that we retrieve the id and use it. we limit result to just 1 
				 
				
				 //
				 $myquery = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id FROM employementforeign WHERE $column IN ($value3) and business_plan = $business_plan and created_by = $userId LIMIT 1 ") ;
				  $rowId  = 0 ; 
				  foreach($myquery as $myId)
				  {
				   $rowId = $myId['id'] ;
				  } 
			
				  $colId  = $change[1];
				  $newVal = $change[3];
				  
				  if (!isset($colMap[$colId])) 
				  {
					echo "\n spadam";
					continue;
				  }

				
					$query = $db->prepare('UPDATE employementforeign SET `' . $colMap[$colId] . '` = :newVal, created_by = :userId , updated_by = :userName
					WHERE id = :id and business_plan = :business_plan'); 
					//
					  $query->bindValue(':id',$rowId , PDO::PARAM_INT);
					  $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					  $query->bindValue(':userId', $userId, PDO::PARAM_INT );
					  $query->bindValue(':userName', $userName, PDO::PARAM_STR );
					  $query->bindValue(':business_plan', $business_plan, PDO::PARAM_INT);
					  $query->execute();
				}
			
			  } 

			  $out = array(
				'result' => 'ok'
			  );
			  echo json_encode($out);
			  exit;
			 
			}
			catch (PDOException $e) 
			{
			  print 'Exception : ' . $e->getMessage();
			}	
  }
  public function executeLoadforeign(sfWebRequest $request) //for loading local jobs
  {
     /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				
				  $db = Doctrine_Manager::getInstance()->getCurrentConnection();
			      $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				  $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				  //$business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
				 
				 // $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
				  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
				  ///get parameter id passed
				  $business_plan = $request->getParameter('id');
				  //working if we select all
				  $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM  employementforeign  where business_plan = '$business_plan'  limit 5 ") ;
				  //we select only records belonging to this particular user
				  /*$data =  $db->fetchAssoc("SELECT id, fixed_cost, year1, year2, year3, year4, year5 WHERE business_plan = '$business_plan' FROM costs ") ; */ 
				 // print_r($business_plan); exit;
				 
				 if($data == null)
				 {
				    $query = $db->prepare("INSERT INTO `employementforeign` (`id`, `business_plan`,  `year1`, `year2`, `year3`, `year4`,`year5`,   `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
					(NULL, '$business_plan', 0, 0, 0, 0, 0,  '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName')");
					$query->execute();
					 exit;
				}
					
					//else we just show data
				 if($data != null)
				 {
				   $out = array('foreign' => $data) ;
				   
				   echo(json_encode($out)); exit;
				   //$this->redirect('businessplan/new?id='.$company);
				 }
					
					
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  //Planned investor company performance save and load functions
  public function executeSaveperformance(sfWebRequest $request)
  {
     try {
			   $param = $request->getParameter('id');
			   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	           $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
			 //  $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
			 
			  // $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
			  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
			    ///
				 $business_plan = $request->getParameter('id');
			    $db = Doctrine_Manager::getInstance()->getCurrentConnection(); 
				$query = null;
			  $colMap = array(
			    
				0 => 'year1',
				1 => 'year2',
				2 => 'year3',
				3 => 'year4',
				4 => 'year5'
			  );
			  
			  if ($_POST['changes']) {
			  
				foreach ($_POST['changes'] as $change) {
				//(0, 0, 79, 987) this is what is returned by changes
				/*from (0, 0, 79, 987) 
				 i noticed that 0 = is the id i.e. rowId, the next 0 is colId, and 79 is old value while 987 is the new value to update 
				
				*/
				 $value1 = $change[0] ; // this is what is used for rowId
				 $value2 = $change[1]; // it is used for columnId
				 $value3 = $change[2]; // this is the old value
				 $value4 = $change[3]; //this is the new value
				 //
				  $column = "";
				  //
				 switch($value2)
				 {
				  case 0:
				   $column = "year1" ;
				   break;
				  case 1: 
				   $column = "year2" ;
				   break;
				  case 2:
				   $column = "year3" ;
				   break;
				  case 3:
				    $column = "year4" ;
					break;
				  case 4:
				   $column = "year5" ;
				   break;
				  default:
				  $column = "undefined";
				 }
				 //we will select from table where column value is $change[4] where business_id and created_by belongs to this user,
				 //from that we retrieve the id and use it. we limit result to just 1 
				 
				
				 //
				 $myquery = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id FROM plannedperformance WHERE $column IN ($value3) and business_plan = $business_plan and created_by = $userId LIMIT 1 ") ;
				  $rowId  = 0 ; 
				  foreach($myquery as $myId)
				  {
				   $rowId = $myId['id'] ;
				  } 
			
				  $colId  = $change[1];
				  $newVal = $change[3];
				  
				  if (!isset($colMap[$colId])) 
				  {
					echo "\n spadam";
					continue;
				  }

				
					$query = $db->prepare('UPDATE plannedperformance SET `' . $colMap[$colId] . '` = :newVal, created_by = :userId , updated_by = :userName
					WHERE id = :id and business_plan = :business_plan'); 
					//
					  $query->bindValue(':id',$rowId , PDO::PARAM_INT);
					  $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
					  $query->bindValue(':userId', $userId, PDO::PARAM_INT );
					  $query->bindValue(':userName', $userName, PDO::PARAM_STR );
					  $query->bindValue(':business_plan', $business_plan, PDO::PARAM_INT);
					  $query->execute();
				}
			
			  } 

			  $out = array(
				'result' => 'ok'
			  );
			  echo json_encode($out);
			  exit;
			 
			}
			catch (PDOException $e) 
			{
			  print 'Exception : ' . $e->getMessage();
			}	
  }
  
  public function executeLoadperformance(sfWebRequest $request) 
  {
     /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				
				  $db = Doctrine_Manager::getInstance()->getCurrentConnection();
			      $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				  $userName  = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				 // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
				
				//  $company =  Doctrine_Core::getTable('InvestmentApplication')->getBusinessName($userId);
				  // $business_plan = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($company);
				  ///get parameter id passed
				  $business_plan = $request->getParameter('id');
				  //working if we select all
				  $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM  plannedperformance  where business_plan = '$business_plan'  limit 5 ") ;
				  //we select only records belonging to this particular user
				  /*$data =  $db->fetchAssoc("SELECT id, fixed_cost, year1, year2, year3, year4, year5 WHERE business_plan = '$business_plan' FROM costs ") ; */ 
				 // print_r($business_plan); exit;
				 
				 if($data == null)
				 {
				    $query = $db->prepare("INSERT INTO `plannedperformance` (`id`, `business_plan`,  `year1`, `year2`, `year3`, `year4`,`year5`,   `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
					(NULL, '$business_plan', 0, 0, 0, 0, 0,  '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName'),
					(NULL, '$business_plan', 0, 0, 0, 0, 0, '2013-03-11 18:19:13', '2013-03-11 18:19:13', '$userId', '$userName')");
					$query->execute();
					 exit;
				}
					
					//else we just show data
				 if($data != null)
				 {
				   $out = array('performance' => $data) ;
				   
				   echo(json_encode($out)); exit;
				   //$this->redirect('businessplan/new?id='.$company);
				 }
					
					
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  public function executeIndex(sfWebRequest $request)
  {
    $this->business_plans = Doctrine_Core::getTable('BusinessPlan')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->business_plan);
  }

  public function executeNew(sfWebRequest $request)
  {
   //now we get the parameter passed by the form and make sure the business exists in the database
   //if not so, we forward to 404
    $this->business_name = $request->getParameter('id');
	$id_value = $request->getParameter('id_value'); 

	///session variable
	sfContext::getInstance()->getUser()->setAttribute('session_business_id',$id_value);
	//print $id_value;
	
	// print "value is ".$id; exit;
		
	//we call a function that will check the business name exist if not we 404
	$query = Doctrine_Core::getTable('InvestmentApplication')->checkBusinessExistance($this->business_name);
	$business = null;
	  foreach($query as $q)
	  { 
	   $business = $q['name'];
	  }
	  //now forward 404
	  if($business == null)
	  {
	  // $this->forward404();
	  //instead of forwarding to 404, we assume this user has not passed step 1 and we redirect him
	  $this->redirect('investmentapp/new');
	  }
	  //we will also check the token for security reasons
	  $token = $request->getParameter('token');
	//we check if this token exist if not, we forward to 404 page
	$query = Doctrine_Core::getTable('InvestmentApplication')->checkToken($token);
	$value = null;
	foreach($query as $q)
	{
	 $value = $q['token'];
	}
	if($value == null)
	{
	 $this->forward404(sprintf('Token Error. The Token used for validation Not found'));
	}
	
	  if($business != null && $value != null)
	  {
	    
	    $this->form = new BusinessPlanForm();
		
	
	  }
   
	
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BusinessPlanForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist  (%s).', $request->getParameter('id')));
	///check investment_id existance
	$investment_id = $request->getParameter('id');
	//set session variable
	$this->getUser()->setAttribute('session_business_id',$investment_id);
	//query this id from businessplan table
	/*$query = Doctrine_Core::getTable('BusinessPlan')->queryForId($investment_id);
	$value = null ;
	///
	foreach($query as $q)
	{
	 $value = $q['investment_id'];
	}
	 //
	 if($value == null)
	 {
	  //error
	  $this->forward404(sprintf('Parameter supplied invalid!' ));
	 }
	 if($value !=null)
	 {
	  //
	// $business_plan = Doctrine_Core::getTable('BusinessPlan');
    
	 }*/
	  $this->form = new BusinessPlanForm($business_plan );
	
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $this->form = new BusinessPlanForm($business_plan);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $business_plan->delete();

    $this->redirect('businessplan/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
	  //before we save we need to check and make sure that we are saving or making a resubmission and avoid sending unneccessary messages or
	  //resaving the same record again.
	  $allFormValues = $request->getParameter($this->form->getName());
	 //access values
      $business_id = $allFormValues['investmentapp_id'];
	  
	  ///
	  $id = Doctrine_Core::getTable('InvestmentResubmission')->checkIdExistance($business_id);
	  //new application
	  if($id == null)
		 {
		   //////
      $business_plan = $form->save();
       try{
     //we send message to the investor informing them of successful application
	 //get the current logged in user email address
				  $email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
				  $receiver = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				  $message = Swift_Message::newInstance()
				  ->setFrom('noreply@rdb.com')
				  ->setTo($email)
				  ->setSubject('Application For Investment Certifcate')
				  ->setBody('We are pleased to inform you that you application for investment certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you');
				  $this->getMailer()->send($message);
				 ///we also send a mail to user inbox account of our system
				  $msg = new Messages();
				  
				  //set message content
				  $sender = "noreply@rdb.com";
				  $receipient = $receiver;
				  $content = "We are pleased to inform you that you application for investment certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you" ;
				  //
				  $msg3 = new Messages();
				  $msg3->sender = $sender;
				  $msg3->recepient = $receipient;
				  $msg3->message = $content ;
				  $msg3->created_at = date('Y-m-d H:i:s');
				  $msg3->save();
				  /////////////Also we add a new notification
				  $notify = new Notifications();
				  //
				  $notify3 = new Notifications();
				  $notify3->recepient = $receipient;
				  $notify3->message = "Your application for investment certificate received";
				  $notify3->created_at = date('Y-m-d H:i:s');
				  $notify3->save();
				  ///we want to also notify managers that this investor has submitted an application for investment certificate so.....
				  //we will use the business plan table for that purpose
				  //get email managers addresses
				  $manageraddresses = array() ;
				  $group = "departmentadmins";
				  $manager = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
				  $managercontent = "A New application for Investment Certificate has been received.\n".
										 "from '$receipient' Please Assign it to a data administrator";
				 $managernotification = "New Application for Investment Certificate";						 
				  //
				  //
				  foreach($manager as $v)
				  {
				    $manageraddresses  [] = $v['email_address'];
					//System Internal Notifications
					//Messages to All Managers
			          $msg->sender = "noreply@rdb.com";
					  $msg->recepient = $v['username'];
					  $msg->message = $managercontent;
					  $msg->created_at = date('Y-m-d H:i:s');
					  
					//Notifications to All Managers
					 $notify->recepient = $v['username'];
				     $notify->message = $managernotification;
				     $notify->created_at = date('Y-m-d H:i:s');
				  }
				   $msg->save();
				   $notify->save();
				  /////we will also notify the supervisors that an application has been submitted and that they should assign it to someone.
				  //get email address for investment supervisors admins
				  $msg2 = new Messages(); //Second object
				  $notify2 = new Notifications(); //second object
				  
					  $investsupervisorsaddresses = array() ;
					  $group = "investmentsupervisors";
					  $supervisors = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
					  $supervisorscontent = "A New application for Investment Certificate has been received.\n".
											 "from '$receipient' Please Assign it to a data administrator";
					 $supervisorsnotification = "New Application for Investment Certificate";
					 //
				 foreach($supervisors as $v)
				  {
				    $investsupervisorsaddresses  [] = $v['email_address'];
					//System Internal Notifications
					//Messages to All Managers
			          $msg2->sender = "noreply@rdb.com";
					  $msg2->recepient = $v['username'];
					  $msg2->message = $managercontent;
					  $msg2->created_at = date('Y-m-d H:i:s');
					  
					//Notifications to All Managers
					 $notify2->recepient = $v['username'];
				     $notify2->message = $supervisorsnotification;
				     $notify2->created_at = date('Y-m-d H:i:s');
				  }
				  //
				   $msg2->save();
				   $notify2->save();
				  //send mail to managers
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$manageraddresses ,
										'New Application for Investment Registration Certificate ',
										"A New application for Investment Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php"
													  ); 
				  //////////////////////////////////////////
				  ///send mail to investment registration supervisors
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$investsupervisorsaddresses ,
										'New Application for Investment Registration Certificate ',
										"A New application for Investment Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php");
				//  $this->getUser()->getAttributeHolder()->clear(); //clear all set attributes
	             /////////////////////////////////////////////////
				 //remove attribute from session
	  $this->getUser()->getAttributeHolder()->remove('session_business_id');
	    $this->redirect('investmentapp/index');
		}
		catch(Exception $ex)
		{
		throw new Exception("Sorry a Server Error Occured while sending emails. More info".$ex->getMessage());
		}
		 }	 
	 //resubmission
	 if($id != null)
		 {
		  try{
		   	   //////
              $business_plan = $form->save();
			  //we notify the data admin who requested for resubmission
			  $admin_id = Doctrine_Core::getTable('InvestmentResubmission')->getCreatedBy($id);
			  //
			  $query = Doctrine_Core::getTable('TaskAssignment')->getUserEmailAddress($admin_id);
			  $admin_name = null ;
			  $admin_email = null ;
			  ////
			  foreach( $query as $q)
			  {
			    $admin_name = $q['username'];
				$admin_email = $q['email_address'];
			  }
			  ///send email
			  $username = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
			  $email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
			  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$admin_email ,
										'Applicant Edited Documents ',
										"'$username' has resubmitted his/her application for investment certificate application. Please 
										login to your account and process it. Link http://198.154.203.38:8234/backend.php ");
			////
			          $msg = new Messages(); 
				      $notify = new Notifications(); 
				  ////notify admin first
				      $msg->sender = "noreply@rdb.com";
					  $msg->recepient = $admin_name ;
					  $msg->message = "'$username' has resubmitted his/her application for investment certificate application. Please 
										login to your account and process it. Link http://198.154.203.38:8234/backend.php ";
					  $msg->created_at = date('Y-m-d H:i:s');
					  ///
					 $notify->recepient = $email;
				     $notify->message = "'$username' has resubmitted his/her application for investment certificate application";
				     $notify->created_at = date('Y-m-d H:i:s');
				       ///
					 $msg->save();
				     $notify->save();
					 ///
					 $notify2 = new Notifications(); 
					 $notify2->recepient = $email;
				     $notify2->message = "Resubmission of Application received";
				     $notify2->created_at = date('Y-m-d H:i:s');
					 $notify2->save();
					 ///
			 $this->getUser()->getAttributeHolder()->remove('session_business_id');
			 $this->redirect('investmentapp/index');
			 }
			 catch(Exception $ex)
				{
				throw new Exception("Sorry a Server Error Occured while sending emails. More info -->".$ex->getMessage());
				}
					 
		 }
	 
    }
  }
}

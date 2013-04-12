<?php

/**
 * eiaProjectSurrounding actions.
 *
 * @package    rdbeportal
 * @subpackage eiaProjectSurrounding
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaProjectSurroundingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_surroundings = Doctrine_Core::getTable('EIAProjectSurrounding')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($projectDescription=Doctrine_Core::getTable('EIAProjectDescription')->find(array($request->getParameter('id')))) && $projectDescription->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectSurroundingForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectSurroundingForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_surrounding = Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSurroundingForm($eia_project_surrounding);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_surrounding = Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSurroundingForm($eia_project_surrounding);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_surrounding = Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding does not exist (%s).', $request->getParameter('id')));
    $eia_project_surrounding->delete();

    $this->redirect('eiaProjectSurrounding/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_surrounding = $form->save();
       ///
	    //get the setAttribute
	  $project_id = $this->getUser()->getAttribute('eiaprojectid');
	  //we also control if it new or edit action to be execute for eiaprojectdeveloper module
	  //
	 $query2 = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->queryForId($project_id);
	 $queried_id = null ;
	 $queried_token = null;
	 foreach($query2 as $q)
	 {
	  $queried_id = $q['id'];
	  $queried_token = $q['token'];
	 }
	// print $queried_id; exit;
	 //
	 if($queried_id != null) //edit, we redirect to editing method
	 {
	 $this->redirect('projectSorroundingSpecies/edit?id='.$queried_id.'&token='.$queried_token);
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
	  $this->redirect('projectSorroundingSpecies/new?id='.$eia_project_surrounding->getId().'&token='.$eia_project_surrounding->getToken());
	 }
	   
	   
	   
	   
	   
      
    }
  }
}

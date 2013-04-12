<?php

/**
 * projectSorroundingSpecies actions.
 *
 * @package    rdbeportal
 * @subpackage projectSorroundingSpecies
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectSorroundingSpeciesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_surrounding_speciess = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_surrounding_species = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_surrounding_species);
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($species=Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id')))) && $species->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectSurroundingSpeciesForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectSurroundingSpeciesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_surrounding_species = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding_species does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSurroundingSpeciesForm($eia_project_surrounding_species);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_surrounding_species = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding_species does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSurroundingSpeciesForm($eia_project_surrounding_species);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_surrounding_species = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding_species does not exist (%s).', $request->getParameter('id')));
    $eia_project_surrounding_species->delete();

    $this->redirect('projectSorroundingSpecies/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_surrounding_species = $form->save();
       ///we get the session value and search for it in the table e_i_a_project_social_economic
	    $project_id = $this->getUser()->getAttribute('eiaprojectid');
		//////////////
		//we also control if it new or edit action to be execute for eiaprojectdeveloper module
	  //
	 $query2 = Doctrine_Core::getTable('EIAProjectSocialEconomic')->queryForId($project_id);
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
	 $this->redirect('projectSocialEconomic/edit?id='.$queried_id.'&token='.$queried_token);
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
	 $this->redirect('projectSocialEconomic/new?id='.$eia_project_surrounding_species->getId().'&token='.$eia_project_surrounding_species->getToken());
	 }
		///////////////
      
    }
  }
}

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
    $this->form = new EIAProjectSurroundingSpeciesForm();
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

      $this->redirect('projectSorroundingSpecies/edit?id='.$eia_project_surrounding_species->getId());
    }
  }
}

<?php

/**
 * projectAttachment actions.
 *
 * @package    rdbeportal
 * @subpackage projectAttachment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectAttachmentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_attachments = Doctrine_Core::getTable('EIAProjectAttachment')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_attachment);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIAProjectAttachmentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectAttachmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id'))), sprintf('Object eia_project_attachment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectAttachmentForm($eia_project_attachment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id'))), sprintf('Object eia_project_attachment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectAttachmentForm($eia_project_attachment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id'))), sprintf('Object eia_project_attachment does not exist (%s).', $request->getParameter('id')));
    $eia_project_attachment->delete();

    $this->redirect('projectAttachment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_attachment = $form->save();

      $this->redirect('projectAttachment/edit?id='.$eia_project_attachment->getId());
    }
  }
}

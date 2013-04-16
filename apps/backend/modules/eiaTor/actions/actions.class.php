<?php

/**
 * eiaTor actions.
 *
 * @package    rdbeportal
 * @subpackage eiaTor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaTorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tor_submits = Doctrine_Core::getTable('TorSubmit')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TorSubmitForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TorSubmitForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tor_submit = Doctrine_Core::getTable('TorSubmit')->find(array($request->getParameter('id'))), sprintf('Object tor_submit does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorSubmitForm($tor_submit);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tor_submit = Doctrine_Core::getTable('TorSubmit')->find(array($request->getParameter('id'))), sprintf('Object tor_submit does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorSubmitForm($tor_submit);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tor_submit = Doctrine_Core::getTable('TorSubmit')->find(array($request->getParameter('id'))), sprintf('Object tor_submit does not exist (%s).', $request->getParameter('id')));
    $tor_submit->delete();

    $this->redirect('eiaTor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tor_submit = $form->save();
	  if($tor_submit->getAttachement())
	  {
		$taskId=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($tor_submit->getEiaprojectId());
		Doctrine_Core::getTable('EITaskAssignment')->find($taskId[0]['id'])->setWorkStatus('assess')->setStage('tor')->save();
	  }

      $this->redirect('@homepage');
    }
  }
}

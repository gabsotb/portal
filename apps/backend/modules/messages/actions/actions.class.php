<?php

/**
 * messages actions.
 *
 * @package    rdbeportal
 * @subpackage messages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class messagesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    /*$this->messagess = Doctrine_Core::getTable('Messages')
      ->createQuery('a')
      ->execute(); */
	  $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
	  //a user can only see messages sent to him/her
	  $this->messagess = Doctrine_Core::getTable('Messages')->retrieveAllMessages($username);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->messages = Doctrine_Core::getTable('Messages')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->messages);
  }

  public function executeNew(sfWebRequest $request)
  {
    // $param = $request->getParameter('value'); 
     $this->form = new MessagesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MessagesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($messages = Doctrine_Core::getTable('Messages')->find(array($request->getParameter('id'))), sprintf('Object messages does not exist (%s).', $request->getParameter('id')));
    $this->form = new MessagesForm($messages);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($messages = Doctrine_Core::getTable('Messages')->find(array($request->getParameter('id'))), sprintf('Object messages does not exist (%s).', $request->getParameter('id')));
    $this->form = new MessagesForm($messages);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($messages = Doctrine_Core::getTable('Messages')->find(array($request->getParameter('id'))), sprintf('Object messages does not exist (%s).', $request->getParameter('id')));
    $messages->delete();

    $this->redirect('messages/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $messages = $form->save();

      //$this->redirect('messages/edit?id='.$messages->getId());
	  $this->redirect('dashboard/index');
    }
  }
}

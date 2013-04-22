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
	if($request->getParameter('user')== 'dataAdmin')
	{
		$this->message=Doctrine_Core::getTable('Messages')->getMessageInvestor();
	}else
	{
		$this->message=Doctrine_Core::getTable('Messages')->getEditMessage();
	}
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
	  if($messages->getRecepientEmail() && $messages->getMessage())
	  {
	  $this->getMailer()->composeAndSend('noreply@rdb.com',$messages->getRecepientEmail() ,$messages->getMessageSubject(),
							"A new message has been sent to your account.\n".
							 "Please login to your account to review it. Use the link below\n".
							 "http://198.154.203.38:8234/"
										  ); 
	  }
	  $this->redirect('dashboard/index');
    }
  }
	public function executeReply(sfWebRequest $request)
	{
		$message = new Messages();
		$message->recepient=$request->getParameter('recepient');
		$message->sender=sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
		$message->sender_email=sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		$message->recepient_email=$request->getParameter('email');
		$message->save();
		$messageId=Doctrine_Core::getTable('Messages')->getMessageId($request->getParameter('recepient'));
		$this->redirect('messages/edit?id='.$messageId[0]['id'].'&user=dataAdmin');
	}
}

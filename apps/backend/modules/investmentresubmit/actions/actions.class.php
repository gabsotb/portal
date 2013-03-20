<?php

/**
 * investmentresubmit actions.
 *
 * @package    rdbeportal
 * @subpackage investmentresubmit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentresubmitActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->investment_resubmissions = Doctrine_Core::getTable('InvestmentResubmission')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_resubmission);
  }

  public function executeNew(sfWebRequest $request)
  {
   $business_id = $request->getParameter('id');
   //trying to use a session and save the id
   sfContext::getInstance()->getUser()->setAttribute('business_id',$business_id);
   $this->forward404Unless($business_id);   
    $this->form = new InvestmentResubmissionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InvestmentResubmissionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id'))), sprintf('Object investment_resubmission does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentResubmissionForm($investment_resubmission);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id'))), sprintf('Object investment_resubmission does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentResubmissionForm($investment_resubmission);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id'))), sprintf('Object investment_resubmission does not exist (%s).', $request->getParameter('id')));
    $investment_resubmission->delete();

    $this->redirect('investmentresubmit/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $investment_resubmission = $form->save();
       //we also remove the variable from session
	  sfContext::getInstance()->getUser()->getAttributeHolder()->remove('business_id');
      $this->redirect('investmentresubmit/edit?id='.$investment_resubmission->getId());
    }
  }
}

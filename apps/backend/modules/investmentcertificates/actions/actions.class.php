<?php

/**
 * investmentcertificates actions.
 *
 * @package    rdbeportal
 * @subpackage investmentcertificates
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentcertificatesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    /*$this->investment_certificates = Doctrine_Core::getTable('InvestmentCertificate')
      ->createQuery('a')
      ->execute(); */
	//we will retrieve the certificates issued by the current logged in user
	$username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
	$this->certificates= Doctrine_Core::getTable('InvestmentCertificate')->getAdminIssuedCerts($username);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_certificate = Doctrine_Core::getTable('InvestmentCertificate')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_certificate);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InvestmentCertificateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InvestmentCertificateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($investment_certificate = Doctrine_Core::getTable('InvestmentCertificate')->find(array($request->getParameter('id'))), sprintf('Object investment_certificate does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentCertificateForm($investment_certificate);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_certificate = Doctrine_Core::getTable('InvestmentCertificate')->find(array($request->getParameter('id'))), sprintf('Object investment_certificate does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentCertificateForm($investment_certificate);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($investment_certificate = Doctrine_Core::getTable('InvestmentCertificate')->find(array($request->getParameter('id'))), sprintf('Object investment_certificate does not exist (%s).', $request->getParameter('id')));
    $investment_certificate->delete();

    $this->redirect('investmentcertificates/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $investment_certificate = $form->save();

      $this->redirect('investmentcertificates/edit?id='.$investment_certificate->getId());
    }
  }
}

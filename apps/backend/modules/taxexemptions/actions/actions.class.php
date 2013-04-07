<?php

/**
 * taxemptions actions.
 *
 * @package    rdbeportal
 * @subpackage taxemptions
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taxexemptionsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    /*$this->tax_exemption_detailss = Doctrine_Core::getTable('TaxExemptionDetails')
      ->createQuery('a')
      ->execute();*/
	  //we get data using a custom method.
	  $status = "not_processed";
	  $this->requests = Doctrine_Core::getTable('TaxExemptionDetails')->getAllTaxExemptionRequests($status);
  }
   public function executeProcess(sfWebRequest $request)
   {
     $this->record_id = $request->getParameter('id');
	 $this->user_name =  $request->getParameter('user');
	 $this->user_id =  $request->getParameter('identity');
	 ///
   }
   //function to accept tax exemption request . saves record  and communitactes with the web services
   public function executeAccept(sfWebRequest $request)
   {
    //accept request
   }
    //function to reject tax exemption request . saves record  and communitactes with the web services
   public function executeReject(sfWebRequest $request)
   {
    //reject request
   }
  public function executeShow(sfWebRequest $request)
  {
    $this->tax_exemption_details = Doctrine_Core::getTable('TaxExemptionDetails')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->tax_exemption_details);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TaxExemptionDetailsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TaxExemptionDetailsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tax_exemption_details = Doctrine_Core::getTable('TaxExemptionDetails')->find(array($request->getParameter('id'))), sprintf('Object tax_exemption_details does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaxExemptionDetailsForm($tax_exemption_details);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tax_exemption_details = Doctrine_Core::getTable('TaxExemptionDetails')->find(array($request->getParameter('id'))), sprintf('Object tax_exemption_details does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaxExemptionDetailsForm($tax_exemption_details);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tax_exemption_details = Doctrine_Core::getTable('TaxExemptionDetails')->find(array($request->getParameter('id'))), sprintf('Object tax_exemption_details does not exist (%s).', $request->getParameter('id')));
    $tax_exemption_details->delete();

    $this->redirect('taxemptions/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tax_exemption_details = $form->save();

      $this->redirect('taxemptions/edit?id='.$tax_exemption_details->getId());
    }
  }
}

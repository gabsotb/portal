<?php

/**
 * businessplan actions.
 *
 * @package    rdbeportal
 * @subpackage businessplan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class businessplanActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->business_plans = Doctrine_Core::getTable('BusinessPlan')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->business_plan);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BusinessPlanForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BusinessPlanForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $this->form = new BusinessPlanForm($business_plan);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $this->form = new BusinessPlanForm($business_plan);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $business_plan->delete();

    $this->redirect('businessplan/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $business_plan = $form->save();

     // $this->redirect('businessplan/edit?id='.$business_plan->getId());
	 //redirect to Dashboard
	 $this->redirect('investmentapp/index');
    }
  }
}
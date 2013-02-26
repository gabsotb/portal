<?php

/**
 * InvestmentApplication form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvestmentApplicationForm extends BaseInvestmentApplicationForm
{
  
   //here we want to get current username and set it to our database using Dependency Injection
  
  public function generateNumbers()
  {
   $numbers = array();
   for ($i = 0; $i < 500; ++$i) 
        {
			$numbers[] = $i;
		}
		return $numbers;
  }
  public function legalNatureValues()
  {
   $natures = array("Private Limited","Private Limited Liability","Public Limited ","Public Limited Liability");
   return $natures;
   
  }
 // protected static $numbers =  generateNumbers();
  
  public function configure()
  {
   //Labels
   $this->widgetSchema->setLabel('created_at', 'Date');
   $this->widgetSchema->setLabel('registration_number','TIN Number');
   $this->widgetSchema->setLabel('name','Company Name');
   //$this->widgetSchema->setLabel('job_created', 'Jobs Created');
   //$this->widgetSchema = new sfWidgetFormSelect(array('choices' => date('Y-m-d H:i:s')));
   //set default date and time
   $this->setDefault('created_at',date('Y-m-d H:i:s')); 
  // unset($this['username_id']);
   //unset some fields
   unset($this['updated_at'], $this['created_by'], $this['updated_by']);
   ////
   //change the application_letter column to file input tag
   $this->widgetSchema->setHelp('application_letter','.doc Supported');
   $this->widgetSchema['application_letter'] = new sfWidgetFormInputFileEditable(array(
   'label'=>'Application Letter',
   'file_src' =>'/uploads/documents'.$this->getObject()->getApplicationLetter(),
   #'is_image' => true,
   'edit_mode' => !$this->isNew(),
   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
   )
   );
   $this->validatorSchema['file_delete'] = new sfValidatorPass();
   //also change the default validator
   $this->validatorSchema['application_letter'] = new sfValidatorFile(array(
   'required' => true,
   'path' =>sfConfig::get('sf_upload_dir').'/documents',
 //  'mime_types'=> 'web_images',
   'mime_types' => array('application/msword',
                    'application/vnd.ms-word',
                    'application/msword',
                    'application/msword; charset=binary')//,
  // 'mime_type_guessers' => array('guessFromFileinfo'),
   
   ),array('invalid' => 'Attached Document Format not Supported!.', 'required' => 'Please Attach Application Letter')
   ); 
   ////
   /////////////////////////////////////////////////////////////////
       $this->widgetSchema->setHelp('incorporation_certificate','.png, jpeg,jpg and gif supported');
      $this->widgetSchema['incorporation_certificate'] = new sfWidgetFormInputFileEditable(array(
   'label'=>'Incorporation Certificate',
   'file_src' =>'/uploads/logos'.$this->getObject()->getIncorporationCertificate(),
   #'is_image' => true,
   'edit_mode' => !$this->isNew(),
   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
   ),array('class' => 'default'));
   $this->validatorSchema['logo_delete'] = new sfValidatorPass();
   //also change the default validator
   $this->validatorSchema['incorporation_certificate'] = new sfValidatorFile(array(
   'required' => false,
   'path' =>sfConfig::get('sf_upload_dir').'/logos',
   'mime_types'=> 'web_images',
   ));
   
   
   ///////////////////////////////////////////////////////////////////////////////
   ////
     ////
   //change the shareholding_list column to file input tag
   $this->widgetSchema->setHelp('shareholding_list','.doc Supported');
   $this->widgetSchema['shareholding_list'] = new sfWidgetFormInputFileEditable(array(
   'label'=>'ShareHolders List',
   'file_src' =>'/uploads/documents'.$this->getObject()->getShareholdingList(),
   #'is_image' => true,
   'edit_mode' => !$this->isNew(),
   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
   )
   );
   $this->validatorSchema['file_delete'] = new sfValidatorPass();
   //also change the default validator
  $this->validatorSchema['shareholding_list'] = new sfValidatorFile(array(
   'required' => true,
   'path' =>sfConfig::get('sf_upload_dir').'/documents',
 //  'mime_types'=> 'web_images',
   'mime_types' => array('application/msword',
                    'application/vnd.ms-word',
                    'application/msword',
                    'application/msword; charset=binary')
				
  // 'mime_type_guessers' => array('guessFromFileinfo'),
   
   ), array('invalid' => 'Attached Document Format not Supported!.', 'required' => 'Please Attach Share Holder List Document')
   ); 
   ////
   /////company logo 
   //
    $this->widgetSchema->setHelp('company_logo','.png, jpeg,jpg and gif supported');
      $this->widgetSchema['company_logo'] = new sfWidgetFormInputFileEditable(array(
   'label'=>'Company Logo',
   'file_src' =>'/uploads/logos'.$this->getObject()->getCompanyLogo(),
   #'is_image' => true,
   'edit_mode' => !$this->isNew(),
   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
   ),array('class' => 'default'));
   $this->validatorSchema['logo_delete'] = new sfValidatorPass();
   //also change the default validator
   $this->validatorSchema['company_logo'] = new sfValidatorFile(array(
   'required' => false,
   'path' =>sfConfig::get('sf_upload_dir').'/logos',
   'mime_types'=> 'web_images',
   ));
   /////// Lets change the Formatte used to create this table to list
   //$this->widgetSchema->setFormFormatterName('list');
   //now let set the job created numbers so that user can just select
   
		
		//print_r ($numbers); exit;
  
   $this->widgetSchema['job_created'] = new sfWidgetFormSelect(array('choices' => self::generateNumbers()));
   $this->widgetSchema['company_legal_nature'] = new sfWidgetFormSelect(array('choices' => self::legalNatureValues()));
   
   
   //validators overriding
  /*$this->setValidators(array(
   'company_name' => new sfValidatorString(array(), array('required' => 'Please Provide Company name')),
   'registration_number' => new sfValidatorString(array(),array('required' => 'The Company Registration Number is Required?')),
   'company_address' => new sfValidatorString(array(),array('required' => 'The Company Address Cannot be Empty')),
   'job_created' => new sfValidatorString(array(),array('required' => 'Please Provide The Number of Jobs Your Investment wil Create')),
   'job_category' => new sfValidatorString(array(),array('required' => 'Please Provide the Jobs Categories Created')),
   'company_legal_nature' => new sfValidatorString(array(),array('required' => 'What is Your company Legal Nature? ')),
   'company_representative' => new sfValidatorString(array(),array('required' => 'Who is your company representatives?')),
   'username_id' => new sfValidatorString(array(),array('required' => 'Logged in User Required?')),
   )); 
  // $this->widgetSchema['company_name']->setValidator = new  sfValidatorString(array(), array('required' => 'Please Provide Company name'));
  $this->validatorSchema->setOption('allow_extra_fields', true);
  $this->validatorSchema->setOption('filter_extra_fields', false); */
  //customize error messages
  $this->validatorSchema['name']  = new sfValidatorString(array(), array('required' => 'Please Provide Company name'));
  $this->validatorSchema['registration_number']  = new sfValidatorString(array(),array('required' => 'The Company Registration Number is Required?'));
  $this->validatorSchema['company_address']  = new sfValidatorString(array(), array('required' => 'The Company Address Cannot be Empty'));
  $this->validatorSchema['job_created']  = new sfValidatorString(array(), array('required' => 'Please Provide The Number of Jobs Your Company wil Create'));
  $this->validatorSchema['job_category']  = new sfValidatorString(array(), array('required' => 'Please Provide the Jobs Categories Created'));
  $this->validatorSchema['company_legal_nature']  = new sfValidatorString(array(), array('required' => 'What is Your company Legal Nature?'));
  $this->validatorSchema['company_representative']  = new sfValidatorString(array(), array('required' => 'Who is your company representatives?'));
  
  }
}

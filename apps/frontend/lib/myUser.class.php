<?php

class myUser extends sfGuardSecurityUser
{
 //set default user culture if a user has no culture
 public function isFirstRequest($boolean = null)
 {
  if(is_null($boolean))
  {
   return $this->getAttribute('first_request', true);
  }
  //
  $this->setAttribute('first_request', $boolean);
 }
 
	public function addResubmissionForm($model,$id)
	{
		$form_id=$this->getAttribute('resubmit',array());
		$form_id[$model]=$id;
		$this->setAttribute('resubmit',$form_id);
		
	}	
	
	/*public function getEiaFormId()
	{
		$ids=$this->getAttribute('id',array());
		if(!empty($ids))
		{
			foreach($ids as $id)
			{
				return $id;
			}
		}
		return array();
	}
	
	public function getEiaFormToken()
	{
		$tokens=$this->getAttribute('token',array());
		if(!empty($tokens))
		{
			foreach($tokens as $token)
			{	
				return $token;
			}
		}
		return array();
	}*/
	
	public function resetResubmissionForm()
	{
		$this->getAttributeHolder()->remove('resubmit');
	}
}
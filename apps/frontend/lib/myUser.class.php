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
 
	/*public function addFormHistory($id,$token)
	{
		$form_id=$this->getAttribute('id',array());
		$form_token=$this->getAttribute('token',array());
		
		if(!in_array($id,$form_id) && !is_array($token,$form_token))
		{
			array_unshift($form_id,$id);
			array_unshift($form_token,$token);
			$this->setAttribute('id',array_slice($form_id,0,1));
			$this->setAttribute('token',array_slice($form_token,0,1));
		}
		
	}	
	
	public function getEiaFormId()
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
	}
	
	public function resetFormHistory()
	{
		$this->getAttributeHolder()->remove('id');
		$this->getAttributeHolder()->remove('token');
	}*/
}
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
}
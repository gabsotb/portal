<?php

/**
 * Tor form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TorForm extends BaseTorForm
{
  public function configure()
  {
	unset(
		$this['created_at'], $this['created_by'],
		$this['updated_at'], $this['updated_by']
	);
  }
}

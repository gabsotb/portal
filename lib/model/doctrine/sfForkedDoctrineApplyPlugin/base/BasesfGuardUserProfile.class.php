<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $email_new
 * @property string $firstname
 * @property string $lastname
 * @property timestamp $validate_at
 * @property string $validate
 * @property string $salutation
 * @property string $citizenship
 * @property string $surname
 * @property string $phone_number
 * @property string $id_passport
 * @property sfGuardUser $User
 * 
 * @method integer            getUserId()       Returns the current record's "user_id" value
 * @method string             getEmailNew()     Returns the current record's "email_new" value
 * @method string             getFirstname()    Returns the current record's "firstname" value
 * @method string             getLastname()     Returns the current record's "lastname" value
 * @method timestamp          getValidateAt()   Returns the current record's "validate_at" value
 * @method string             getValidate()     Returns the current record's "validate" value
 * @method string             getSalutation()   Returns the current record's "salutation" value
 * @method string             getCitizenship()  Returns the current record's "citizenship" value
 * @method string             getSurname()      Returns the current record's "surname" value
 * @method string             getPhoneNumber()  Returns the current record's "phone_number" value
 * @method string             getIdPassport()   Returns the current record's "id_passport" value
 * @method sfGuardUser        getUser()         Returns the current record's "User" value
 * @method sfGuardUserProfile setUserId()       Sets the current record's "user_id" value
 * @method sfGuardUserProfile setEmailNew()     Sets the current record's "email_new" value
 * @method sfGuardUserProfile setFirstname()    Sets the current record's "firstname" value
 * @method sfGuardUserProfile setLastname()     Sets the current record's "lastname" value
 * @method sfGuardUserProfile setValidateAt()   Sets the current record's "validate_at" value
 * @method sfGuardUserProfile setValidate()     Sets the current record's "validate" value
 * @method sfGuardUserProfile setSalutation()   Sets the current record's "salutation" value
 * @method sfGuardUserProfile setCitizenship()  Sets the current record's "citizenship" value
 * @method sfGuardUserProfile setSurname()      Sets the current record's "surname" value
 * @method sfGuardUserProfile setPhoneNumber()  Sets the current record's "phone_number" value
 * @method sfGuardUserProfile setIdPassport()   Sets the current record's "id_passport" value
 * @method sfGuardUserProfile setUser()         Sets the current record's "User" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('email_new', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('firstname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('lastname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('validate_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('validate', 'string', 33, array(
             'type' => 'string',
             'length' => 33,
             ));
        $this->hasColumn('salutation', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('citizenship', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('surname', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('phone_number', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('id_passport', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));


        $this->index('validate', array(
             'fields' => 
             array(
              0 => 'validate',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
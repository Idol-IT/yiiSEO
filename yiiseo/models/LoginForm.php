<?php

Yii::import('yiiseo.components.UserIdentity');

class LoginForm extends CFormModel
{
	public $password;

	private $_identity;

	public function rules()
	{
		return array(
			array('password', 'required'),
			array('password', 'authenticate'),
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		$this->_identity=new UserIdentity('seoyii',$this->password);
		if(!$this->_identity->authenticate())
			$this->addError('password','Incorrect password.');
	}

	/**
	 * Logs in the user using the given password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity('seoyii',$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->userseo->login($this->_identity);
			return true;
		}
		else
			return false;
	}
}

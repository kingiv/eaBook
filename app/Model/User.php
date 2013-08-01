<?php
/**
 * User Model
 *
 */
 //User AuthComponent to has the password.
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	//Validate the input
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
	
	//hash the password before save to the database.
	public function beforeSave($options = array()) {
	  if (isset($this->data[$this->alias]['password'])) {
		  $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	  }
	  return true;
	}
}
?>

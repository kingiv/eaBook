<?php
/**
 * User Controller
 *
 */
class UsersController extends AppController {
    
	//allow everyone to register
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
	
	public function login() {
	  if ($this->request->is('post')) {
		  if ($this->Auth->login()) {
			  $this->redirect($this->Auth->redirect());
		  } else {
			  $this->Session->setFlash(__('Invalid username or password, try again'));
		  }
	  }
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
    
	
	//Register function
    public function add() {
        if ($this->request->is('post')) {
			//Check if password is confirmed by user.
			if($this->request->data['User']['password'] == $this->request->data['User']['confirmpassword']){
			  $this->User->create();
			  if ($this->User->save($this->request->data)) {
				  $this->Session->setFlash(__('The user has been saved'));
				  //After create user account, bring user to login page.
				  $this->redirect(array('action' => 'login'));
			  } else {
				  $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			  }
			}else{
				$this->Session->setFlash(__('Passwords doesn\'t match, please try again.'));
			}
			
        }
    }
	
}
?>
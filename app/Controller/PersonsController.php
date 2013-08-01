<?php
/**
 * Persons Controller
 *
 */
class PersonsController extends AppController {
   public $helpers = array('Html', 'Form');
   
   //list all login user's related contact people information
   public function index() {
        $this->set('persons', $this->Person->find('all',array(
        'conditions' => array('Person.user_id' => $this->Auth->user('id'))
        )));
    }
    
	//Check one contact person's information 
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('No Such Person'));
        }

        $person = $this->Person->findById($id);
        if (!$person) {
            throw new NotFoundException(__('No Such Person'));
        }
		
		//if the contact person is not current user's contact, show error and bring user to list
		if ($person['Person']['user_id'] != $this->Auth->user('id')) {
		  $this->Session->setFlash(__('No Such Person'));
		  $this->redirect(array('action' => 'index'));
	    }
  
  
        $this->set('person', $person);
    }
	
	// Add a new contact person
	public function add() {
        if ($this->request->is('post')) {
			//set current user's id to this new contact person 
			$this->request->data['Person']['user_id'] = $this->Auth->user('id');
            $this->Person->create();
            if ($this->Person->save($this->request->data)) {
                $this->Session->setFlash(__('Person has been saved.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to add Person.'));
            }
        }
    }
	
	//Edit a existed contact person
	public function edit($id = null) {
	  if (!$id) {
		  throw new NotFoundException(__('No Such Person'));
	  }
  
	  $person = $this->Person->findById($id);
	  
	  if (!$person) {
		  throw new NotFoundException(__('No Such Person'));
	  }
	  
	  //If the contact person is not current user's, show error and bring user to list
	  if ($person['Person']['user_id'] != $this->Auth->user('id')) {
		  $this->Session->setFlash(__('No Such Person'));
		  $this->redirect(array('action' => 'index'));
	  }
  
	  if ($this->request->is('post') || $this->request->is('put')) {
		  $this->Person->id = $id;
		  if ($this->Person->save($this->request->data)) {
			  $this->Session->setFlash(__('This person has been updated.'));
			  $this->redirect(array('action' => 'index'));
		  } else {
			  $this->Session->setFlash(__('Unable to update this person.'));
		  }
	  }
  
	  if (!$this->request->data) {
		  $this->request->data = $person;
	  }
   }
   
}
?>

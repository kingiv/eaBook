<?php
/**
 * Addresses Controller
 *
 */
class AddressesController extends AppController {
    public $helpers = array('Html', 'Form');
	
	//List all existed address
	public function index() {
        $this->set('addresses', $this->Address->find('all'));
    }
	
	//show individual address
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Address'));  // no id
        }

        $address = $this->Address->findById($id);
        if (!$address) {
            throw new NotFoundException(__('Invalid Address'));// not find
        }
        $this->set('address', $address);
    }
	
	//Add a address  $pid is contact person's id
	public function add($pid = null) {
        if ($this->request->is('post')) {
			//Build relationship between person and address
			$this->request->data['Address']['owner_id'] = $pid; 
            $this->Address->create();
            if ($this->Address->save($this->request->data)) {
                $this->Session->setFlash(__('Address has been saved.'));
				//once save, bring user go to contact person list.
                $this->redirect(array('controller' => 'persons', 'action' => 'view',$pid));
            } else {
                $this->Session->setFlash(__('Unable to add address.'));
            }
        }
    }
	
	//Edit address id: Address id, $pid: contact person's id
	public function edit($id = null,$pid = null) {
	  if (!$id) {
		  throw new NotFoundException(__('No Such Address'));
	  }
       //find address by id
	  $address = $this->Address->findById($id);
	  if (!$address) {
		  throw new NotFoundException(__('No Such Address'));
	  }
  
	  if ($this->request->is('post') || $this->request->is('put')) {
		  $this->Address->id = $id;
		  if ($this->Address->save($this->request->data)) {
			  $this->Session->setFlash(__('This address has been updated.'));
			  //Once updated address, bring user back to view person page by $pid
			  $this->redirect(array('controller' => 'persons', 'action' => 'view',$pid));
		  } else {
			  $this->Session->setFlash(__('Unable to update this address.'));
		  }
	  }
  
	  if (!$this->request->data) {
		  $this->request->data = $address;
	  }
   }
}
?>

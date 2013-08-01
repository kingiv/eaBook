<?php
/**
 * Organizations Controller
 *
 */
class OrganizationsController extends AppController {
    public $helpers = array('Html', 'Form');
	
	//List all organizations
	public function index() {
        $this->set('organizations', $this->Organization->find('all'));
    }
	
	//View organization infomation
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Organization'));
        }

        $organization = $this->Organization->findById($id);
        if (!$organization) {
            throw new NotFoundException(__('Invalid Organization'));
        }
        $this->set('organization', $organization);
    }
	
	//Add a new organization $pid: contact person's id
	public function add($pid = null) {
		
        if ($this->request->is('post')) {
            $this->Organization->create();
			// Use saveAll will save Organization info and relation id to association table.
            if ($this->Organization->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Organization has been saved.'));
				//once save, bring user go to contact person list.
                $this->redirect(array('controller' => 'persons', 'action' => 'view',$pid));
            } else {
                $this->Session->setFlash(__('Unable to add organization.'));
            }
        }
		
		//pass contact person's id to Organization add View
		$this->set('personid',$pid);
    }
	
	//Edit Organization 
	public function edit($id = null,$pid = null) {
	  if (!$id) {
		  throw new NotFoundException(__('No Such Organization'));
	  }
  
	  $organization = $this->Organization->findById($id);
	  if (!$organization) {
		  throw new NotFoundException(__('No Such Organization'));
	  }
  
	  if ($this->request->is('post') || $this->request->is('put')) {
		  //Save organization infomation
		  $this->Organization->id = $id;
		  $this->Organization->save($this->request->data['Organization']);
		  //Load Address Model to save Address info related to Organization
		  $this->loadModel('Address');
		  //find related address by organization id
		  $a = $this->Address->find('first',array('conditions'=>array('owner_id'=>$id)));
		  //If a existed Address, then update
		  // If a new Address, set type info and owner_id with Organization id and insert.
		  if(isset($a['Address']['id'])){
		    $this->Address->id = $a['Address']['id'];
		  }
		  else
		  {
			 $this->request->data['Address']['type'] = "organization";
			 $this->request->data['Address']['owner_id'] = $id;
		  }
		  
		  if ($this->Address->save($this->request->data['Address'])) {
			  $this->Session->setFlash(__('This organization has been updated.'));
			  //After edit, bring user to view contact person infomation page by $pid
			  $this->redirect(array('controller' => 'persons', 'action' => 'view',$pid));
		  } else {
			  $this->Session->setFlash(__('Unable to update this organization.'));
		  }
	  }
  
	  if (!$this->request->data) {
		  $this->request->data = $organization;
	  }
   }
}
?>
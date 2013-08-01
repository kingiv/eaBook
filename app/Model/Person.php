<?php
/**
 * Persons Model
 *
 */
class Person extends AppModel {
	
	//Set up rule of checking input, this is simple example, user must enter info.
	public $validate = array(
        'firstname' => array(
            'rule' => 'notEmpty'
        ),
        'lastname' => array(
            'rule' => 'notEmpty'
        )
    );
	
	 public $hasOne = array(
        'Address' => array(
            'className' => 'Address',
			'foreignKey' => 'owner_id',
            'conditions' => array('Address.type' => 'person')
			
        )
    );

	
	public $hasAndBelongsToMany = array(
        'Organization' =>
            array(
                'className' => 'Organization',
                'joinTable' => 'organizations_people',
                'foreignKey' => 'person_id',
                'associationForeignKey' => 'organization_id'
            )
    );
	
	public function findPerson(){
		return $this->Person->find();
	}

}
?>

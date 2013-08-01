<?php
/**
 * Address Model
 *
 */
class Address extends AppModel {
	
	//Address belongs to Person and Organization.
	
	public $belongsTo = array(
    'Person' => array(
        'className' => 'person',
        'foreignKey' => 'owner_id',
        'conditions' => array('Address.type' => 'person'),
        'fields' => '',
        'order' => ''
    ),
    'Organization' => array(
        'className' => 'organization',
        'foreignKey' => 'owner_id',
        'conditions' => array('Address.type' => 'organization'),
        'fields' => '',
        'order' => ''
    )
);
}
?>

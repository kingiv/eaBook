<?php
/**
 * Organization Model
 *
 */
class Organization extends AppModel {
	
	//Organization has Address, when search Organization, will find related Address
	public $hasOne = array(
        'Address' => array(
            'className' => 'Address',
			'foreignKey' => 'owner_id',
            'conditions' => array('Address.type' => 'organization')
			
        )
    );
	//Organization has HABTM with Person.
	public $hasAndBelongsToMany = array(
        'Person' =>
            array(
                'className' => 'Person',
                'joinTable' => 'organizations_people',
                'foreignKey' => 'organization_id',
                'associationForeignKey' => 'person_id'
            )
    );
}
?>
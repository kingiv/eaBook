<h1>Add Organization</h1>
<?php
echo $this->Form->create('Organization');
echo $this->Form->input('Organization.name');
echo $this->Form->input(
        'Person.id',
        array('type' => 'hidden', 'value' => $personid)
    ); 

echo $this->Form->input('Address.type', array('type' => 'hidden', 'value' => 'Organization'));
echo $this->Form->input('Address.street');
echo $this->Form->input('Address.city');
echo $this->Form->input('Address.zipcode');
echo $this->Form->input('Address.country');
echo $this->Form->end('Save');
?>
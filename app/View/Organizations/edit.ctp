<h1>Edit Organization</h1>
<?php
echo $this->Form->create('Organization');
echo $this->Form->input('Organization.name');
echo $this->Form->input('Address.street');
echo $this->Form->input('Address.city');
echo $this->Form->input('Address.zipcode');
echo $this->Form->input('Address.country');
echo $this->Form->end('Save');
?>
<h1>Add Address</h1>
<?php
echo $this->Form->create('Address');
echo $this->Form->input('type', array('type' => 'hidden', 'value' => 'Person'));
echo $this->Form->input('street');
echo $this->Form->input('city');
echo $this->Form->input('zipcode');
echo $this->Form->input('country');
echo $this->Form->end('Save');
?>
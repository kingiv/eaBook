<h1>Add Address</h1>
<?php
$options = array();
$options["person"] = "Person";
$options["organization"] = "Organization";
echo $this->Form->create('Address');
echo "Type<br>";
echo $this->Form->select('type', $options);
echo $this->Form->input('street');
echo $this->Form->input('city');
echo $this->Form->input('zipcode');
echo $this->Form->input('country');
echo $this->Form->end('Save');
?>
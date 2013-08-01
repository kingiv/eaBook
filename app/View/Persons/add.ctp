
<h1>Add Person</h1>
<?php
echo $this->Form->create('Person');
echo $this->Form->input('firstname');
echo $this->Form->input('lastname');
echo $this->Form->end('Save');
?>

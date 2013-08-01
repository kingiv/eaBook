<h1>Edit Person</h1>
<?php echo $this->Html->link('Back',
array('controller' => 'persons', 'action' => 'index')); ?>
<?php
  echo $this->Form->create('Person');
  echo $this->Form->input('firstname');
  echo $this->Form->input('lastname');
  echo $this->Form->end('Save');
?>
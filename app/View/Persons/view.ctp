<h1><?php echo $person['Person']['firstname']; ?> <?php echo $person['Person']['lastname']; ?></h1>

<p><small>Created: <?php echo $person['Person']['created']; ?></small></p>

<?php echo $this->Html->link('Edit',
array('controller' => 'persons', 'action' => 'edit', $person['Person']['id'])); ?>

<?php echo $this->Html->link('Back',
array('controller' => 'persons', 'action' => 'index')); ?>

<br><br>
<h1>Address</h1>
<h1>Street: <?php echo $person['Address']['street']; ?></h1>
<h1>City: <?php echo $person['Address']['city']; ?></h1>
<h1>Zip Code: <?php echo $person['Address']['zipcode']; ?></h1>
<h1>Country: <?php echo $person['Address']['country']; ?></h1>

<? if($person['Address']['id'] == "") {
     echo $this->Html->link('Add Address',
array('controller' => 'addresses', 'action' => 'add',$person['Person']['id']));
    }else{
	 echo $this->Html->link('Edit Address',
array('controller' => 'addresses', 'action' => 'edit',$person['Address']['id'],$person['Person']['id']));
		
	}
?>

<br><br>
<h1>Organizations</h1>
<?php foreach ($person['Organization'] as $organization):?>

<h1>Name: <?php echo $organization['name']; ?></h1>
<h1>
<?php echo $this->Html->link('Edit', array('controller' => 'organizations','action' => 'edit', $organization['id'],$person['Person']['id'])); ?>
</h1>

<?php endforeach; ?>
<?php unset($organization); ?>

<?php echo $this->Html->link('Add Organization', array('controller' => 'organizations','action' => 'add', $person['Person']['id'])); ?>
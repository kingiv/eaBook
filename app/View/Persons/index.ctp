<h1>People</h1>
<?php echo $this->Html->link(
    'Add Person',
    array('controller' => 'persons', 'action' => 'add')
);
?>

<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <?php foreach ($persons as $person): ?>
    <tr>
        <td><?php echo $person['Person']['id']; ?></td>
        <td>
            <?php echo $person['Person']['firstname']; ?>
        </td>
        <td><?php echo $person['Person']['lastname']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $person['Person']['id']));  ?>  <?php echo $this->Html->link('View',
array('controller' => 'persons', 'action' => 'view', $person['Person']['id'])); ?>
        </td>
        <td><?php echo $person['Person']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($person); ?>
</table>


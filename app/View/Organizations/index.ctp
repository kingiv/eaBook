<?php echo $this->Html->link(
    'Add Organization',
    array('controller' => 'organizations', 'action' => 'add')
); ?>
<h1>Organization</h1>
<table>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <?php foreach ($organizations as $organization): ?>
    <tr>
        <td><?php echo $this->Html->link($organization['Organization']['id'],
array('controller' => 'organizations', 'action' => 'view', $organization['Organization']['id'])); ?></td>
        <td><?php echo $organization['Organization']['name']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $organization['Organization']['id'])); ?>
        </td>
        <td><?php echo $organization['Organization']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($organization); ?>
</table>


<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
); ?>
<h1>Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $this->Html->link($user['User']['id'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>


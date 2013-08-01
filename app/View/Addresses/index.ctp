<?php echo $this->Html->link(
    'Add Address',
    array('controller' => 'addresses', 'action' => 'add')
); ?>
<h1>Addresses</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Street</th>
        <th>City</th>
        <th>Zip</th>
        <th>Country</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <?php foreach ($addresses as $address): ?>
    <tr>
        <td><?php echo $this->Html->link($address['Address']['id'],
array('controller' => 'addresses', 'action' => 'view', $address['Address']['id'])); ?></td>
        <td><?php echo $address['Address']['type']; ?></td>
        <td><?php echo $address['Address']['street']; ?></td>
        <td><?php echo $address['Address']['city']; ?></td>
        <td><?php echo $address['Address']['zipcode']; ?></td>
        <td><?php echo $address['Address']['country']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $address['Address']['id'])); ?>
        </td>
        <td><?php echo $address['Address']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($address); ?>
</table>


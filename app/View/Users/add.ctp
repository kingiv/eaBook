<div class="users form">
<? echo $this->Session->flash();?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
		echo $this->Form->input('confirmpassword', array('type'=>'password', 'label'=>'Confirmpassword', 'value'=>'', 'autocomplete'=>'off'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="depoimentos form">
<?php echo $this->Form->create('Depoimento'); ?>
	<fieldset>
		<legend><?php echo __('Add Depoimento'); ?></legend>
	<?php
		echo $this->Form->input('animal_id');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('texto');
		echo $this->Form->input('like');
		echo $this->Form->input('deslike');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Depoimentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animai'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>

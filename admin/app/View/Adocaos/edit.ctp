<div class="adocos form">
<?php echo $this->Form->create('Adocao'); ?>
	<fieldset>
		<legend><?php echo __('Edit Adoção'); ?></legend>
	<?php
		echo $this->Form->input('adocao_id');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('animal_id');
		echo $this->Form->input('local');
		echo $this->Form->input('cidade');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Adocao.adocao_id')), array(), __('Você deseja deletar # %s?', $this->Form->value('Adocao.adocao_id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Adocões'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Animal'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="animais form">
<?php echo $this->Form->create('Animai',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Animal'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('peso');
		echo $this->Form->input('pelagem');
		echo $this->Form->input('tamanho');
		echo $this->Form->file('foto');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Animais'), array('action' => 'index')); ?></li>
	</ul>
</div>

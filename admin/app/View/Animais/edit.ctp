<div class="animais form">
<?php echo $this->Form->create('Animai',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Animal'); ?></legend>
	<?php
		echo $this->Form->input('animal_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao');
		echo $this->Form->input('peso');
		echo $this->Form->input('pelagem');
		echo $this->Form->input('tamanho');
		echo $this->Form->file('foto');
		?>
		<img src="../../app/webroot/imagens/<?php echo $this->Form->value('Animai.foto') ?>" width="100" />
		<?php
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Animai.animal_id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Animai.animal_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Animais'), array('action' => 'index')); ?></li>
	</ul>
</div>

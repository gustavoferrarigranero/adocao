<div class="animais view">
<h2><?php echo __('Animai'); ?></h2>
	<dl>
		<dt><?php echo __('Animai Id'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['animal_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Peso'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['peso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pelagem'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['pelagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tamanho'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['tamanho']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<img src="../../app/webroot/imagens/<?php echo h($animai['Animai']['foto']); ?>" width="100" />
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($animai['Animai']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Animai'), array('action' => 'edit', $animai['Animai']['animal_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Animai'), array('action' => 'delete', $animai['Animai']['animal_id']), array(), __('Are you sure you want to delete # %s?', $animai['Animai']['animal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Animais'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animai'), array('action' => 'add')); ?> </li>
	</ul>
</div>

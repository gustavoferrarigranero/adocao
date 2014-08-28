<div class="adocos view">
<h2><?php echo __('Adocao'); ?></h2>
	<dl>
		<dt><?php echo __('Adocao Id'); ?></dt>
		<dd>
			<?php echo h($adoco['Adocao']['adocao_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adoco['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $adoco['Usuario']['usuario_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adoco['Animai']['nome'], array('controller' => 'animais', 'action' => 'view', $adoco['Animai']['animal_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo h($adoco['Adocao']['local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($adoco['Adocao']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($adoco['Adocao']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Adocao'), array('action' => 'edit', $adoco['Adocao']['adocao_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Adocao'), array('action' => 'delete', $adoco['Adocao']['adocao_id']), array(), __('Are you sure you want to delete # %s?', $adoco['Adocao']['adocao_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Adocaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adocao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animal'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
	</ul>
</div>

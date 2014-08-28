<div class="perdidos view">
<h2><?php echo __('Perdido'); ?></h2>
	<dl>
		<dt><?php echo __('Perdido Id'); ?></dt>
		<dd>
			<?php echo h($perdido['Perdido']['perdido_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($perdido['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $perdido['Usuario']['usuario_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animai'); ?></dt>
		<dd>
			<?php echo $this->Html->link($perdido['Animai']['nome'], array('controller' => 'animais', 'action' => 'view', $perdido['Animai']['animal_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo h($perdido['Perdido']['local']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($perdido['Perdido']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($perdido['Perdido']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Perdido'), array('action' => 'edit', $perdido['Perdido']['perdido_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Perdido'), array('action' => 'delete', $perdido['Perdido']['perdido_id']), array(), __('Are you sure you want to delete # %s?', $perdido['Perdido']['perdido_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Perdidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Perdido'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animai'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
	</ul>
</div>

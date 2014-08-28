<div class="depoimentos view">
<h2><?php echo __('Depoimento'); ?></h2>
	<dl>
		<dt><?php echo __('Depoimento Id'); ?></dt>
		<dd>
			<?php echo h($depoimento['Depoimento']['depoimento_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Animai'); ?></dt>
		<dd>
			<?php echo $this->Html->link($depoimento['Animai']['nome'], array('controller' => 'animais', 'action' => 'view', $depoimento['Animai']['animal_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($depoimento['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $depoimento['Usuario']['usuario_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto'); ?></dt>
		<dd>
			<?php echo h($depoimento['Depoimento']['texto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Like'); ?></dt>
		<dd>
			<?php echo h($depoimento['Depoimento']['like']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deslike'); ?></dt>
		<dd>
			<?php echo h($depoimento['Depoimento']['deslike']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Depoimento'), array('action' => 'edit', $depoimento['Depoimento']['depoimento_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Depoimento'), array('action' => 'delete', $depoimento['Depoimento']['depoimento_id']), array(), __('Are you sure you want to delete # %s?', $depoimento['Depoimento']['depoimento_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Depoimentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Depoimento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animai'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>

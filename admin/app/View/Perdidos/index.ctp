<div class="perdidos index">
	<h2><?php echo __('Perdidos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('perdido_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('animal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('local'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($perdidos as $perdido): ?>
	<tr>
		<td><?php echo h($perdido['Perdido']['perdido_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($perdido['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $perdido['Usuario']['usuario_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($perdido['Animai']['nome'], array('controller' => 'animais', 'action' => 'view', $perdido['Animai']['animal_id'])); ?>
		</td>
		<td><?php echo h($perdido['Perdido']['local']); ?>&nbsp;</td>
		<td><?php echo h($perdido['Perdido']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($perdido['Perdido']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $perdido['Perdido']['perdido_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $perdido['Perdido']['perdido_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $perdido['Perdido']['perdido_id']), array(), __('Are you sure you want to delete # %s?', $perdido['Perdido']['perdido_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Perdido'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animai'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
	</ul>
</div>

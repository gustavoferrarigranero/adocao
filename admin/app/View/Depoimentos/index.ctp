<div class="depoimentos index">
	<h2><?php echo __('Depoimentos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('depoimento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('animal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('texto'); ?></th>
			<th><?php echo $this->Paginator->sort('like'); ?></th>
			<th><?php echo $this->Paginator->sort('deslike'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($depoimentos as $depoimento): ?>
	<tr>
		<td><?php echo h($depoimento['Depoimento']['depoimento_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($depoimento['Animai']['nome'], array('controller' => 'animais', 'action' => 'view', $depoimento['Animai']['animal_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($depoimento['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $depoimento['Usuario']['usuario_id'])); ?>
		</td>
		<td><?php echo h($depoimento['Depoimento']['texto']); ?>&nbsp;</td>
		<td><?php echo h($depoimento['Depoimento']['like']); ?>&nbsp;</td>
		<td><?php echo h($depoimento['Depoimento']['deslike']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $depoimento['Depoimento']['depoimento_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $depoimento['Depoimento']['depoimento_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $depoimento['Depoimento']['depoimento_id']), array(), __('Are you sure you want to delete # %s?', $depoimento['Depoimento']['depoimento_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Depoimento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animai'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>

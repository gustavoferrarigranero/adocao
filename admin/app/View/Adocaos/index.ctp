<div class="adocos index">
	<h2><?php echo __('Adoções'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('adocao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('animal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('local'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($adocos as $adoco): ?>
	<tr>
		<td><?php echo h($adoco['Adocao']['adocao_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($adoco['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $adoco['Usuario']['usuario_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($adoco['Animai']['nome'], array('controller' => 'Animais', 'action' => 'view', $adoco['Animai']['animal_id'])); ?>
		</td>
		<td><?php echo h($adoco['Adocao']['local']); ?>&nbsp;</td>
		<td><?php echo h($adoco['Adocao']['cidade']); ?>&nbsp;</td>
		<td><?php echo h($adoco['Adocao']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adoco['Adocao']['adocao_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adoco['Adocao']['adocao_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adoco['Adocao']['adocao_id']), array(), __('Are you sure you want to delete # %s?', $adoco['Adocao']['adocao_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Adocao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Animais'), array('controller' => 'Animais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Animais'), array('controller' => 'animais', 'action' => 'add')); ?> </li>
	</ul>
</div>

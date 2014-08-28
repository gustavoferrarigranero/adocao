<div class="animais index">
	<h2><?php echo __('Animais'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('animal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('peso'); ?></th>
			<th><?php echo $this->Paginator->sort('pelagem'); ?></th>
			<th><?php echo $this->Paginator->sort('tamanho'); ?></th>
			<th><?php echo $this->Paginator->sort('foto'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($animais as $animai): ?>
	<tr>
		<td><?php echo h($animai['Animai']['animal_id']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['nome']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['peso']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['pelagem']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['tamanho']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['foto']); ?>&nbsp;</td>
		<td><?php echo h($animai['Animai']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $animai['Animai']['animal_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $animai['Animai']['animal_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $animai['Animai']['animal_id']), array(), __('Are you sure you want to delete # %s?', $animai['Animai']['animal_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Animai'), array('action' => 'add')); ?></li>
	</ul>
</div>

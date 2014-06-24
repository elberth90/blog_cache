<?php echo $this->Html->css('admin/index.css'); ?>


<div class="datagrid">
	<table>
		<thead><tr><th>Tytuł</th><th>Treść</th><th></th><th></th></tr></thead>
		<tbody>
		<?php $i = 1; ?>
		<?php foreach($postList as $post): ?>
			<?php $class = ($i%2 == 0) ? "alt" : ""; ?>
			<tr class="<?php echo $class; ?>">
				<td><?php echo $post['Post']['title']; ?></td>
				<td><?php echo $post['Post']['body']; ?></td>
				<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?></td>
				<td><?php echo $this->Html->link('Delete', array('action' => 'delete', $post['Post']['id']), array(), "Are you sure you wish to delete this post?"); ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
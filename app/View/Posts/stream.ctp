<?php echo $this->Html->css(array("posts/post")); ?>

<div id="streamContainer">
	<?php foreach($postList as $post) : ?>
		<?php echo $this->element('post', array('post' => $post)); ?>
	<?php endforeach; ?>

	<div id="loadMoreContainer">
		<?php $button = '<div class="greenButton">Load More</div>'; ?>
		<?php echo $this->Html->link($button, array('action' => 'stream', $lastId), array('escape' => false)); ?>
	</div>
</div>

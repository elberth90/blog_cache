<nav class="menu">
	<ul>
		<?php foreach($menu as $key => $value): ?>
			<?php $class = ""; ?>
			<?php if(isset($value['clicked']) && $value['clicked'] == true): ?>
				<?php $class = "clicked"; ?>
			<?php endif; ?>

			<li class=<?php echo $class ?> ><?php echo $this->Html->link($value['text'], $value['link']); ?></li>
		<?php endforeach; ?>
	</ul>
</nav>
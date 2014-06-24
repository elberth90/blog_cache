<?php echo $this->Html->css(array("posts/view")); ?>

<div id="postWrapper">
	<div id="postWrapperTop">
		<div class="postContainer">
			<div class="dateContainer">
				<div class="dateCircle">
					<span><?php echo $post['Post']['created']; ?></span>
				</div>
			</div>
			<div class="postMiddleContainer">
				<div class="infoContainer">
					<div class="postCategoryContainer">
						<div class="pointsCategoryContent">
							cat : 
							<span><?php echo $post['Post']['category']; ?></span>
						</div>
					</div>
					<div class="postLikes">
						<div class="likesIcon"></div>
						<span><?php echo $post['Post']['likes']; ?> Likes</span>
					</div>
					<div class="postComments">
						<div class="commentsIcon"></div>
						<span><?php echo $post['Post']['comments']; ?> Comments</span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="postMainContent">
					<div class="postTitle"><?php echo $post['Post']['title']; ?></div>
					<div class="postContent"><?php echo $post['Post']['body']; ?></div>
				</div>
				<div class="tags"><span>TAGS </span><?php echo $post['Post']['tags']; ?></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="postWrapperDown">
		<div id="bigCommentBox">
			<?php echo $post['Post']['comments']; ?> Comments
		</div>

		<?php if(!$isFirst): ?>
			<div id="nextPostWrapper">
				<?php $nextDiv = '<div class="greenButton">Next Stories ></div>'; ?>
				<?php echo $this->Html->link($nextDiv, array('action' => 'next', $post['Post']['id']), array('escape' => false)); ?>
			</div>
		<?php endif; ?>

		<?php if(!$isLast): ?>
			<div id="prevPostWrapper">
				<?php $prevDiv = '<div class="greenButton">Prev Stories <</div>'; ?>
				<?php echo $this->Html->link($prevDiv, array('action' => 'prev', $post['Post']['id']), array('escape' => false)); ?>
			</div>
		<?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div>
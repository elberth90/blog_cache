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
			<div class="readMore">
				<?php echo $this->Html->link('Read More', array('action' => 'view', $post['Post']['id'])); ?>
				<div class="readMoreShadow"></div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
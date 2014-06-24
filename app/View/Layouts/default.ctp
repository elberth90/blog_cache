<!DOCTYPE html>
<?php echo "<html manifest='".$this->webroot."manifest.appcache' type='text/cache-manifest'>"; ?>
	<head>
		<?php echo $this->Html->css(array("reset", "layout/layout", "layout/menu")); ?>
		<?php echo $this->Html->script('cache.js'); ?>
	</head>
	<body>
		<section id="header">
			<div id="banner"></div>
			<?php echo $this->element("menuContainer"); ?>
			<div id="headerLine"></div>
			<div id="helloContainer">
				Witaj na moim blogu !!
				<div class="helloLine"></div>
				<div class="helloLine"></div>
			</div>
		</section>

		<section id="mainContentContainer">
			<?php echo $this->fetch('content'); ?>
		</section>
		<section id="footer"></section>
	</body>
</html>
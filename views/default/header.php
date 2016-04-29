<!doctype html>
<html>
	<head>
		<!-- Include dynamic Meta start -->
		<?php 
			foreach($meta as $m):
				$meta= expand_meta($m); 
				if(!empty($meta)): ?>
					<meta <?php echo $meta; ?> />
				<?php endif; ?>
				<?php echo isset($m['name']) && ($m['name'] == 'title')? '<title>'.$m['content'].'</title>':'';?>
				<?php
			endforeach;
		?>
		<!-- Meta end -->
		<!-- Include CSS -->
		<link rel="icon" type="image/png" href="images/fav.png">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- Include dynamic CSS start -->
		<?php 
			foreach($css as $l):
				$link = expand_css($l); ?>
				<?php if(!empty($link)): ?>
					<link type="text/css" <?php echo $link; echo isset($l['rel'])? ' rel="'.$l['rel'].'"': ' rel="stylesheet"';?> />
				<?php endif; ?>
				<?php
			endforeach;
		?>
		<!-- CSS end -->
		<!-- Include dynamic JS start -->
		<?php
			foreach($js as $s):
				$script = expand_js($s); ?>
				<?php if(!empty($script)): ?>
					<script type="text/javascript" <?php echo $script; ?>></script>
				<?php endif; ?>
				<?php
			endforeach;
		?>
		<!-- JS end -->
	</head>
	<body> <!-- body start -->


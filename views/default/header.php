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
			<link href="<?php echo get_layout_url('css')?>/style.css" media="screen" rel="stylesheet"/>
			<link href="<?php echo get_layout_url('css')?>/style-step.css" media="screen" rel="stylesheet"/>
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
		<!-- Include JS script -->
			<script src="<?php echo get_layout_url('js')?>/jquery-1.11.3.min.js" type="text/javascript"></script>
			<script src="<?php echo get_layout_url('js')?>/common.js" type="text/javascript"></script>
			<script src="<?php echo get_layout_url('js')?>/yav/yav-config.js" type="text/javascript"></script>
			<script src="<?php echo get_layout_url('js')?>/yav/yav.js" type="text/javascript"></script>
			<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script type="text/javascript">
				var js_base_url = "<?php echo base_url(); ?>";
				var currency_sign = "<?php echo CURRENCY_SIGN; ?>";
			</script>
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


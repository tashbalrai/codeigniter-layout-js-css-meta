<!-- Include dynamic JS start -->
<?php
foreach($js as $s):
  $script = expand_js($s, 'bottom');
?>
<?php if(!empty($script)): ?>
<script type="text/javascript" <?php echo $script; ?>></script>
<?php endif; ?>
<?php
endforeach;
?>
<!-- JS end -->
</body>
<!-- body end -->
</html>

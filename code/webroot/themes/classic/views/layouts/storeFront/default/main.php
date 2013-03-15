<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	$this->widget('FrontHeadStyle');
?>
<body>
<!-- <{if $com.jsbook&&$smarty.get.action!='mail'}>
<script src="api/mail_box_js.php?uid=<{$com.userid}>&action=<{$smarty.get.action}>" type=text/javascript></script>
<{/if}> -->

<div id="header">
<?php
$this->widget('FrontHeader');
?>
</div>

<div id="main">
<?php $this->widget('FrontFlash'); ?>
	<div class="tp"></div>
    <div id="menu">
		<?php
			$this->widget('FrontLeftMenu');
		?>
    </div>
    <div id="content">
    	<?php echo $content;?>
    </div>
</div>

<div id="bottom">
<?php $this->widget('FrontBottom');?>
</div>
<?php $this->widget('FrontQQOnline');?>
<?php $this->widget('CommonFooterWidget');?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	$this->widget('FrontHeadStyle');
?>
<body>
<{if $com.jsbook&&$smarty.get.action!='mail'}>
<script src="api/mail_box_js.php?uid=<{$com.userid}>&action=<{$smarty.get.action}>" type=text/javascript></script>
<{/if}>
<div id="top">
<?php 
$this->widget('FrontTop');
?>
</div>
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
		<script src='<{$config.weburl}>/api/ad.php?id=46&catid=<{$smarty.get.id}>&sname=<{$sname}>'></script>
    	<?php echo $content;?>
    </div>
</div>

<div id="bottom">
<?php $this->widget('FrontBottom');?>
</div>
<script>
function myAddPanel()
{
	var title="<{$config.company}>";
	var url="<{$config.weburl}>";
	var desc="<{$config.company}>";
	
	if ((typeof window.sidebar == 'object') && (typeof window.sidebar.addPanel == 'function'))
		window.sidebar.addPanel(title,url,desc);
	else
		window.external.AddFavorite(url,title);
}
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_service" class="pg-layout">

<?php $this->widget('TopWidget');?>
<div class="layout head">
<div class="m-logo">
		<a class="logo" href="/index.php?r=site/index" target="_self"><img src="/images/logo.jpg" alt="zzz" title="xxx.com - xxxx"></a>
	</div>
	<div class="clearfix"></div>
	<?php $this->widget('NavigationWidget');?>
</div>

<div class="layout main">

	<div class="grid-700">
		
<?php echo $content?>
	</div>
	<div class="grid-254">
	
<?php $this->widget('ServiceContact');?>
</div>
	</div>
	
	</div>
		
	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	

</div>


</div>
<?php $this->widget("CommonFooterWidget");?>
</body>
</html>

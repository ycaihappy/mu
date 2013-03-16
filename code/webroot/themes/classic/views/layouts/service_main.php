<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_service" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<div class="m-logo">
		<a target="_self" href="<?php echo $this->createUrl('/site/index')?>" class="logo"><img title="mushw.com - 钼市网" alt="zzz" src="/images/logo.jpg"></a>
	</div>
	<div class="logo-side-title"><img src="/images/service_title.gif" /></div>
	

</div>

<div class="layout main">
	<div class="m-service">
	<div class="hd"></div>
	<div class="bd">
	
	<div class="grid-720">
		
<?php echo $content?>
	</div>
	<div class="grid-230">
	
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
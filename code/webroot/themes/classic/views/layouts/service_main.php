<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_service" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('NavigationWidget');?>
</div>

<div class="layout main">
	<div class="m-service">
	<div class="hd"></div>
	<div class="bd">
	<div class="ui-m-crumb">
		<p>您当前位置：<a>钼服务</a><em>&gt;</em><span>客户服务</span></p>
	</div>
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

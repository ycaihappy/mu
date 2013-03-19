<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_xh_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
	<!--news nav-->
	<?php $this->widget('NavigationWidget');?>
	<!--news nav-->
	
</div>

<div class="layout main">

	<div class="layout-area">
		<?php echo $content;?>
	</div>
	
	<div class="layout-area">
	<?php $this->widget("FriendLinkWidget");?>
	</div>
	
	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	

</div>




</div>




<?php 
$this->widget("CommonFooterWidget");
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>


<div id="p_hq_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
	<!--news nav-->
	
	<?php $this->widget('NavigationWidget');?>
	
	
	
	<!--news nav-->
	
		<div class="m-banner">
			<img src="<?php echo '/images/advertisement/'.$this->adv[0]->ad_media_src?>" width="960" height="80" />
		</div>
	
</div>

<div class="layout main">

<?php echo $content;?>
	
	<div class="layout-area">
		<?php $this->widget("FriendLinkWidget");?>
	</div>
	
	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	

</div>


</div>



<?php $this->widget("CommonFooterWidget");?>
</body>
</html>

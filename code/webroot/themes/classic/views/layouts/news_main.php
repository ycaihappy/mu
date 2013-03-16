<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>


<div id="p_news_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
	<?php $this->widget('NavigationWidget');?>
</div>

<div class="layout main">
<?php if($this->breadcrumbs):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'homeLink'=>false,
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
<?php endif?>
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

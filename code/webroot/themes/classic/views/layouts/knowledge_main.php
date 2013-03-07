<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>


<div id="p_hq_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
	<!--news nav-->
	
	
	<div class="m-news-nav">
		<div class="nav">
		<ul>
                <li class="bgnone"><a href="<?php echo $this->createUrl('knowledge/list');?>" title="首页">钼百科</a></li>
                <li> <a href="<?php echo $this->createUrl('knowledge/list',array('subcategory_id'=>66));?>">钼用途</a></li>
		        <li><a href="<?php echo $this->createUrl('knowledge/list',array('subcategory_id'=>63));?>">国际标准</a></li>
		        <li><a href="<?php echo $this->createUrl('knowledge/list',array('subcategory_id'=>64));?>">国内标准</a></li>
		        <li><a href="<?php echo $this->createUrl('knowledge/list',array('subcategory_id'=>65));?>">生产工艺</a></li>
		        <li> <a href="<?php echo $this->createUrl('knowledge/list',array('subcategory_id'=>67));?>">钼产品</a></li>
		        <li> <a href="<?php echo $this->createUrl('knowledge/list',array('subcategory_id'=>68));?>">钼应用</a></li>

                </ul>
		</div>
	</div>
	
	
	
	<!--news nav-->
	
		<div class="m-banner">
			<img src="images/960x100.gif" width="960" height="80" />
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

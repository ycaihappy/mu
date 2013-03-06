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
                <li class="bgnone"><a href="" title="首页">行情首页</a></li>
                <li> <a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>58));?>">当日报价</a></li>
		        <li><a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>59));?>">价格汇总</a></li>
		        <li><a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>37));?>">国际行情</a></li>
		        <li><a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>36));?>">国内行情</a></li>
		        <li> <a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>60));?>">市场评论</a></li>
		        <li> <a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>61));?>">分析预测</a></li>
				<li> <a href="<?php echo $this->createUrl('price/list',array('subcategory_id'=>62));?>">钼走势</a></li>

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

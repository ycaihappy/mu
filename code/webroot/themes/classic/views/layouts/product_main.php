<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_xh_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
	<!--news nav-->
	
	
	<div class="m-news-nav">
		<div class="nav">
		<ul>
                	<li class="bgnone"><a href="<?php $this->createUrl('/site/index')?>" title="首页">首页</a></li>
                    <li><a href="<?php echo $this->createUrl('/news/index')?>" title="钼市网新闻中心">新闻中心</a></li>
                    <li><a href="<?php echo $this->createUrl('/price/index')?>" title="钼市网行情资讯">行情资讯</a></li>
                    <li><a href="<?php echo $this->createUrl('/supply/index')?>" title="钼市网供求">供应求购</a></li>
                    <li><a href="<?php echo $this->createUrl('/knowledge/list')?>" title="钼市网钼百科">钼百科</a></li>
                    <li><a href="<?php echo $this->createUrl('/service/index')?>" title="钼服务">钼服务</a></li>
                    <li><a href="<?php echo $this->createUrl('/product/index',array('bigType'=>28))?>" title="钼服务">钼初级</a></li>
                    <li><a href="<?php echo $this->createUrl('/product/index',array('bigType'=>29))?>" title="钼化工">钼化工</a></li>
                    <li><a href="<?php echo $this->createUrl('/product/index',array('bigType'=>30))?>" title="钼制品">钼制品</a></li>
                    <li><a href="<?php echo $this->createUrl('/product/index',array('bigType'=>56))?>" title="钼制品">钼终极</a></li>
                </ul>
		</div>
	</div>
	
	
	
	<!--news nav-->
	
</div>

<div class="layout main">

	<div class="layout-area">
		
		<?php 
		$this->widget('ProductIndexLeftWidget');
		?>
		<!--left-->
		<!--right-->

		<?php echo $content;?>

		<!--right-->
	
		
		<div class="clearfix"></div>
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
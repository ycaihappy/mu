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
                	<li class="bgnone"><a href="<?php $this->createUrl('/supply/index')?>" title="供求首页">供求首页</a></li>
                    <li><a href="<?php echo $this->createUrl('/supply/list',array('type'=>1))?>" title="供应">供应</a></li>
                    <li><a href="<?php echo $this->createUrl('/supply/list',array('type'=>2))?>" title="求购">求购</a></li>
                    <li><a href="<?php echo $this->createUrl('/supply/list',array('type'=>3))?>" title="特价">特价</a></li>
                    <li><a href="<?php echo $this->createUrl('/product/index')?>" title="现货资源">现货资源</a></li>
                    <li><a href="<?php echo $this->createUrl('/price/index')?>" title="行情中心">行情中心</a></li>
                    <li><a href="<?php echo $this->createUrl('/knowledge/list')?>" title="钼百科">钼百科</a></li>
                    <li><a href="<?php echo $this->createUrl('/news/index')?>" title="钼百科">新闻资讯</a></li>
                </ul>
		</div>
	</div>
	
	
	
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
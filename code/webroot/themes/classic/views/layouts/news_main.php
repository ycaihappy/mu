<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>


<div id="p_news_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
		<div class="m-news-nav">
		<div class="nav">
		<ul>
			<li><a href="<?php echo $this->createUrl('site/index')?>">首页</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>41))?>">社会热点</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>40))?>">本网视点</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>47))?>">区域新闻</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>42))?>">行业动态</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>35))?>">国内新闻</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>34))?>">国际新闻</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>48))?>">分析评论</a></li>
			<li><a href="<?php echo $this->createUrl('list',array('subcategory_id'=>49))?>">网站动态</a></li>
			
		</ul>
		</div>
	</div>
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

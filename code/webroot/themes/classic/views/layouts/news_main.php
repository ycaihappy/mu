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
		<div class="m-link">
			<div class="hd">
				<span>友情链接</span>
				<p>欢迎电子工业欢迎电子工业欢迎电子工业<em>(加QQ时请通过)</em></p>
				<div class="clearfix"></div>
				<div class="link-list">
					<a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="layout-area">
		<div class="m-footer">
		<p class="first"><a>公司简介</a> | <a>广告服务</a> | <a>联系方式</a> | <a>服务项目</a> | <a>公司动态</a> | <a>工作机会</a> | <a>网站地图</a> | <a>公司简介</a> | <a>公司简介</a> | <a>公司简介</a></p>
		<p>客服热线：400-0000-0000  0766-1111111 / 11111111 / 1111111 传真：0443-11111111</p>
		<p>Copyright &copy; 1998 - 2012 中国XX网 All Rights Reserved</p>
		<p>全国咨询/投诉电话：400-000-0000   E-mail:kf@xxxx.com ICP证1003232</p>
		
		<p class="fa"> <a class="fa1" target="_blank" href="http://www.cqc.com.cn"></a> <a class="fa2" target="_blank" href="http://www.smestar.com/detail.credit?action=preLevel&amp;credcode=NO.20000001143"></a> <a class="fa3" target="_blank" href="http://www.e-315.org"></a> <a class="fa4" target="_blank" href="http://www.isc.org.cn"></a> <a class="fa5" target="_blank" href="http://www.ec.org.cn"></a> <a class="fa6" target="_blank" href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1697657781"></a> 
	</p>
		
		</div>
	</div>
	

</div>




</div>




<script src="js/jquery.1.8.min.js"></script>
<script src="js/config.js"></script>
<script src="js/global.js"></script>
<script src="js/init.js"></script>
</body>
</html>

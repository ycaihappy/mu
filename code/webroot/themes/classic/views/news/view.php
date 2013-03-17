
<div id="p_article_detail" class="pg-layout">

<div class="layout main">
	
<?php 
$this->widget("BreadCrumbWidget", array('crumbs'=>array(
    array('name'=>'新闻中心','link'=>'#'),
    array('name'=>'新闻详细', 'link'=>'#')
)));
?>

	<div class="layout-area">
	
	<div class="layout-left">
		<?php $this->widget("NewsDetailWidget");?>

      <div class="banner_new2"><a target="_blank" href="http://cp.sznews.com/page/html/k3/"><img width="700" height="100" src="images/20130221_caipiao.gif"></a></div>
		<!--relate news-->
		<?php $this->widget("NewsRelateWidget");?>
		<!--relate news-->
	</div>
	
	<div class="layout-right">
	<?php $this->widget("NewsRecommendWidget",array('type'=>1));?>
	<?php $this->widget("NewsRecommendWidget",array('type'=>2));?>
	
	</div>

    </div>
	
</div>

</div>


<div id="p_article_detail" class="pg-layout">

<div class="layout main">
	
    <?php $this->widget("BreadCrumbWidget", array('crumbs'=>array(
    array('name'=>'新闻中心','link'=>'#'),
    array('name'=>'新闻详细', 'link'=>'#')
    )));?>

	<div class="layout-area">
	
	<div class="layout-left">
        <?php $this->widget("NewsDetailWidget");?>
	</div>
	<div class="layout-right">
	        <?php $this->widget("NewsRecommendWidget");?>
	</div>

    </div>
	
</div>

</div>

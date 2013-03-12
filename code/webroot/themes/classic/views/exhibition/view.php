
<div id="p_article_detail" class="pg-layout">

<div class="layout main">
	
	<div class="layout-area">
	
	<div class="layout-left">
		<?php $this->widget("NewsDetailWidget");?>

      <div class="banner_new2"><a target="_blank" href="http://cp.sznews.com/page/html/k3/"><img width="671" height="100" src="/images/20130221_caipiao.gif"></a></div>
		<!--relate news-->
		<?php $this->widget("NewsRelateWidget");?>
		<!--relate news-->
	</div>
	
	<div class="layout-right">
	<?php $this->widget("ExhibitionRecommendWidget",array('type'=>2));?>
	<?php $this->widget("ExhibitionRecommendWidget",array('type'=>3));?>
	
	</div>

    </div>
	
</div>

</div>

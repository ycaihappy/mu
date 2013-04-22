	<div class="m-logo">
		<a target="_self" href="<?php echo $this->getController()->createUrl('/site/index')?>" class="logo"><img title="xxx.com - xxxx" alt="zzz" src="/images/logo.jpg"></a>
	</div>
	<div class="m-search" id="J_SearchForm">
		<div class="search-triggers">
			<ul class="switchable-nav clearfix">
			  <li class="selected" data-type="1"><a href="javascript:void(0);">现货</a></li>
			  <li data-type="2"><a href="<?php echo $this->getController()->createUrl('/news/index')?>">新闻</a></li>
			  <li data-type="3"><a href="<?php echo $this->getController()->createUrl('/price/index')?>">行情</a></li>
			  <li data-type="4"><a href="<?php echo $this->getController()->createUrl('/supply/index')?>">供求</a></li>
			  <li data-type="5"><a href="<?php echo $this->getController()->createUrl('/knowledge/index')?>">钼百科</a></li>
			</ul>
		 </div>
		 <div class="search-box">
		 <span>产品</span>
			<form method='post' name="search" action="<?php echo $this->getController()->createUrl('product/index')?>" >
			 <input name="type" value="1" type="hidden" />
			  <div class="search-panel-fields">       
				<input autocomplete="off" autofocus="true" accesskey="s" name="keyword" id="q" value=<?php echo Yii::app()->request->getParam('keyword')?>>
				<s></s>
			  </div>
			  <button type="submit" class="btn-search">搜 索</button>			 
			 </form>
		 </div>
		 <div class="hottag">
			<label>热门关键字：</label><a>钼钢</a><a>钼钢</a><a>钼钢</a><a>钼钢</a>
		 </div>
	</div>
	<div class="tel-box">
		<div class="tel"><em>咨询电话：</em><strong>400-25263550</strong></div>
		<div class="chat"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=123458745&site=qq&menu=yes" class="qq"><img border="0" src="http://wpa.qq.com/pa?p=2:123458745:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></div>
	</div>
	<div class="clearfix"></div>

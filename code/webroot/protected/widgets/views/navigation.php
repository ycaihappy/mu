	<div class="m-nav">
		<div class="bd">
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('news/index');?>">新闻资讯</a></strong>
			<p>
            <a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>1));?>">国际</a><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>2));?>">国内</a><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>3));?>">热点</a><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>4));?>">行业</a>
			</p>
			<i class="sp"></i>
			</div>
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('supply/index',array('type'=>1));?>">现货供求</a></strong><p>
            <a href="<?php echo Yii::app()->controller->createUrl('product/index');?>">钼现货</a><a href="<?php echo Yii::app()->controller->createUrl('supply/index',array('type'=>1));?>">钼供应</a><a href="<?php echo Yii::app()->controller->createUrl('supply/index',array('type'=>2));?>">钼求购</a></p>
			<i class="sp"></i>
			</div>
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('price/index');?>">价格行情</a></strong><p>
           <a href="<?php echo Yii::app()->controller->createUrl('price/index');?>">当日价</a><a href="">现货价</a><a href="">钼行情</a><a href="">钼走势</a></p>
			<i class="sp"></i>
			</div>
			
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>5));?>">钼百科</a></strong><p>
            <a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>6));?>">钼用途</a><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>7));?>">钼国际</a><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>8));?>">钼治炼</a><a href="<?php echo Yii::app()->controller->createUrl('news/index',array('type'=>9));?>">钼化工</a></p>
			</div>
		</div>
	</div>

	<div class="m-nav">
		<div class="bd">
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('news/index');?>">新闻资讯</a></strong>
			<p>
            <a href="<?php echo Yii::app()->controller->createUrl('news/list',array('subcategory_id'=>34));?>">国际</a>
            <a href="<?php echo Yii::app()->controller->createUrl('news/list',array('subcategory_id'=>34));?>">国内</a>
            <a href="<?php echo Yii::app()->controller->createUrl('news/list',array('subcategory_id'=>41));?>">热点</a>
            <a href="<?php echo Yii::app()->controller->createUrl('news/list',array('subcategory_id'=>42));?>">行业</a>
			</p>
			<i class="sp"></i>
			</div>
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('product/index');?>">现货供求</a></strong><p>
            <a href="<?php echo Yii::app()->controller->createUrl('supply/index');?>">供应求购</a>
            <a href="<?php echo Yii::app()->controller->createUrl('product/index',array('bigType'=>28));?>">钼初级</a>
            <a href="<?php echo Yii::app()->controller->createUrl('product/index',array('bigType'=>29));?>">钼化工</a>
            <a href="<?php echo Yii::app()->controller->createUrl('product/index',array('bigType'=>30));?>">钼制品</a>
            <a href="<?php echo Yii::app()->controller->createUrl('product/index',array('bigType'=>56));?>">钼终极</a>
            </p>
			<i class="sp"></i>
			</div>
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('price/index');?>">价格行情</a></strong><p>
           <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>58));?>">当日报价</a>
           <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>59));?>">价格汇总</a>
		   <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>62));?>">钼走势</a>
		   <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>61));?>">分析预测</a>
		   </p>
			<i class="sp"></i>
			</div>
			<!--  <div class="nav-con">
            <strong><a href="">钼服务</a></strong><p>
           <a href="">物流仓储</a><a href="">信用金</a><a href="">抵押贷款</a><a href="">物流</a></p>
			<i class="sp"></i>
			</div>-->
			<div class="nav-con">
            <strong><a href="<?php echo Yii::app()->controller->createUrl('knowledge/list');?>">钼百科</a></strong><p>
            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/list',array('subcategory_id'=>6));?>">钼用途</a>
            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/list',array('subcategory_id'=>64));?>">国内标准</a>
            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/list',array('subcategory_id'=>63));?>">国际标准</a>
            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/list',array('subcategory_id'=>65));?>">生产工艺</a>
            </p>
			</div>
		</div>
	</div>

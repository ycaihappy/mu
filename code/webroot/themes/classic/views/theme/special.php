<div class="layout-area">
	<!--module start-->
       <?php $this->widget('ThemeProductWidget');?>
       <?php $this->widget('ThemeMarketWidget');?>
	<!--module end-->
	<!--module start-->
	<div id="J_SpecialChart" class="m-special-ad" data-api="<?php echo Yii::app()->controller->createUrl('price/chart',array('type'=>$_GET['type'],'year'=>date("Y"),'to_year'=>date("Y"),'month'=>date("n"),'to_month'=>date("n"),'day'=>date("d")));?>">
			<div class="pic"></div>
		</div>
	<!--module end-->
</div>
<div class="layout-area">

<div class="grid-690">
       <?php $this->widget('ThemeSupplyWidget');?>
</div>
<div class="grid-260">
		<div class="m-news-focus">
            <?php $this->widget('ThemeChinaWidget');?>
	    	<div class="m-gc-ad">
				<a href="www.mushw.com" target="_blank"><img width="260" height="85" src="/images/advertisement/advertisement_0_1363879124_8791.png"></a>
			</div>
            <?php $this->widget('ThemeWorldWidget');?>
        </div>
</div>

</div>

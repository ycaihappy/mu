<div class="layout-area">
	
	<div class="hq-col-l">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>
		<!--module start-->
       <?php $this->widget('ThemeProductWidget');?>
       <?php //$this->widget('ThemeMarketWidget');?>
	<!--module end-->
	<!--module start-->
	<div id="J_SpecialChart" class="m-special-ad" data-api="<?php echo Yii::app()->controller->createUrl('price/chart',array('type'=>$_GET['type'],'year'=>date("Y"),'to_year'=>date("Y"),'month'=>date("n"),'to_month'=>date("n"),'day'=>date("d")));?>">
			<div class="pic"></div>
		</div>
	<!--module end-->
</div>
<div class="layout-area">

<!--<div class="grid-690">
       <?php ///$this->widget('ThemeSupplyWidget');?>
</div>-->
<div class="hq-col-l">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>
 <div class="m-b2c ui-m-tab ui-m-border" id="J_Data_Center_2">
            <?php $this->widget('IndexProductWidget');?>
 
    </div>
<div class="hq-col-l" style="width:205px">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>

</div>
<div class="layout-area">
<div class="hq-col-l" style="width:315px">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>
		<div class="hq-col-l" style="width:310px">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>
		<div class="hq-col-l" style="width:315px">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>
</div>

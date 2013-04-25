	<div class="layout-area">
	<div class="hq-col-l">
	
		<!--module 1-->
         <?php  $this->widget("PriceChinaWidget",array('type'=>1));?>
		<!--module 1-->	
		</div>
		
		<!--module 2-->
        <?php $this->widget("PriceNewsWidget");?>
		<!--module 2-->
		
		<!--module 3-->
        <?php $this->widget("PriceTodayWidget");?>
		<!--module 3-->
		
		<div class="clearfix"></div>
	</div>
	
	<div class="layout-area">
	<div class="hq-col-l">
	<!--module 1-->
     <?php #$this->widget("PriceAreaWidget");?>
	<!--module 1-->
    
     <?php $this->widget("PriceWorldWidget");?>
	  <?php  $this->widget("PriceChinaWidget",array('type'=>2));?>
	   <?php  #$this->widget("PriceChinaWidget",array('type'=>3));?>
	
	<div class="m-price-ad">
	<a href="<?php echo $adv1[0]->ad_link?>" target="_blank">
	<img width="290" height="85" src="<?php echo '/images/advertisement/'.$adv1[0]->ad_media_src?>">
	</a></div>
	 
	<!--module 2-->
	</div>
	<div class="hq-col-r">
     <?php #$this->widget("PriceBodyWidget", array('type'=>1));?>

	<div class="m-banner">
			<img src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>" width="700" height="80" />
	</div>
     <?php $this->widget("PriceBodyWidget", array('type'=>2));?>
	
     <?php $this->widget("PriceEnterpriseWidget");?>
	 
	
	</div>
	
	</div>
	

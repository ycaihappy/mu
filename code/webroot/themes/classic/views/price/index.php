	<div class="layout-area">
	<div class="hq-col-l">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
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
     <?php $this->widget("PriceChinaWidget");?>
	<!--module 2-->
	<div class="hq-col-r">
     <?php $this->widget("PriceBodyWidget", array('type'=>1));?>

	<div class="m-banner">
			<img src="images/960x100.gif" width="700" height="80" />
		</div>
     <?php $this->widget("PriceBodyWidget", array('type'=>2));?>

	</div>
	<!--module 2-->
	</div>
	<div class="layout-area">
	<!--module 1-->
     <?php $this->widget("PriceEnterpriseWidget");?>
	<!--module 1-->
	</div>


	<div class="layout-area">
        <?php $this->widget("BannerWidget");?>
        <?php $this->widget("NewsTopWidget");?>
        <?php $this->widget("FunctionBlockWidget"); ?>

		<div class="clearfix"></div>
	</div>
	<div class="layout-area">
        <?php $this->widget("ProductTopWidget", array('type'=>'special'));?>
        <?php $this->widget("TabListWidget", array('type'=>'supply'));?>
        <?php $this->widget("ProductTopWidget", array('type'=>'product'));?>

		<div class="clearfix"></div>
	</div>
	<div class="layout-area">
		<div class="m-banner">
			<img src="images/banner.jpg" width="960" height="100" />
		</div>
		<div class="col-left">
        <?php $this->widget("RecommedWidget",array('type'=>1));?>
		</div>
        <div class="col-right">		
        <?php $this->widget("PriceWidget");?>
        <div class="m-mid-ad"><a href=""><img src="images/ad6.jpg" /></a></div>
        <?php #$this->widget("CaseWidget");?>
        <?php $this->widget("KnowledgeWidget");?>
		</div>
		<div class="clearfix"></div>
	</div>

    <div class="layout-area">
        <?php $this->widget("BottomBannerWidget");?>
    </div>

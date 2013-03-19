	<div class="layout-area">
		<div class="grid-290">
		<!--module ad-->
		<?php $this->widget('SupplyAdWidget');?>
		<!--module ad-->
		<!--supply news-->
<?php $this->widget('KnowUseWidget');?>
		<!--supply news-->
		
		</div>
		<div class="grid-436">
		<!--m-suppy-topnews-->
<?php $this->widget('KnowNewsWidget');?>
		<!--m-suppy-topnews-->
		</div>
		<div class="grid-210">
			<!--m-supply-mt-->
<?php $this->widget('KnowMuWidget');?>
			<!--m-supply-mt-->
		</div>
	
		<div class="clearfix"></div>
	</div>
	
	<div class="layout-area">
		<div class="m-banner">
			<img src="<?php echo '/images/advertisement/'.$adv1[0]->ad_media_src?>" width="960" height="100" />
		</div>
		
        <?php $this->widget('KnowModuleWidget');?>
		<div class="clearfix"></div>
	</div>

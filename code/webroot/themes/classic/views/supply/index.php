
		<div class="grid-290">
			<?php $this->widget('SupplyIndexSpecialWidget');?>
			<!--module end-->
			<!--module start-->
			<div class="m-gc-ad">
			<?php if($adv):?>
			<a target="_blank" href="<?php echo $adv[0]->ad_link?>">
				<img width="290" height="85" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>">
			</a>
			<?php endif;?>
			
			
			</div>
			<!--module end-->
			
			<!--module start-->
			<?php $this->widget('SupplyIndexRecEnterpriseLeftWidget');?>
			<!--module end-->	
		</div>
		<div class="grid-660">
			<?php $this->widget('NewestBuyModuleWidget');?>
			<!--start-->
			<?php $this->widget('SupplyMuWidget');?>
		</div>
		



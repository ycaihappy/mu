		<div class="m-supply-ad" id="J_IndexAd">
			<div class="pic">
			<?php if($adv):
						foreach($adv as $ad):
				?>
				<a href="<?php echo $ad->ad_link?>"><img src="<?php echo '/images/advertisement/'.$ad->ad_media_src?>" /></a>
				<?php 
						endforeach;
						endif;
				?>
				
			</div>
			<div class="btns"><a href="javascript:void(0)"></a><a href="javascript:void(0)"></a><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="on"></a></div>
		</div>

		<div class="m-index-ad1" id="J_IndexAd">
			<div class="pic">
				<?php if($advs):
						foreach ($advs as $adv):
				?>
				<a href="<?php echo $adv->ad_link?>"><img src="<?php echo '/images/advertisement/'.$adv->ad_media_src?>" /></a>
				<?php endforeach;
					else:
				?>
				<a href=""><img src="images/ad_470x197.png" /></a>
				<a href=""><img src="images/ad_470x197.png" /></a>
				<?php endif;?>
			</div>
			<div class="btns"><a href="javascript:void(0)"></a><a href="javascript:void(0)"></a><a href="javascript:void(0)"></a><a href="javascript:void(0)" class="on"></a></div>
		</div>

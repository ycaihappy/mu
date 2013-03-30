		<div class="m-category ui-m-tab ui-m-border">
				<div class="hd">
				
					<span class="on"><a href="<?php echo $this->getController()->createUrl('/product/index/')?>">产品分类</a></span>

				</div>
				<div class="bd">
				<?php if($data):
						foreach ($data as $key=>$category):
				?>
					<dl>
						<strong><a href="<?php echo $this->getController()->createUrl('/product/index/',array('bigType'=>$key))?>"><?php echo $category['title']?></a>:</strong>
						<?php foreach ($category['sub'] as $subCategory):?>
						<a href="<?php echo $this->getController()->createUrl('/product/index/',array('bigType'=>$key,'smallType'=>$subCategory->term_id))?>"><?php echo $subCategory->term_name?></a>| 
						<?php endforeach;?>
					</dl>
					<?php endforeach;
					endif;
					?>
				</div>
				
		</div>
		<div class="ft">
		<?php if($adv):?>
		<a target="_blank" href="<?php echo $adv[0]->ad_link?>">
		
		<img width="288" style="margin-top:12px" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>"></a>
		<?php endif;?>
		
		</div>

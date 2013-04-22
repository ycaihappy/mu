		<div class="m-category ui-m-tab ui-m-border">
				<div class="hd">
				
					<span class="on"><a href="<?php echo $this->getController()->createUrl('/product/index/')?>">产品分类</a></span>

				</div>
				<div class="bd">
				<?php if(@$data):
						foreach ($data as $key=>$category):
				?>
					<dl>
						<strong><a href="<?php echo $this->getController()->createUrl('/product/index/',array('bigType'=>$key))?>"><?php echo $category['title']?></a>:</strong>
<?php 
$countSub=count($category['sub']);
$index=0;
foreach ($category['sub'] as $subCategory):
if (in_array($subCategory->term_id,array(31,57,72,78)))
{$index++;
                        ?>
						<a href="<?php echo $this->getController()->createUrl('/theme/special/',array('type'=>$subCategory->term_id))?>"><?php echo $subCategory->term_name?></a><?php echo $index<$countSub?'|':''?>
<?php }else{$index++;?>
						<a href="<?php echo $this->getController()->createUrl('/product/index/',array('bigType'=>$key,'smallType'=>$subCategory->term_id))?>"><?php echo $subCategory->term_name?></a><?php echo $index<$countSub?'|':''?>
						<?php }endforeach;?>
					</dl>
					<?php endforeach;
					endif;
					?>
				</div>
				
		
		<div class="ft">
		
		<?php if(@$adv):?>
		<a target="_blank" href="<?php echo $adv[0]->ad_link?>" class="cmp-ad">
		
		<img width="288" height="115" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>"></a>
		<?php endif;?>
		
		</div>
		
		</div>

		<div class="m-category ui-m-tab ui-m-border">
				<div class="hd">
				
					<span class="on"><a href="<?php echo $this->getController()->createUrl('/product/index/')?>">钼分类</a></span>

				</div>
				<div class="bd">
				<?php if($data):
						foreach ($data as $key=>$category):
				?>
					<dl>
						<dt><a href="<?php echo $this->getController()->createUrl('/product/index/',array('bigType'=>$key))?>"><?php echo $category['title']?></a></dt>
						<?php foreach ($category['sub'] as $subCategory):?>
						<dd><a href="<?php echo $this->getController()->createUrl('/product/index/',array('bigType'=>$key,'smallType'=>$subCategory->term_id))?>"><?php echo $subCategory->term_name?></a></dd>
						<?php endforeach;?>
					</dl>
					<?php endforeach;
					endif;
					?>
				</div>
		</div>

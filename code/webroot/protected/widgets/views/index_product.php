			<div class="hd">			
				<span class="on"><a href="">现货中心</a></span>
			</div>
			<div class="bd">		
				<div class="area-one">
				
					<div class="qk-search">
						<p>
						<a href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布供应</a> | 
						<a href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布求购</a> | 
						<a href="<?php echo $this->getController()->createUrl('/uehome/user/goods')?>">发布现货</a> 
						</p>
						<form method='post' action="<?php echo $this->getController()->createUrl('/product/index') ?>">
							<div>
								<span>选择品种</span>
								<?php echo CHtml::dropDownList('bigType', 0, $allBigType,array(
									'ajax'=>array(
					                    'type'=>'GET',
					                    'url'=>$this->getController()->createUrl('/site/getChildrenTerms'),
					                    'update'=>'#smallType',
					                    'data'=>array('group_id'=>"14",'parent_id'=>'js:this.value')
					                ),'style'=>'width:120px'
                				))?>
                				<?php echo CHtml::dropDownList('smallType', 0, array(),array('empty'=>'全部','style'=>'width:120px'))?>
								<span>存货地</span><?php echo CHtml::dropDownList('province', 0, $allProvince)?>
								<span>品阶</span><input name="muContent" type="text" style="width:129px"/>
							</div>
							<div>
								<span>生产厂家</span>
								<input name="enterprise" type="text" style="width:237px" />
								<button style="float:right" type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
							</div>
							
						</form>
						<table cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<?php
							if($layerCategory):
									$count=count($layerCategory);
									
									for($i=1;$i<=$count;$i++):
							?>
							<td><a href="<?php echo $this->getController()->createUrl('/product/index',array('bigType'=>$layerCategory[$i-1]->term_parent_id,'smallType'=>$layerCategory[$i-1]->term_id))?>"><?php echo $layerCategory[$i-1]->term_name?></a></td>
								<?php if($i%6==0&&$i<$count):?>
								</tr><tr>
								<?php endif;?>
							<?php endfor;
							endif;?>
						</tr>		
						</table>
						<div class="ui-gallery" id="J_ImgScroller" data-type="horizontal">
							<ul>
							<?php if($recProducts):
									foreach ($recProducts as $product):
							?>
								<li><a href="<?php echo $this->getController()->createUrl('/product/view',array('product_id'=>$product->product_id));?>"><img src="<?php echo '/images/commonProductsImages/thumb/'.$product->product_image_src ?>" width="116" height="116" /></a></li>
								<?php 
								endforeach;
								endif;
								?>
							</ul>
						</div>
					</div>
				
					<div class="cg-area ui-m-border">
						<div class="ui-purple-hd">
								<h6>推荐企业</h6>
						</div>
						<div class="ulist" id="J_ImgScroller_1" data-type="vertical">
							<ul>
	            		<?php foreach($ent as $ent_info){?>
                               <li><a target="_blank" href="<?php echo $ent_info->ent_id;?>"><?php echo $ent_info->ent_name;?></a></li>
							    <li><a target="_blank" href="<?php echo $ent_info->ent_id;?>"><?php echo $ent_info->ent_name;?></a></li>
				    	<?php }?>			
						</ul>
						</div>
					</div>
				<div class="clearfix"></div>
			</div>

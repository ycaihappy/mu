 <?php   if($this->beginCache('indexProduct')){ ?>           
            <div class="hd">			
				<span class="on"><a href="">现货中心</a></span>
				<p class="links">
						<a class="ui-m-btn btn-purple-medium" href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布供应</a>
						<a class="ui-m-btn btn-purple-medium" href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布求购</a>
						<a class="ui-m-btn btn-purple-medium" href="<?php echo $this->getController()->createUrl('/uehome/user/goods')?>">发布现货</a>
						</p>
			</div>
			<div class="bd">		
				
				
					<div class="qk-search">
						
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
								
							</div>
							<div>
								<span>存  货  地</span><?php echo CHtml::dropDownList('province', 0, $allProvince)?>
								<button style="float:right" type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
								<!--<span>品阶</span><input name="muContent" type="text" style="width:129px"/>  -->
							</div>
							<!--<div>
								<span>生产厂家</span>
								<input name="enterprise" type="text" style="width:237px" />
								<button style="float:right" type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
							</div>-->
							
						</form>
						<!--<table cellspacing="0" cellpadding="0" width="100%">
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
						</div>-->
					</div></div>
						<div class="ft">
						<?php if($recProducts):?>
						<div class="scroll" id="J_ImgScroller_3" data-type="vertical">
						<ul>
						<?php foreach ($recProducts as $product):?>
						<li>
                                <dt><?php echo $product->product_name;?>，品类：<?php echo $product->type?$product->type->term_name:'未指定'?> ， 品质：<?php echo $product->product_mu_content;?>，联系人：<?php echo $product->user?$product->user->user_first_name:'未指定'?>，电话：<?php echo $product->user?$product->user->user_mobile_no:'未指定' ?>，提货地：<?php echo $product->city?$product->city->city_name:'未指定'?></dt>
                                <dd><a href="<?php echo Yii::app()->controller->createUrl('/storeFront/default/index',array('username'=>$product->user->user_name))?>"><?php echo $product->user?$product->user->enterprise->ent_name:'未指定'?></a> 发表于 <?php echo date('Y/m/d',strtotime($product->product_join_date))?></dd>
						</li>
						<?php endforeach;?>   	
                	    </ul>
                	   </div>
                <?php endif;?>
						
					</div>
			
<?php $this->endCache(); } ?>

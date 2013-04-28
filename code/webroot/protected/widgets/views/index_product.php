 <?php   #if($this->beginCache('indexProduct')){ ?>           
            <div class="hd">			
				<span class="on"><a href="<?php echo $this->getController()->createUrl('/product/index')?>">现货中心</a></span>
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
								<span>品种</span>
								<?php /*echo CHtml::dropDownList('bigType', $selectedType, $allBigType,array(
									'ajax'=>array(
					                    'type'=>'GET',
					                    'url'=>$this->getController()->createUrl('/site/getChildrenTerms'),
					                    'update'=>'#smallType',
					                    'data'=>array('group_id'=>"14",'parent_id'=>'js:this.value')
					                ),'style'=>'width:120px'
                				))*/?>
                				<?php echo CHtml::dropDownList('smallType', $selectedType, $typies,array('empty'=>'全部','style'=>'width:120px'))?>
								<span>存  货  地</span><?php echo CHtml::dropDownList('province', 0, $allProvince)?>
								<button style="float:right" type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
							</div>
							<!--<div>
								<span>存  货  地</span><?php // echo CHtml::dropDownList('province', 0, $allProvince)?>
								<button style="float:right" type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
								<span>品阶</span><input name="muContent" type="text" style="width:129px"/> 
							</div>
							<div>
								<span>生产厂家</span>
								<input name="enterprise" type="text" style="width:237px" />
								<button style="float:right" type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
							</div>-->
							
						</form>
						<!--<table cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<?php
							/*if($layerCategory):
									$count=count($layerCategory);
									
									for($i=1;$i<=$count;$i++):*/
							?>

							<td><a href="<?php //echo $this->getController()->createUrl('/product/index',array('bigType'=>$layerCategory[$i-1]->term_parent_id,'smallType'=>$layerCategory[$i-1]->term_id))?>"><?php //echo $layerCategory[$i-1]->term_name?></a></td>

								<?php // if($i%6==0&&$i<$count):?>
								</tr><tr>
								<?php //endif;?>
							<?php //endfor;
							//endif;?>
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
						
				
				<!--start-->
				<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:0" class="left_table">    
            
                    <tbody><tr>
                      <th width="150">公司名</th>
                      <th width="60">品名</th>
                      <!--<th width="60">吨度</th>
                      <th width="60">水分</th>-->
                      <th width="70">价格</th>
                      <th width="60">数量</th>
					  <th width="65">提货地</th>
					  <th>日期</th>
                    </tr>
					<tr>
					<td style="padding:0" colspan="7">
             		<div data-type="vertical" id="J_ImgScroller_1" class="index-prd-scroll">
					
					<ul style="position: absolute;width:100%">
					<?php if(@$recProducts):?>
					<?php foreach ($recProducts as $product):?>
					<li>
						<span class="col-1"><a href="<?php echo Yii::app()->controller->createUrl('/product/view',array('product_id'=>$product->product_id))?>"><?php echo $product->user?$product->user->enterprise->ent_name:'未指定'?></a></span>
						<span class="col-2"><?php echo $product->type?$product->type->term_name:'未指定'?></span>
					<!--	<span class="col-3"><?php echo $product->product_mu_content;?></span>
						<span class="col-4"><?php echo $product->product_water_content;?></span>-->
						<span class="col-5"><?php echo number_format($product->product_price,2);?></span>
						<span class="col-6"><?php echo $product->product_quanity.($product->unit?$product->unit->term_name:'吨')?></span>
						<span class="col-7"><?php echo $product->city?$product->city->city_name:'未指定'?></span>
                        <span class="col-8"><?php echo date("m-d",strtotime($product->product_join_date));?></span>
					</li>
					<?php endforeach;?>
					<?php endif;?>
					</ul>
					</div>
					</td>
					</tr>
        </tbody></table>
				<!--end-->
						
					</div>
			
<?php #$this->endCache(); } ?>

 <?php   #if($this->beginCache('indexProduct')){ ?>           
            <div class="hd">			
            <span class="on"><a href=""><?php echo $title;?>现货中心</a></span>
				<p class="links">
						<a class="ui-m-btn btn-purple-medium" href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布供应</a>
						<a class="ui-m-btn btn-purple-medium" href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布求购</a>
						<a class="ui-m-btn btn-purple-medium" href="<?php echo $this->getController()->createUrl('/uehome/user/goods')?>">发布现货</a>
						</p>
			</div>

						<div class="ft">
						
				
				<!--start-->
				<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:0" class="left_table">    
            
                    <tbody><tr>
                      <th width="95">公司名</th>
                      <th width="60">品名</th>
                      <th width="60">吨度</th>
                      <th width="60">水分</th>
                      <th width="70">价格</th>
                      <th>数量</th>
					  <th>提货地</th>
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
						<span class="col-3"><?php echo $product->product_mu_content;?></span>
						<span class="col-4"><?php echo $product->product_water_content;?></span>
						<span class="col-5"><?php echo number_format($product->product_price,2);?></span>
						<span class="col-6"><?php echo $product->product_quanity.($product->unit?$product->unit->term_name:'吨')?></span>
						<span class="col-7"><?php echo $product->city?$product->city->city_name:'未指定'?></span>
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

<div class="price-area index-price">
				<div class="ui-purple-hd  ui-m-tab4 ui-m-border">
						<span class="on">现货价格</span><span>市场价格</span><span>国际价格</span>
						
				</div>
				<div class="bd">
					<ul>
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody><tr><th>品种</th><th>价格</th><th>涨跌</th><th>地区</th><th>日期</th></tr>
                        <?php if($rePrice):
								foreach ($rePrice as $price):
						?>
						<tr><td><a href="<?php echo $this->getController()->createUrl('price/summary',array('subcategory_id'=>$price->re_name_type));?>"><?php echo $price->re_name?></a></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td><td><?php echo date('Y-m-d',strtotime($price->re_added_time))?></td></tr>
						<?php endforeach;
							endif;
						?>
					</tbody></table>
					</ul>
					<ul class="hide" style="display: none;">
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody><tr><th>品种</th><th>价格</th><th>涨跌</th><th>地区</th><th>日期</th></tr>
						<?php if($otherPrice):
								foreach ($otherPrice as $price):
						?>
						<tr><td><a href="<?php echo $this->getController()->createUrl('price/summary',array('subcategory_id'=>$price->re_name_type));?>"><?php echo $price->re_name?></a></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td><td><?php echo date('Y-m-d',strtotime($price->re_added_time))?></td></tr>
						<?php endforeach;
							endif;
						?>
					</tbody></table>
					</ul>
					<ul class="hide" style="display: none;">
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody><tr><th>品种</th><th>价格</th><th>涨跌</th><th>地区</th><th>日期</th></tr>
						<?php if($thirdPrice):
								foreach ($thirdPrice as $price):
						?>
						<tr><td><a href="<?php echo $this->getController()->createUrl('price/summary',array('subcategory_id'=>$price->re_name_type));?>"><?php echo $price->re_name?></a></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td><td><?php echo date('Y-m-d',strtotime($price->re_added_time))?></td></tr>
						<?php endforeach;
							endif;
						?>
					</tbody></table>
					</ul>
				</div>
			</div>

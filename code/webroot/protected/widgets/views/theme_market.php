	<div class="price-area special-index">
		<div class="ui-purple-hd  ui-m-tab4 ui-m-border">
				<span class="on">市场价格</span>				
		</div>
		<div class="bd">
		
			<ul>
			<table cellspacing="0" cellpadding="0" width="100%">
	                    <?php if($data):
								foreach ($data as $price):
						?>
                        <tr><td><?php echo $price->re_name;?></td><td><?php echo $price->re_price;?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td><td><?php echo date('Y-m-d',strtotime($price->re_added_time))?></td></tr>
						<?php endforeach;
							endif;
						?>
			</tbody></table>
			</ul>
		</div>
	</div>

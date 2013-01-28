			<div class="m-product">
				<div class="hd">
				<span class="on"><a href="">新增未审核特价</a></span>			
				<a href="" class="more">更多</a>
				</div>
				<div class="bd">
					<ul>
					<?php foreach ($data as $special):?>
						<li><a><?php echo $special->product_name?></a></li>
					<?php endforeach;?>
					</ul>
				</div>
			</div>
<div class="m-tjxx">
	<h2><!-- <span><a href="<?php //echo $this->getController()->createUrl('list',array('type'=>3))?>">更多</a></span> -->特价信息</h2>
	<ul>
	<?php if($topSpecial):
			foreach ($topSpecial as $special):
	?>
	        <li style="cursor:pointer;">
	        	<span class="tj01">
	        		<a target="_blank" href="<?php echo $special->product_id?>"><?php echo $special->product_name?></a>
	        	</span><span class="tj02"><?php echo $special->muContent->term_name?></span>
	        	<span class="tj03"><?php echo $special->product_quanity.$special->unit->term_name?></span>
	        	<span class="tj04"><?php echo $special->city->city_name?></span>
	        </li>
	        <?php endforeach;
	        endif;
	        ?>
	</ul>
</div>

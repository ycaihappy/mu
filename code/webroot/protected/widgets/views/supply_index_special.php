<div class="m-tjxx ui-m-tab ui-m-border">
	<div class="hd">
		<span class="on">特价信息</span><?php if($this->getController()->getRoute()!='product/list'):?>
	<a class="more" href="<?php echo $this->getController()->createUrl('product/list',array('type'=>1))?>">更多&gt;&gt;</a>
	<?php endif;?>
	</div>
	<div class="bd">
	<ul>
		  <li class="header">
	        	<span class="tj01">品名</span>
				<span class="tj02">品质</span>
	        	<span class="tj03">质量</span>
	        	<!--<span class="tj04 header">城市</span>-->
	        </li>
	<?php if($topSpecial):
		$i = 0;
			foreach ($topSpecial as $special):
			$i++;
	?>
			
	        <li <?php echo $i == count($topSpecial) ? 'class="last"' : '';?>>
	        	<span class="tj01">
	        		<a target="_blank" href="<?php echo $special->product_id?>"><?php echo $special->product_name?></a>
	        	</span>
				<span class="tj02"><?php echo $special->product_mu_content?></span>
	        	<span class="tj03"><?php echo $special->product_quanity.$special->unit->term_name?></span>
	        	<!--<span class="tj04"><?php echo $special->city->city_name?></span>-->
	        </li>
	        <?php endforeach;
	        endif;
	        ?>
	</ul>
	</div>
	<div class="ft bt-repeat"></div>
</div>


<div class="m-tjqy ui-m-tab ui-m-border">
	<div class="hd ui-tab-3">		
			<span class="on"><a href="">推荐企业</a></span><a class="more" >更多&gt;&gt;</a>
		</div>
	<div class="bd">
				<ul class="on">
		                            <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=42">2012年1-12月国际钼铁价格走势图</a></li>
					                            <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=43">2012年12月国内钼铁价格走势图</a></li>
					                            <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=44">2012年1-12月国内钼铁价格走势图</a></li>
					                            <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=45">2012年1-12月国际钼铁价格走势图</a></li>
					                            <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=46">2012年12月国内钼铁价格走势图</a></li>
					                            <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=47">2012年12月国内氧化钼价格走势图</a></li>
								
				</ul>
				<ul>
                                    <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=15">2012年1-12月国际氧化钼价格走势图</a></li>
                                                <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=32">2012年1-12月国际氧化钼价格走势图</a></li>
                                                <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=31">2012年1-12月份我国钼铁进口对比图</a></li>
                                                <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=30">2012年1-12月国际氧化钼价格走势图</a></li>
                                                <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=24">2012年1-12月份我国钼铁出口对比图</a></li>
                                                <li><a target="_blank" href="/index.php?r=news/view&amp;art_id=23">2012年12月国际钼铁价格走势图</a></li>
                    			
				</ul>
			</div>
</div>
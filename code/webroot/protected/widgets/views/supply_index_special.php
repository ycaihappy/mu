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
	        		<a target="_blank" href="<?php echo $special->product_id?>"><?php echo $special->product_name;?></a>
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


<?php
            if ( !empty($supply_category_list) ) 
            {
?>
<div class="m-tjqy ui-m-tab ui-m-border">
	<div class="hd ui-tab-3">		
			<span class="on"><a href="">同品类供求</a></span><a class="more" >更多&gt;&gt;</a>
		</div>
	<div class="bd">
				<ul class="on">
<?php 
            foreach ($supply_category_list as $supply)
            {
?>
    <li><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$supply->supply_id));?>"><?php echo $supply->supply_name;?></a></li>
<?php
            }
?>
				</ul>
			</div>
</div>
<?php
            }
?>

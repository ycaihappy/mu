<div class="m-gyxx">
        	<h2><a href="<?php echo $this->getController()->createUrl('supply/list',array('type'=>1))?>">更多</a><em>供应信息</em></h2>
            <ul>
            	<?php 
            	if($data):
            		foreach ($data as $supply):
            	?>
            	<li>
            		<span class="gy01">
            			<a target="_blank" title="<?php echo $supply->user->enterprise->ent_name?>" href="<?php echo $this->getController()->createUrl('supply/view',array('supply_id'=>$supply->supply_id))?>"><?php echo $supply->user->enterprise->ent_name?></a>
            		</span>
            		<span class="gy02">
            			<a target="_blank" title="<?php echo $supply->supply_name?>" href="<?php echo $this->getController()->createUrl('supply/view',array('supply_id'=>$supply->supply_id))?>"><?php echo $supply->supply_name?></a>
            		</span>
            		<span class="gy03"><?php echo $supply->category->term_name?></span>
            		<span class="gy04"><?php echo $supply->muContent->term_name?></span>
            		<span class="gy05"><?php echo $supply->city->city_name?></span>
            		<span class="gy06"><?php echo date('m/d',strtotime($supply->supply_join_date))?></span>
            	</li>
            	<?php 
            		endforeach;
            	endif;
            	?>
			</ul>
</div>
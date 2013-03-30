<div class="grid-210 alignR">
		<div class="m-hq-dq ui-m-tab ui-m-border">
		<div class="hd">
        <span class="on">推荐企业</span>
		</div>
       <div class="bd">
        <ul>
        	<?php if($recEnterprises):
        			foreach ($recEnterprises as $enterprise):
        	?>
      		  <li><a target="_blank" title="<?php echo $enterprise->ent_name?>" href="<?php echo $enterprise->ent_id?>"><?php echo $enterprise->ent_name?></a></li>
			 <?php 
			 	endforeach;
			 endif;?>			
        </ul>
		</div>
	</div>
	<div class="m-ad">
	<?php if($adv):?>
			<a target="_blank" href="<?php echo $adv[0]->ad_link?>">
				<img width="210" height="78" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>">
			</a>
			<?php endif;?>
   </div>
</div>
<div class="cgal ui-m-tab ui-m-border">
	<div class="hd">
		<span class="on">推荐供应商信息</span>
	</div>
	<div class="bd">
	<ul>
		<?php if($data):
				foreach ($data as $ent):
		?>
		<li><a target="_blank" href="<?php echo $ent->ent_id?>"><?php echo $ent->ent_name?></a></li>
		<?php 
				endforeach;
			endif;
		?>
	</ul>
	</div> 
</div>

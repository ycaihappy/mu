<div class="cgal">
	<h2>推荐供应商信息</h2>
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

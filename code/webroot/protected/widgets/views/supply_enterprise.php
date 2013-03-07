		<div class="cgal">
		<h2><span><a href="#">更多</a></span>推荐供应商信息</h2>
        	<ul>
        <?php if($advEnt):
        		foreach ($advEnt as $ent):
        ?>       
        <li><a target="_blank" href="<?php echo $ent->ent_id;?>"><?php echo $ent->ent_name;?></a></li>
        <?php endforeach;
        endif;
        ?>
			</ul>
        </div>

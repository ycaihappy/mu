		<div class="m-supply-news">
			<div class="hd clearfix">
				<span class="on"><a href="">推荐供应商</a><i></i></span>			
			</div>
			<div class="bd">
				<ul>
			<?php 
					if($data):
						foreach ($data as $ent):
						?>
                            <li><a title="<?php echo $ent->ent_name; ?>" href="<?php echo $ent->ent_id?>" target="_blank"><?php echo $ent->ent_name; ?></a></li>
					<?php endforeach;
					endif;
					?>			
				</ul>
			</div>
		
		</div>

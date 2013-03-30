		<div class="cg-area ui-m-tab ui-m-border">
						<div class="hd">
								<span class="on">推荐企业</span>
						</div>
						<div class="ulist" id="J_ImgScroller_1" data-type="vertical">
							<ul>
	            		<?php foreach($ent as $ent_info){?>
							    <li><a target="_blank" href="<?php echo $ent_info->ent_id;?>"><?php echo $ent_info->ent_name;?></a></li>
				    	<?php }?>			
						</ul>
						</div>
					</div>

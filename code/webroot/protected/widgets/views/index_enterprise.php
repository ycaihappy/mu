		<div class="cg-area ui-m-border">
						<div class="ui-purple-hd">
								<h6>推荐企业</h6>
						</div>
						<div class="ulist" id="J_ImgScroller_1" data-type="vertical">
							<ul>
	            		<?php foreach($ent as $ent_info){?>
							    <li><a target="_blank" href="<?php echo $ent_info->ent_id;?>"><?php echo $ent_info->ent_name;?></a></li>
				    	<?php }?>			
						</ul>
						</div>
					</div>

                <?php   if($this->beginCache('indexModule'.$title)){ ?>
                <div class="mod-news ui-m-border">
					<div class="ui-purple-hd">
						<h6><?php echo $title?></h6>
						<a href="<?php echo $more?>" class="more">更多&gt;&gt;</a>
					</div>
					<div class="bd">
						<div class="pic">
							<a href="<?php echo $one->art_id?>"><img src="<?php echo $one->art_img?>" width="101" height="72" /></a>
							<p><a href="<?php echo $one->art_id?>"><?php echo $one->art_title?></a></p>
						</div>
						<div class="list">
							<ul>	
							<?php
							if($data):
									foreach ($data as $art):
							?>						
							<li><a href="<?php echo $art->art_id?>"><?php echo $art->art_title?></a></li>
							<?php endforeach;
								endif;
							?>
							</ul>
						</div>
					</div>
			
				</div>
<?php $this->endCache(); } ?>

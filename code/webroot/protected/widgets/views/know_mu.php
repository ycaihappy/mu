		<div class="m-supply-mt">
				<div class="hd">
					<h5>知识榜</h5>
					<a class="ad"><img src="images/191x100.gif" width="191" height="100" /></a>
				</div>
				<div class="bd">
					<ul>
            <?php
                    if ($topRanking):
						 for ($i=0;$i<count($topRanking);$i++):
                             $class = ($i<3) ? 'top':'';
  					?>
                        <li class="<?php echo $class;?>">
                        <em><?php echo $i+1;?></em><a target="_blank" href="<?php echo $topRanking[$i]->art_source?>"><?php echo $topRanking[$i]->art_title;?></a></li>
                        </li>
                       <?php 
                       endfor;
                     endif;
                    ?>
					</ul>
					<a class="ad"><img src="images/193x60.gif" width="191" height="60" /></a>
				</div>
				<div class="ft">
					<div class="item">						
						<a class="ad"><img src="images/73x62_1.gif" width="73" height="62" /></a>
						<p>
							<i></i>
                            <a><?php echo $mu_product[0]->art_title;?></a>
                            <span><?php echo $mu_product[0]->art_tags;?></span>
						</p>
					</div>
					<div class="item">
						
						<a class="ad"><img src="images/73x62_2.gif" width="73" height="62" /></a>
						<p>
							<i></i>
                            <a><?php echo $mu_product[1]->art_title;?></a>
                            <span><?php echo $mu_product[1]->art_tags;?></span>
						</p>
					</div>
					
				</div>
				
			
			</div>

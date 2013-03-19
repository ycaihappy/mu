		<div class="m-supply-mt">
				<div class="hd">
					<h5>知识榜</h5>
					<?php if($adv1):?>
					<a href="<?php echo $adv1[0]->ad_link?>" class="ad"><img src="<?php echo '/images/advertisement/'.$adv1[0]->ad_media_src?>" width="191" height="100" /></a>
					<?php endif;?>
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
					<?php if($adv2):?>
					<a href="<?php echo $adv2[0]->ad_link?>" class="ad"><img src="<?php echo '/images/advertisement/'.$adv2[0]->ad_media_src?>" width="191" height="60"  /></a>
					<?php endif;?>
				</div>
				<div class="ft">
					<div class="item">						
						<a class="ad"><img src="images/73x62_1.gif" width="73" height="62" /></a>
						<p>
							<i></i>
                            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$mu_product[1]->art_id));?>"><?php echo $mu_product[0]->art_title;?></a>
                            <span><?php echo $mu_product[0]->art_tags;?></span>
						</p>
					</div>
					<div class="item">
						
						<a class="ad"><img src="images/73x62_2.gif" width="73" height="62" /></a>
						<p>
							<i></i>
                            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$mu_product[1]->art_id));?> "><?php echo $mu_product[1]->art_title;?></a>
                            <span><?php echo $mu_product[1]->art_tags;?></span>
						</p>
					</div>
					
				</div>
				
			
			</div>

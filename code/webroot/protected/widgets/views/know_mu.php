		<div class="m-supply-mt ui-m-tab ui-m-border">
				<div class="hd ui-tab-3">
					<span class="on">知识榜</span>
					
				</div>
				<div class="bd">
				<a class="ad"><img src="images/191x100.gif" width="191" height="100" /></a>
					<ul>
            <?php
                    if ($topRanking):
						 for ($i=0;$i<8;$i++):
                         {
                             if (isset($topRanking[$i]))
                             {
                             $class = ($i<3) ? 'top':'';
  					?>
                        <li class="<?php echo $class;?>">
                        <em><?php echo $i+1;?></em><a target="_blank" href="<?php echo $topRanking[$i]->art_source?>"><?php echo substr($topRanking[$i]->art_title,0,40);?></a></li>
                        </li>
<?php 
                             }
                         }endfor;
                     endif;
                    ?>
					</ul>
					
				</div>
				<div class="ft">
					<div class="item">	
					<?php if($adv1):?>	
					<a class="ad" href="<?php echo $adv1[0]->ad_link?>">
					<img width="73" height="62" src="<?php echo '/images/advertisement/'.$adv1[0]->ad_media_src?>" />
					</a>				
					<?php endif;?>
						<p>
							<i></i>
<?php
                    if ( isset($mu_product[0]))
                    {
?>
                            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$mu_product[0]->art_id));?>"><?php echo $mu_product[0]->art_title;?></a>
                            <span><?php echo $mu_product[0]->art_tags;?></span>
<?php
                    }
?>
						</p>
					</div>
					<div class="item">
						<?php if($adv2):?>
						<a class="ad" href="<?php echo $adv2[0]->ad_link?>">
						<img width="73" height="62" src="<?php echo '/images/advertisement/'.$adv2[0]->ad_media_src?>" /></a>				
						<?php endif;?>
						<p>
							<i></i>
<?php
                    if ( isset($mu_product[1]))
                    {
?>
                            <a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$mu_product[1]->art_id));?> "><?php echo $mu_product[1]->art_title;?></a>
                            <span><?php echo $mu_product[1]->art_tags;?></span>
<?php
                    }
?>
						</p>
					</div>
					
				</div>
				
			
			</div>

        <div class="title-bar ui-til2">
            <h2><a href="http://news.163.com/rank/">最热知识榜</a></h2>
            
        </div>
        <div class="bd">
            <div class="tab-bd display-control" id="row1-tabboxer">
                <div class="tab-con current">
                    <ul class="rankList newsList clearfix">
                    <?php
                    if ($topRanking):
						 for ($i=0;$i<count($topRanking);$i++):
  					?>
                        <li class="">
                            <span class="<?php echo $i<3?'front':'follow'?> ranknum"><?php echo $i+1?></span><a target="_blank" href="<?php echo $topRanking[$i]->art_source?>"><?php echo $topRanking[$i]->art_title?></a><span class="more right"><?php echo $topRanking[$i]->art_click_count?></span>
                        </li>
                       <?php 
                       endfor;
                     endif;
                    ?>
                     </ul>
                </div>
              
            </div>
        </div>
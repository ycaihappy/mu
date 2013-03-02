<ul class="widget-slide-ctrl-nav"></ul>
    <div class="widget-slide-body" style="width: 560px;">
        <ul class="widget-slide-contents-piclist" style="width: 3360px;">
               <?php 
               if($flashSilderNews):
               		foreach ($flashSilderNews as $news) :
               ?>
               <li><a href="<?php echo $news->art_source?>" class="left"><img width="400" height="280" src="<?php echo '/images/article/thumb/'.$news->art_img?>" title="<?php echo $news->art_title?>" alt="<?php echo $news->art_title?>"></a>
                <div class="widget-slide-content-text right">
                    <h4><a href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></h4>
                    <p><?php echo $news->art_content?></p>
                </div>
            </li>
               <?php endforeach;
               endif;
               ?>
                    </ul>
    </div>
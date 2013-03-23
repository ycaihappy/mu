		<div class="m-hq-news ui-m-tab ui-m-border" id="J_Hq_news">
                <div class="hd">
				<span class="on"><a  href="#">市场评论</a></span><span><a  href="#">预测分析</a></span>
 
				</div>
				<div class="bd">
                <ul class="ck-news" style="display: block;">
                    <div class="con">
                        <label id="GsybList">
                        <h2><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[0]['art_id']));?>"><?php echo substr($data[0]['art_title'],0,60);?></a></h2><span class="article2"><?php echo substr($data[0]['art_content'],0,120)."...";?></span>
                        </label>
                        <ul id="indexGsrbInfo">
			<?php for($index=1;$index<count($data)-1;$index++):?>
        <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span></li>
			<?php endfor;?>			
                        </ul>
                    </div>
                </ul>
                <ul style="display: none;" class="ck-news">
                    <div class="con">
                        <label id="ZjgdList">
                        <h2><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[0]['art_id']));?>"><?php echo substr($mu_news[0]['art_title'],0,60);?></a></h2><span class="article2"><?php echo substr($mu_news[0]['art_content'],0,120)."...";?></span>
                        </label>
                        <ul id="indexZjgdInfo">
   			<?php for($index=1;$index<count($mu_news)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($mu_news[$index]['art_post_date']));?></span>  <a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[$index]['art_id']));?>" title="<?php echo $mu_news[$index]['art_title'] ?>" target="_blank"><?php echo $mu_news[$index]['art_title']; ?></a><em></em></li>
			<?php endfor;?>			
                        </ul>
                    </div>
                </ul>
              
         </div> 
 </div> 

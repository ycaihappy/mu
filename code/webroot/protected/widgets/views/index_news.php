<?php   if($this->beginCache('indexNews')){ ?>       
        <div class="m-new-hx" id="J_New_Tab_List">
			<div class="hd">
				<span class="on"><a href="">行情分析</a></span>
				<!--<span class=""><a href="">国内新闻</a></span>-->
				<div class="clearfix"></div>
			</div>
			<div class="bd">
				<ul class="on">
		<?php for($index=0;$index<6;$index++):?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
				</ul>
				<ul>
        <?php for($index=0;$index<6;$index++):?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[$index]['art_id']));?>" target="_blank"><?php echo $mu_news[$index]['art_title'] ?></a></li>
                    <?php endfor;?>			
				</ul>
			</div>
		</div>
<?php $this->endCache(); } ?>

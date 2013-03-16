		<div class="m-rel-news ui-m-tab ui-m-border">
		<div class="hd">
			<span class="on"><a target="_blank" href="news_list.html">相关新闻</a></span>
		</div>
		<div class="bd">			
		<ul>
	<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
		</ul>

		</div>
		</div>

		<div class="m-supply-news">
			<div class="hd clearfix">
				<span class="on"><a href="">最新资讯</a><i></i></span>			
			</div>
			<div class="bd">
				<ul>
			<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
					<?php endfor;?>			
				</ul>
			</div>
		
		</div>

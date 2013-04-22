		<div class="m-suppy-topnews">
			<div class="topnews">
            <h4><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[0]['art_id']));?>"><?php echo $mu_news[0]['art_title'];?></a></h4>
            <p>[导读]<?php echo strip_tags(substr($mu_news[0]['art_content'],0,250))."...";?></p>
    
			</div>
			<div class="ad">
				<a><img src="images/410x58.gif" /></a>
			</div>
			<div class="news">
				<div class="img"><a><img src="images/108x112_1.gif" width="108" height="112" /></a></div>
				<div class="list">
					<ul>       
	<?php for($index=0;$index<count($data01);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data01[$index]['supply_id']));?>" target="_blank"><?php echo $data01[$index]['supply_name']; ?></a></li>
					<?php endfor;?>			
				</ul>
				</div>
			</div>
			<div class="news">
				<div class="img"><a><img src="images/108x112_2.gif" width="108" height="112" /></a></div>
				<div class="list">
					<ul>       
	<?php for($index=0;$index<count($data02);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data02[$index]['supply_id']));?>" target="_blank"><?php echo $data02[$index]['supply_name']; ?></a></li>
					<?php endfor;?>			
				</ul>
				</div>
			</div>
			<div class="news last">
				<div class="img"><a><img src="images/108x112_3.gif" width="108" height="112" /></a></div>
				<div class="list">
					<ul>       
	<?php for($index=0;$index<count($data03);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data03[$index]['supply_id']));?>" target="_blank"><?php echo $data03[$index]['supply_name']; ?></a></li>
					<?php endfor;?>			
				</ul>
				</div>
			</div>
		</div>

		<div class="m-suppy-topnews">
			<div class="topnews">

            <h4><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data04[0]['art_id']));?>"><?php echo $data04[0]['art_title'];?></a></h4>
            <p>[导读]<?php echo strip_tags(CStringHelper::truncate_utf8_string($data04[0]['art_content'],1005));?></p>

    
			</div>
			<div class="ui-m-tab ui-m-border">
			<div class="hd">
				<span class="on">钼专题</span>
			</div>
			<div class="bd">
			<div class="news">
				<div class="img"><a><img src="images/baike1.jpg" width="128" height="110" /></a></div>
				<div class="list">
					<ul>       
	<?php for($index=0;$index<5;$index++):
    if ( !isset($data01[$index]) ) continue;
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[$index]['art_id']));?>" target="_blank"><?php echo $data01[$index]['art_title']; ?></a></li>
					<?php endfor;?>			
				</ul>
				</div>
			</div>
			<div class="news">
				<div class="img"><a><img src="images/baike2.jpg" width="128" height="110" /></a></div>
				<div class="list">
					<ul>       
	<?php for($index=5;$index<10;$index++):
    if ( !isset($data01[$index]) ) continue;
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[$index]['art_id']));?>" target="_blank"><?php echo $data01[$index]['art_title']; ?></a></li>
					<?php endfor;?>			
				</ul>
				</div>
			</div>
			<div class="news last">
				<div class="img"><a><img src="images/baike3.jpg" width="128" height="110" /></a></div>
				<div class="list">
					<ul>       
	<?php for($index=10;$index<15;$index++):
    if ( !isset($data01[$index]) ) continue;
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[$index]['art_id']));?>" target="_blank"><?php echo $data01[$index]['art_title']; ?></a></li>
					<?php endfor;?>			
				</ul>
				</div>
			</div>
			</div>
			</div>
		</div>

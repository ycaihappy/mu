<div class="m-hq-dq ui-m-tab ui-m-border">
		<div class="hd">
        <span class="on">国际行情</span>
		</div>
       <div class="bd">
        <ul id="gjhqInfo">
      		<?php for($index=0;$index<count($data);$index++):?>
        <li><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
			<?php endfor;?>			
        </ul>
    </div>
</div>
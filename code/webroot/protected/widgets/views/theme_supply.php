<div class="m-hq-dq ui-m-tab ui-m-border">
		<div class="hd">
        <span class="on"><?php echo $category_name.$supply_name;?></span>
		</div>
       <div class="bd">
        <ul id="gjhqInfo">
      		<?php for($index=0;$index<count($data);$index++):?>
        <li><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>" target="_blank"><?php echo CStringHelper::truncate_utf8_string($data[$index]['supply_name'],11); ?></a><span><?php echo date("m-d",strtotime($data[$index]['supply_join_date']));?></span></li>
			<?php endfor;?>			
        </ul>
    </div>
</div>

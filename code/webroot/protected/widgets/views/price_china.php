<?php
switch ($type)
{
case 1:
    $title = '国内行情';
    break;
case 2:
    $title = '推荐采购';
    break;
case 3:
    $title = '推荐供应商';
    break;
}
?>
    <div class="m-hq-dq ui-m-tab ui-m-border">
	<div class="hd">
        <span class="on"><?php echo $title;?></span>
	</div>
<div class="bd">
        <ul id="gjhqInfo">
        
<?php if ($type == 1)
{
            for($index=0;$index<count($data);$index++):?>
        <li><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
            <?php endfor;
}
if ( $type == 3)
{
				foreach ($data as $ent):
            ?>			
<li><span><?php echo date("m-d",strtotime($ent->ent_update_time));?></span><a href="<?php echo $ent->ent_id;?>" title="<?php echo $ent->ent_name; ?>" target="_blank"><?php echo $ent->ent_name; ?></a></li>
<?php 				endforeach;}?>
<?php if ( $type == 2)
{
    $i =0;
				foreach ($data as $supply):
                    if ($i > 12) continue;
            ?>			
<li><span><?php echo date("m-d",strtotime($supply->supply_join_date));?></span><a href="<?php echo $this->getController()->createUrl('supply/view',array('supply_id'=>$supply->supply_id))?>" title="<?php echo $supply->supply_name; ?>" target="_blank"><?php echo $supply->supply_name; ?></a></li>
<?php 	$i++;			endforeach;}?>
        </ul>
    </div>
</div>

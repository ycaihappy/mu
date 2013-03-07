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
    <div class="m-hq-dq">
    <h1><a href="#"><?php echo $title;?></a></h1>
        <ul id="gjhqInfo">
			<?php for($index=0;$index<count($data);$index++):?>
        <li><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
			<?php endfor;?>			
        </ul>
    </div>


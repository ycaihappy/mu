<?php
$title = $type ? '推荐供求' : '推荐供应商';
?>
        <div class="cgal ui-m-tab ui-m-border">      
		<div class="hd">
			<span class="on"><?php echo $title;?></span>
			<a href="#" class="more">更多</a>
		</div>
		<div class="bd">
        	<ul>
        <?php if($advEnt && !$type):
        		foreach ($advEnt as $ent):
        ?>       
        <li><a target="_blank" href="<?php echo $ent->ent_id;?>"><?php echo $ent->ent_name;?></a></li>
        <?php endforeach;
        endif;
        if ( $advEnt && $type)
        {
        		foreach ($advEnt as $ent):
        ?>
    <li><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$ent->supply_id));?>"><?php echo $ent->supply_name;?></a></li>
<?php endforeach; }?>
			</ul>
		</div>
       </div>

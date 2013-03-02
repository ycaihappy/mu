<?php 
if ( $type == 'news')
{
$class = 'middle';
$title = '新闻';
$key = 'art_title';
}
elseif ( $type == 'supply')
{
$class = 'left';
$title = '供求';
$key = 'supply_content';
}
elseif ( $type == 'special')
{
$class = 'home-special left';
$title = '特价';
}
else 
{
$class = 'home-xh';
$title = '现货';
}
?>
    <div class="m-tab-list <?php echo $class;?>">
			<div class="hd">
				<span class="on"><a href="">供求</a></span>			
				<a href="" class="more">更多</a>
			</div>
			<div class="bd">
				<ul class="current">
			<?php for($index=0;$index<count($data);$index++):
						if($index==0):
						?>
                            <li class="b"><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>"><?php echo $data[$index][$key] ?></a></li>
							<?php else :?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>" target="_blank"><?php echo $data[$index][$key] ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
				</ul>
				
			</div>
		</div>

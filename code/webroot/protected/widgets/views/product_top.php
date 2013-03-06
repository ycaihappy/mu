<?php 
if ( $type == 'special')
{
$class = 'home-special left';
$title = '特价';
$flag = false;
}
else 
{
$class = 'home-xh';
$title = '现货';
$flag = true;
}
?>
    <div class="m-tab-list <?php echo $class;?>">
			
			<div class="hd">
            <span class="on"><a href=""><?php echo $title;?></a></span>
            <a href="<?php echo Yii::app()->controller->createUrl('product/index');?>" class="more">更多</a>
			</div>
<?php
if ( $flag)
{
?>
			<div class="fbs">
			<ul>
			<?php if($proTypes):
					foreach ($proTypes as $type):
			?>
			<li><em class="gc01"></em><span><?php echo $type['name']?>：</span><i><?php echo $type['num']?></i></li>
			<?php 
					endforeach;
					endif;
			?>
			
			</ul></div>
<?php } ?>
			<div class="bd">
				<ul class="current">
			<?php for($index=0;$index<count($data);$index++):
							if($index==0):
						?>
                            <li class="b"><a href="<?php echo Yii::app()->controller->createUrl('product/view',array('product_id'=>$data[$index]['product_id']));?>"><?php echo $data[$index]['product_name']; ?></a></li>
							<?php else :?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('product/view',array('product_id'=>$data[$index]['product_id']));?>" target="_blank"><?php echo $data[$index]['product_name']; ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
				</ul>
			</div>
		
		</div>

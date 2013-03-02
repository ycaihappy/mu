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
			<ul><li><em class="gc01"></em><span>低合金板：</span><i>26895</i></li><li><em class="gc02"></em><span>锅炉容器板：</span><i>26895</i></li><li><em class="gc03"></em><span>普碳中板：</span><i>26895</i></li><li><em class="gc04"></em><span>无缝管：</span><i>888</i></li><li><em class="gc05"></em><span>容器板：</span><i>344</i></li><li><em class="gc06"></em><span>耐磨钢板：</span>7527</li><li><em class="gc07"></em><span>高强板：</span><i>876</i></li><li><em class="gc08"></em><span>螺纹钢：</span><i>222</i></li></ul></div>
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

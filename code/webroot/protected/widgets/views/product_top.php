<?php 
if ( $type == 'special')
{
$class = 'left';
$title = '特价';
}
else 
{
$class = 'right';
$title = '现货';
}
?>
    <div class="m-tab-list <?php echo $class;?>">
			
			<div class="hd">
            <span class="on"><a href=""><?php echo $title;?></a></span>
				<a href="" class="more">更多</a>
			</div>
			<div class="bd">
				<ul class="current">
			<?php for($index=0;$index<count($data);$index++):
							if($index==0):
						?>
                            <li class="b"><a href="<?php echo "index.php?r=product/view&product_id=".$data[$index]['product_id']; ?>"><?php echo $data[$index]['product_name']; ?></a></li>
							<?php else :?>
                            <li><a href="<?php echo "index.php?r=product/view&product_id=".$data[$index]['product_id']; ?>" target="_blank"><?php echo $data[$index]['product_name']; ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
				</ul>
			</div>
		
		</div>

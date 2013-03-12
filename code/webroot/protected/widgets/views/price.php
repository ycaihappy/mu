            <div class="m-quot" id="J_Quot">
				<div class="hd">
				<span class="on"><a href="">价格行情</a></span>			
				<a href="<?php echo Yii::app()->controller->createUrl('price/index');?>" class="more">更多</a>
				</div>
				<div class="bd">
					<div class="col-l">
					<p>
<?php echo CHtml::dropDownList( 'sum_product_zone','',$city);?>
<?php echo CHtml::dropDownList( 'sum_product_type','',$category);?>
					</p>
					<div class="chart" id="chart" data-api="chart.php">
						<img src="images/b.png" />
					</div>
					</div>
					<div class="col-r">
						<ul class="current">
						<?php for($index=0;$index<count($data);$index++):
							if($index==0):
						?>
                            <li class="b"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>"><?php echo $data[$index]['art_title'] ?></a></li>
							<?php else :?>
							<li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
				</ul>
					</div>
				</div>
			</div>

			<div class="m-supply-mt">
				<div class="hd">
					<h5>推荐供求</h5>
					<a class="ad"><img src="images/191x100.gif" width="191" height="100" /></a>
				</div>
				<div class="bd">
					<ul>
			<?php for($index=0;$index<count($data);$index++):
            if ( $index < 3) $class='top';
						?>
                      <li class="<?php echo $class;?>"><em><?php echo $index+1;?></em> <a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id'])); ?>" target="_blank"><?php echo $data[$index]['supply_name']; ?></a></li>
					<?php endfor;?>			
					</ul>
					<a class="ad"><img src="images/193x60.gif" width="191" height="60" /></a>
				</div>
				<div class="ft">
					<div class="item">						
						<a class="ad"><img src="images/73x62_1.gif" width="73" height="62" /></a>
						<p>
							<i></i>
                            <a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[3]['supply_id']));?>"><?php echo $data[3]['supply_name'];?></a>
                            <span><?php echo $data[3]['supply_keyword'];?></span>
						</p>
					</div>
					<div class="item">
						
						<a class="ad"><img src="images/73x62_2.gif" width="73" height="62" /></a>
						<p>
							<i></i>
                            <a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[6]['supply_id']));?>"><?php echo $data[6]['supply_name'];?></a>
                            <span><?php echo $data[6]['supply_keyword'];?></span>
						</p>
					</div>
					
				</div>
				
			
			</div>

		<div class="m-supply-news">
			<div class="hd clearfix">
				<span class="on"><a href="">最新求购</a><i></i></span>			
			</div>
			<div class="bd">
				<ul>
					<?php 
					if($data):
						for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>" target="_blank"><?php echo $data[$index]['supply_name']; ?></a></li>
					<?php endfor;
					endif;
					?>			
				</ul>
			</div>
		
		</div>

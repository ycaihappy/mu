	<div class="m-data-center ui-m-tab ui-m-border" id="J_Data_Center">
		<div class="hd">				
			<span class="on"><a href="">行情中心</a></span>
		</div>
		<div class="bd">
			<div class="chart-area">
					<div class="chart" id="chart1" data-api="index.php">
						<img src="images/b.png" />
					</div>
					<div class="chart" id="chart2" data-api="index.php">
						<img src="images/b.png" />
					</div>
			</div>
			<div class="stat-area">
				<div class="list">
					<div class="ui-purple-hd">
						<h6>原料行情</h6>
						<a href="<?php echo Yii::app()->controller->createUrl('price/index');?>" class="more">更多&gt;&gt;</a>
					</div>
					<ul>
			<?php for($index=0;$index<count($data01);$index++):?>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data01[$index]['art_id']));?>" title="<?php echo $data01[$index]['art_title'] ?>" target="_blank"><?php echo $data01[$index]['art_title']; ?></a><em><?php echo date("m-d",strtotime($data01[$index]['art_post_date']));?></em></li>
			<?php endfor;?>			
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="list">
					<div class="ui-purple-hd">
						<h6>价格汇总</h6>
						<a href="<?php echo Yii::app()->controller->createUrl('price/index');?>" class="more">更多&gt;&gt;</a>
					</div>
					<ul>
			<?php for($index=0;$index<count($data02);$index++):?>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data02[$index]['art_id']));?>" title="<?php echo $data02[$index]['art_title']; ?>" target="_blank"><?php echo $data02[$index]['art_title']; ?></a><em><?php echo date("m-d",strtotime($data02[$index]['art_post_date']));?></em></li>
			<?php endfor;?>			
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="price-area">
				<div class="ui-purple-hd  ui-m-border">
						<h6>大宗商品价格表</h6>
						
				</div>
				<div class="bd">
					<table cellspacing="0" cellpadding="0" width="100%">
						<tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
						<tr><td>bb</td><td>189</td><td>-</td><td>香港</td></tr>
					</table>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		
	</div>

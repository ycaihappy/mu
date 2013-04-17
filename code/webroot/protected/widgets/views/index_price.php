<?php  # if($this->beginCache('indexPrice')){ ?>
    <div class="m-data-center ui-m-tab ui-m-border" id="J_Data_Center">
		<div class="hd">				
			<span class="on"><a href="<?php echo Yii::app()->controller->createUrl('/price/query',array('type'=>31));?>">行情中心</a></span>
		</div>
		<div class="bd">
			<div class="chart-area">
					<div class="chart" id="chart1" data-api="<?php echo Yii::app()->controller->createUrl('price/chart',array('type'=>31,'year'=>date("Y"),'to_year'=>date("Y"),'month'=>date("n"),'to_month'=>date("n"),'day'=>date("d")));?>">
						<img src="images/b.png" />
					</div>
					<div class="chart" id="chart2" data-api="<?php echo Yii::app()->controller->createUrl('price/chart',array('type'=>57,'year'=>date("Y"),'to_year'=>date("Y"),'month'=>date("n"),'to_month'=>date("n"),'day'=>date("d")));?>">
						<img src="images/b.png" />
					</div>
			</div>
			<div class="stat-area">
				<div class="list">
					<div class="ui-purple-hd">
						<h6>最新报价</h6>
						<a href="<?php echo Yii::app()->controller->createUrl('price/index');?>" class="more">更多&gt;&gt;</a>
					</div>
					<ul>
<?php for($index=0;$index<6;$index++):
if ( isset($data01[$index]) )
{
            ?>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data01[$index]['art_id']));?>" title="<?php echo $data01[$index]['art_title'] ?>" target="_blank"><?php echo $data01[$index]['art_title']; ?></a><em><?php echo date("m-d",strtotime($data01[$index]['art_post_date']));?></em></li>
			<?php }endfor;?>			
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="list">
					<div class="ui-purple-hd">
						<h6>价格汇总</h6>
						<a href="<?php echo Yii::app()->controller->createUrl('price/index');?>" class="more">更多&gt;&gt;</a>
					</div>
					<ul>
<?php for($index=0;$index<6;$index++):
if (isset($data02[$index])){
            ?>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data02[$index]['art_id']));?>" title="<?php echo $data02[$index]['art_title']; ?>" target="_blank"><?php echo $data02[$index]['art_title']; ?></a><em><?php echo date("m-d",strtotime($data02[$index]['art_post_date']));?></em></li>
			<?php }endfor;?>			
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
<div class="price-area four-hd">
				<div class="ui-purple-hd  ui-m-tab4 ui-m-border">
						<span class="on">稀土资源</span><span>贵金属品</span><span>上海期货</span><span>外汇牌价</span>
						
				</div>
				<div class="bd">
					<ul>
					<table cellspacing="0" cellpadding="0" width="100%">
						<tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
						<?php if($rePrice):
								foreach ($rePrice as $price):
						?>
						<tr><td><?php echo $price->re_name?></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td></tr>
						<?php endforeach;
							endif;
						?>
					</table>
					</ul>
					<ul class="hide">
					<table cellspacing="0" cellpadding="0" width="100%">
						<tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
						<?php if($otherPrice):
								foreach ($otherPrice as $price):
						?>
						<tr><td><?php echo $price->re_name?></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td></tr>
						<?php endforeach;
							endif;
						?>
					</table>
					</ul>
					<ul class="hide">
					<table cellspacing="0" cellpadding="0" width="100%">
						<tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
						<?php if($otherPrice):
								foreach ($otherPrice as $price):
						?>
						<tr><td><?php echo $price->re_name?></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td></tr>
						<?php endforeach;
							endif;
						?>
					</table>
					</ul>
					<ul class="hide">
					<table cellspacing="0" cellpadding="0" width="100%">
						<tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
						<?php if($otherPrice):
								foreach ($otherPrice as $price):
						?>
						<tr><td><?php echo $price->re_name?></td><td><?php echo $price->re_price?></td><td><?php echo $price->re_fallup?></td><td><?php echo $price->re_market?></td></tr>
						<?php endforeach;
							endif;
						?>
					</table>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php #$this->endCache(); } ?>

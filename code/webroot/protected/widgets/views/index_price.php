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
						<h6>国内行情</h6>
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
						<h6>国际行情</h6>
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
						<div class="tabcontent ui-m-border">
						<h5> 行情</h5>
						<a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_all.html" target="_blank"> <b>汇总行情</b></a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_cu.html" target="_blank">铜</a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_al.html" target="_blank">铝</a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_zn.html" target="_blank">锌</a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_au.html" target="_blank">黄金</a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_fu.html" target="_blank">燃油料</a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/delaymarket_ru.html" target="_blank">天然橡胶</a>
						<h5> 日统计数据</h5>
						<a href="sfe.aspx?l=http://www.shfe.com.cn/statements/hq_kx.html" target="_blank">交易快讯</a> | <a href="sfe.aspx?l=http://www.shfe.com.cn/statements/hq_pm.html" target="_blank"> 交易排行</a>
						<h5> 周统计数据</h5>
						<a href="sfe.aspx?l=http://www.shfe.com.cn/statements/hq_week.html" target="_blank"> 每周行情</a>
						<h5> 月统计数据</h5>
						<a href="sfe.aspx?l=http://www.shfe.com.cn/statements/hq_month.html" target="_blank"> 每月行情</a> </div>
					</ul>
					<ul class="hide">
					<table cellspacing="0" cellpadding="0" width="100%" class="small">
						<tr><th>币种</th><th>交易单位</th><th>中间价</th><th>现钞买入价</th><th>卖出价</th></tr>
						<tr><td>美元(USD)</td><td>100</td><td>617.5</td><td>554</td><td>444</td></tr>
						<tr><td>美元(USD)</td><td>100</td><td>617.5</td><td>554</td><td>444</td></tr>
						<tr><td>美元(USD)</td><td>100</td><td>617.5</td><td>554</td><td>444</td></tr>
						<tr><td>美元(USD)</td><td>100</td><td>617.5</td><td>554</td><td>444</td></tr>
						<tr><td>美元(USD)</td><td>100</td><td>617.5</td><td>554</td><td>444</td></tr>
						<tr><td>美元(USD)</td><td>100</td><td>617.5</td><td>554</td><td>444</td></tr>
					</table>
					
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php #$this->endCache(); } ?>

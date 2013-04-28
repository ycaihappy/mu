	<?php 
#	$this->breadcrumbs=array(
#	'首页'=>array('/site/index'),
#	'行情中心'=>array('index'),
#	$categoryName,
#	);
	?>
<div class="layout-area">
<div class="grid-690">
	<!--module list-->
	<div class="m-summary-list ui-m-tab ui-m-border">

          <div class="bd">
                <table width="100%" cellpadding="0" border="0">
					<tr>
						<th>发布日期</th><th>星期</th><th colspan="2" width="150">市场价格</th><th colspan="2" width="150">现货价格</th><th colspan="2" width="150">国际价格</th>
					</tr>
                    <?php 
    $week = array('星期一','星期二','星期三','星期四','星期五','星期六','星期日');
                    	if($summary):
                    		foreach ($summary as $d_key=>$sum_one):
                    ?>
                            <tr>
                                <td><?php echo date("Y-m-d",strtotime($d_key));?></td>
                                <td><?php echo $week[(int)date("N", strtotime($d_key))-1];?></td>
                                <td><?php echo isset($sum_one[148]) ? $sum_one[148][0] : "-";?></td>
								<td><?php echo isset($sum_one[148]) ? $sum_one[148][1] : "-";?></td>
                                <td><?php echo isset($sum_one[149]) ? $sum_one[149][0] : "-";?></td>
								<td><?php echo isset($sum_one[149]) ? $sum_one[149][1] : "-";?></td>
                                <td><?php echo isset($sum_one[163]) ? $sum_one[163][0] : "-";?></td>
								<td><?php echo isset($sum_one[163]) ? $sum_one[163][1] : "-";?></td>
                            </tr>
                   <?php endforeach;
                   endif;?>     
 

                </table>
			</div>	
            </div>

	<!--module list-->
	</div>
	<div class="grid-250">
	</div>
	
	
	<div class="m-news-rank wgt-tab  wgt-tab-1">
			<?php $this->widget('TopRankingPriceWidget');?>
    </div>
</div>

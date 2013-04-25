	<?php 
	$this->breadcrumbs=array(
	'首页'=>array('/site/index'),
	'行情中心'=>array('index'),
	$categoryName,
	);
	?>
<div class="layout-area">
<div class="grid-690">
	<!--module list-->
	<div class="m-summary-list ui-m-tab ui-m-border">
			<div class="hd">
				 <span class="on"><?php echo $categoryName?></span>
			</div>
          <div class="bd">
                <table width="100%" cellpadding="0" border="0">
					<tr>
						<th>发布日期</th><th>星期</th><th>栾川(元/吨)</th><th>栾川(元/吨)</th><th>栾川(元/吨)</th>
					</tr>
                    <?php 
                    	if($newses):
                    		foreach ($newses as $news):
                    ?>
                            <tr>
                            	<td><?php echo date('m月d日',strtotime($news->art_post_date))?></td>
                                <td><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></td>
								<td>12121</td>
								<td>12121</td>
								<td>12121</td>
                            </tr>
                   <?php endforeach;
                   endif;?>     
 

                </table>
			</div>	
            </div>
			<div class="page" id="fenye">
				<?php
					$this->widget('CLinkPager',array(
								'header'=>'',
								'firstPageLabel'=>'首页',
								'lastPageLabel'=>'末页',
								'prevPageLabel'=>'上一页',
								'nextPageLabel'=>'下一页',
								'pages'=>$pager,
								'maxButtonCount'=>13,
								)
					
					);
				?>
			</div>
	<!--module list-->
	</div>
	<div class="grid-250">
	</div>
	
	
	<div class="m-news-rank wgt-tab  wgt-tab-1">
			<?php $this->widget('TopRankingPriceWidget');?>
    </div>
</div>

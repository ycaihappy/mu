	<?php 
	$this->breadcrumbs=array(
	'首页'=>array('/site/index'),
	'新闻中心'=>array('index'),
	$categoryName,
	);
	?>
<div class="layout-area">
<div class="grid-690">
	<!--module list-->
	<div class="m-news-list ui-m-tab ui-m-border">
			<div class="hd">
				 <span class="on"><?php echo $categoryName?></span>
			</div>
              <div class="bd">
                <ul>
                    <?php 
                    	if($newses):
                    		foreach ($newses as $news):
                    ?>
                            <li>
                            	<span><?php echo date('m月d日',strtotime($news->art_post_date))?></span>
                                <a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a>
                            </li>
                   <?php endforeach;
                   endif;?>     
 

                </ul>
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
			<?php $this->widget('TopRankingNewsWidget');?>
    </div>


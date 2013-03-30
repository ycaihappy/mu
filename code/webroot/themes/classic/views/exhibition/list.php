	<?php 
	$this->breadcrumbs=array(
	'首页'=>array('/site/index'),
	'钼展会'=>array('list'),
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
               
                <ul>
                    <?php 
                    	if($exhibitions):
                    		foreach ($exhibitions as $exhibition):
                    ?>
                            <li>
                            	<span><?php echo date('m月d日',strtotime($exhibition->art_post_date))?></span>
                                <a target="_blank" href="<?php echo $this->createUrl('/exhibition/view',array('art_id'=>$exhibition->art_id))?>"><?php echo $exhibition->art_title?></a>
                            </li>
                   <?php endforeach;
                   endif;?>     
 

                </ul>
				
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
			<?php $this->widget("ExhibitionRecommendWidget",array('type'=>1));?>
			<?php $this->widget("ExhibitionRecommendWidget",array('type'=>2));?>
			<?php $this->widget("ExhibitionRecommendWidget",array('type'=>3));?>
    </div>
</div>

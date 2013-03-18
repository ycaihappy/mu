
	

<div class="layout main">

	<div class="layout-area">
		
		<!--left-->
		<div class="m-topnews">          
            
     	<?php  $this->widget('Top4NewsWidget');?>
        <div class="news ui-m-tab ui-m-border">
			<div class="hd">
				<span class="on">本网视点</span>
			</div>
			<div class="bd">
			<?php $this->widget('ViewpointNewsWidget');?>	
			</div>
        </div>
        <div class="news ui-m-tab ui-m-border">
			<div class="hd">
				<span class="on">热点新闻</span>
			</div>
			<div class="bd">
			<?php $this->widget('TopHotSpotNewsWidget');?>
			</div>
		</div>
        </div>
		<!--left-->
		<!--right-->
		<div class="m-news-slider">
		<div class="area-sub">
			<div>
			<?php if($adv):?>
				<a href="<?php echo $adv[0]->ad_link?>"><img width="560" height="30" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>"></a>
			<?php endif;?>
			</div>
		</div>
	
	<div class="widget-slide widget-slide-2" id="J_News_Slider">
	<?php  $this->widget('FlashSliderNewsWidget')?>
  </div>
</div>
		
		<div class="col-l">
		<!--module 1-->
		
			<div class="m-news-two ui-m-tab ui-m-border">
				<?php $this->widget('TopTrendsNewsWidget');?>
            </div>
			
		<!--module 1-->
		
		<!--module 2-->
		
		<div class="m-news-rank wgt-tab  wgt-tab-1">
       
		<?php $this->widget('TopRankingNewsWidget')?>
    </div>
		
		<!--module 2-->
		</div>
		<!--right-->
		
		<div class="m-banner">
			<?php if($adv1):?>
				<a href="<?php echo $adv1[0]->ad_link?>"><img width="960" height="100" src="<?php echo '/images/advertisement/'.$adv1[0]->ad_media_src?>"></a>
			<?php endif;?>
		</div>
		
		<div class="clearfix"></div>
	</div>
	<div class="layout-area">
		
		
		<!--module-->
		
		
		<div class="m-news-focus">
		
	
		
		<div class="mod">
  <?php $this->widget('NewestBusinessNewsWidget')?>
               </div>
			   <div class="mod">
               <?php $this->widget('NewestStockNewsWidget');?>
            </div>
		
		</div>
		
		
		<!--module-->
		
		
		<div class=" mod ui-m-tab right ui-m-border">
			<?php $this->widget('Newest10NewsWidget');?>
		</div>
		<div class="clearfix"></div>
	</div>

</div>

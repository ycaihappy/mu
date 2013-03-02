
	

<div class="layout main">

	<div class="layout-area">
		
		<!--left-->
		<div class="m-topnews">
            
            
     	<?php  $this->widget('Top4NewsWidget');?>
        <div class="news">
		<?php $this->widget('ViewpointNewsWidget');?>	
        </div>
        <div class="news no_border">
			<?php $this->widget('TopHotSpotNewsWidget');?>
        </div>
        </div>
		<!--left-->
		<!--right-->
		<div class="m-news-slider">
		<div class="area-sub">
			<div>
				<a href="http://g.163.com/a?CID=19585&amp;Values=842817231&amp;Redirect=http://go.163.com/2013/0131/xijiu/shipin.html"><img width="560" height="30" src="http://img1.126.net/channel4/013486/xijiu56030_0124.jpg"></a>
			</div>
		</div>
	
	<div class="widget-slide widget-slide-2" id="J_News_Slider">
	<?php  $this->widget('FlashSliderNewsWidget')?>
  </div>
</div>
		
		<div class="col-l">
		<!--module 1-->
		
			<div class="m-news-two">
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
			<img src="images/960x100.gif" width="960" height="100" />
		</div>
		
		<div class="clearfix"></div>
	</div>
	<div class="layout-area">
		
		<div class="layout-left">
		<!--module-->
		
		
		<div class="m-news-focus">
		
		<div id="jjsc" class="area">
		<div class="title-bar ui-til1"><h2><a><img width="140" height="30" src="http://img3.cache.netease.com/cnews/temp/img/economy-market.png" alt="经济.市场"></a></h2>
        <div class="links right">
           
        </div>
    </div>
		</div>
		
		<div class="mod">
  <?php $this->widget('NewestBusinessNewsWidget')?>
               </div>
			   <div class="mod">
               <?php $this->widget('NewestStockNewsWidget');?>
            </div>
		
		
		
		</div>
		
		
		<!--module-->
		</div>
		
		<div class="m-tab-list right">
			<?php $this->widget('Newest10NewsWidget');?>
		</div>
		<div class="clearfix"></div>
	</div>

</div>

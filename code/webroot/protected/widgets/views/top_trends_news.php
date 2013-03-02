<h2>
	<span>
	 <a target="_blank" href="/domestic.html">更多</a>
	</span>
	<a target="_blank" href="hangye.html">行业动态</a>
</h2>
	<div class="n2top">
         <a href="http://news.steelcn.com/a/104/20130125/6198023364473A.html">
         	<img src="http://img.cache.steelcn.com/uploadfiles/images/2013/01/25110044982.jpg">
         </a>
         <h4>
         	<a target="_blank" href="<?php echo $trendsOne->art_source?>"><?php echo $trendsOne->art_title?></a>
         </h4>
         <p><?php echo $trendsOne->art_content;?></p>
	</div>
    <ul class="m2_ul">
<?php 
	if ($trendsNews):
	 foreach ($trendsNews as $news):?>
	 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
	<?php endforeach;
	endif;
	?>
</ul>
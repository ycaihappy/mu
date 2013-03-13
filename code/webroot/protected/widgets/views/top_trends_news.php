<h2>
	<span>
	 <a target="_blank" href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">更多</a>
	</span>
	<a target="_blank" href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">行业动态</a>
</h2>
	<div class="n2top">
         <a href="<?php echo $this->getController()->createUrl('/news/view',array('art_id'=>$trendsOne->art_id))?>">
         	<img src="<?php echo $trendsOne->art_img?>">
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
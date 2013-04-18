<div class="hd ui-tab-3">
	<span class="on"><a target="_blank" href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">钼业动态</a></span>
	<a target="_blank" href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>" class="more">更多</a>
</div>
<div class="bd">
	<div class="n2top">
		<?php if(@$trendsOne):?>
         <a href="<?php echo $this->getController()->createUrl('/news/view',array('art_id'=>$trendsOne->art_id))?>">
         	<img src="<?php echo $trendsOne->art_img?>">
         </a>
         <h4>
         	<a target="_blank" href="<?php echo $trendsOne->art_source?>"><?php echo $trendsOne->art_title?></a>
         </h4>
         <p><?php echo $trendsOne->art_content;?></p>
         <?php endif;?>
	</div>
    <ul class="m2_ul">
<?php 
	if (@$trendsNews):
        $i=0;
    foreach ($trendsNews as $news):
        if ( $i > 9) continue;
?>
	 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php $i++;
endforeach;
	endif;
	?>
</ul>
</div>

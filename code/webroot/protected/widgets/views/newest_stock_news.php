 <div class="title-bar ui-til4">
      <h2><a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>44))?>">股票</a></h2>
      <span class="more link">

                        <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>44))?>">更多</a>
     </span>
</div>
<div class="mod-list main-list news-date-list">
    <h3 class="bigsize">
		<a href="<?php echo $stockOne->art_source?>"><?php echo $stockOne->art_title?></a>
	</h3>
	<ul class="mod-list main-list">
		<?php 
		if ($stockNews):
		 foreach ($stockNews as $news):?>
		 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
		<?php endforeach;
		endif;
		?> 
	</ul>
                    
</div>
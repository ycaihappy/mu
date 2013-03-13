              <div class="title-bar ui-til4"><h2><a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">财经</a></h2>
                    <span class="more link">
                        <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">更多</a></span>
                </div>
	<div class="mod-list main-list news-date-list">
	<h3 class="bigsize">
	<a href="<?php echo $businessOne->art_source?>"><?php echo $businessOne->art_title?></a>
	</h3>
	<ul class="mod-list main-list">
		<?php 
		if ($businessNews):
		 foreach ($businessNews as $news):?>
		 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
		<?php endforeach;
		endif;
		?> 
	</ul>
	 </div>
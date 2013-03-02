              <div class="title-bar ui-til4"><h2><a href="http://money.163.com/">财经</a></h2>
                    <span class="more link">
                        <a href="http://money.163.com/stock/">股票</a> <span class="cLGray">|</span>
                        <a href="http://biz.163.com/">商业</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/licai/">理财</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/finance/">金融</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/fund/">基金</a></span>
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
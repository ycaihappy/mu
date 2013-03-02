 <div class="title-bar ui-til4">
      <h2><a href="http://money.163.com/stock/">股票</a></h2>
      <span class="more link"><a href="http://money.163.com/ipo/">新股</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/yanbao">研报</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/hkstock">港股</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/usstock">美股</a> <span class="cLGray">|</span>
                        <a href="http://i.money.163.com/">自选股</a>
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
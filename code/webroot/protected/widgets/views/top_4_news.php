<div class="topnews">
   <h4><a target="_blank" href="http://a/104/20130204/621599E63AA32F.html">政策向好 钢价有望上攻4200</a></h4>
   <p>[导读]近期,国内钢材现货市场价格小幅波动，由于春节渐近，贸易商积极性不高，部分商家提前离市，但是由于铁矿石、焦炭价格坚挺，成本支撑强劲，使得钢价保持高位盘整格局。螺纹钢期货价格走势整体强于现货，导致期现价差由负转正。自去年四季度以来，国家连续出台利好政策，使得市场对后市需求预期向好，节前螺纹钢主力合约有望上冲4200关口。总体来看，钢价易涨难跌，趋势多单可继续持有。</p>
</div>
<div class="news">
<h4>
<a target="_blank" href="<?php echo $topOne->art_source?>"><?php echo $topOne->art_title?></a>
</h4>

<ul>
<?php 
if ($top4News):
 foreach ($top4News as $news):?>
 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php endforeach;
endif;
?> 
</ul>
</div>
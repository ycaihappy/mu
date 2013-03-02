	
	<div class="m-news-nav">
		<div class="nav">
		<ul>
                	<li class="bgnone"><a href="http://www.gtxh.com" title="首页">行情首页</a></li>
                    <li><a href="http://steel.gtxh.com" title="中国钢铁资源库">钢材行情</a></li>
                    <li><a href="http://market.gtxh.com" title="中国钢铁现货超市">钢材行情</a></li>
                    <li><a href="http://news.gtxh.com" title="中国钢铁信息库">特钢行情</a></li>
                    <li><a href="http://news.gtxh.com/yanjiuzhongxin/" title="研究中心">价格汇总</a></li>
                    <li><a href="http://bbs.gtxh.com" title="钢铁社区">当日报价</a></li>
                    <li><a href="http://union.gtxh.com" target="_blank">市场评论</a></li>
                    <li><a href="http://hyjy.gtxh.com" title="行业视频">分析预测</a></li>
                    <li><a href="http://www.gtxh.com/go/g.aspx?g=https://www.gopay.com.cn/index.jsp?source=0000008061" target="_blank">走势图</a></li>
                </ul>
		</div>
	</div>
	
	
	
	<!--news nav-->
	
		<div class="m-banner">
			<img src="images/960x100.gif" width="960" height="80" />
		</div>
	
</div>

<div class="layout main">

	<div class="layout-area">
	<div class="hq-col-l">
	
		<!--module 1-->
        <?php $this->widget("PriceWorldWidget");?>
		<!--module 1-->	
		</div>
		
		<!--module 2-->
        <?php $this->widget("PriceNewsWidget");?>
		<!--module 2-->
		
		<!--module 3-->
        <?php $this->widget("PriceTodayWidget");?>
		<!--module 3-->
		
		<div class="clearfix"></div>
	</div>
	
	<div class="layout-area">
	<div class="hq-col-l">
	<!--module 1-->
     <?php #$this->widget("PriceAreaWidget");?>
	<!--module 1-->
     <?php $this->widget("PriceChinaWidget");?>
	<!--module 2-->
	<div class="hq-col-r">
     <?php $this->widget("PriceBodyWidget", array('type'=>1));?>

	<div class="m-banner">
			<img src="images/960x100.gif" width="700" height="80" />
		</div>
     <?php $this->widget("PriceBodyWidget", array('type'=>2));?>

	</div>
	<!--module 2-->
	</div>
	<div class="layout-area">
	<!--module 1-->
     <?php $this->widget("PriceEnterpriseWidget");?>
	<!--module 1-->
	</div>

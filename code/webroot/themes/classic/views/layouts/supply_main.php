<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>


<div id="p_supply_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>

	<div class="m-news-nav">
		<div class="nav">
		<ul>
                	<li class="bgnone"><a href="http://www.gtxh.com" title="首页">首页</a></li>
                    <li><a href="http://steel.gtxh.com" title="中国钢铁资源库">资源库</a></li>
                    <li><a href="http://market.gtxh.com" title="中国钢铁现货超市">现货超市</a></li>
                    <li><a href="http://news.gtxh.com" title="中国钢铁信息库">信息库</a></li>
                    <li><a href="http://news.gtxh.com/yanjiuzhongxin/" title="研究中心">研究中心</a></li>
                    <li><a href="http://bbs.gtxh.com" title="钢铁社区">钢铁社区</a></li>
                    <li><a href="http://union.gtxh.com" target="_blank">搜索联盟</a></li>
                    <li><a href="http://hyjy.gtxh.com" title="行业视频">行业视频</a></li>
                    <li><a href="http://www.gtxh.com/go/g.aspx?g=https://www.gopay.com.cn/index.jsp?source=0000008061" target="_blank">国付宝</a></li>
                </ul>
		</div>
	</div>
	

</div>

<div class="layout main">

	<div class="layout-area">
		
		
		<div class="grid-690">

    <?php echo $content;?>
		
		</div>
	
	</div>
	
	<div class="layout-area">
		<?php $this->widget("FriendLinkWidget");?>
	</div>
	
	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	</div>
	

</div>




</div>
<?php $this->widget("CommonFooterWidget");?>
</body>
</html>

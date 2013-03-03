<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_xh_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<?php $this->widget('SearchWidget');?>
	<!--news nav-->
	
	
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
	
	
	
	<!--news nav-->
	
</div>

<div class="layout main">

	<div class="layout-area">
		
		<?php 
		$this->widget('ProductIndexLeftWidget');
		?>
		<!--left-->
		<!--right-->

		<?php echo $content;?>

		<!--right-->
	
		
		<div class="clearfix"></div>
	</div>

	
	
	<div class="layout-area">
		<div class="m-link">
			<div class="hd">
				<span>友情链接</span>
				<p>欢迎电子工业欢迎电子工业欢迎电子工业<em>(加QQ时请通过)</em></p>
				<div class="clearfix"></div>
				<div class="link-list">
					<a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a><a>钢X网</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="layout-area">
		<div class="m-footer">
		<p class="first"><a>公司简介</a> | <a>广告服务</a> | <a>联系方式</a> | <a>服务项目</a> | <a>公司动态</a> | <a>工作机会</a> | <a>网站地图</a> | <a>公司简介</a> | <a>公司简介</a> | <a>公司简介</a></p>
		<p>客服热线：400-0000-0000  0766-1111111 / 11111111 / 1111111 传真：0443-11111111</p>
		<p>Copyright &copy; 1998 - 2012 中国XX网 All Rights Reserved</p>
		<p>全国咨询/投诉电话：400-000-0000   E-mail:kf@xxxx.com ICP证1003232</p>
		
		<p class="fa"> <a class="fa1" target="_blank" href="http://www.cqc.com.cn"></a> <a class="fa2" target="_blank" href="http://www.smestar.com/detail.credit?action=preLevel&amp;credcode=NO.20000001143"></a> <a class="fa3" target="_blank" href="http://www.e-315.org"></a> <a class="fa4" target="_blank" href="http://www.isc.org.cn"></a> <a class="fa5" target="_blank" href="http://www.ec.org.cn"></a> <a class="fa6" target="_blank" href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1697657781"></a> 
	</p>
		
		</div>
	</div>
	

</div>




</div>




<?php 
$this->widget("CommonFooterWidget");
?>
</body>
</html>
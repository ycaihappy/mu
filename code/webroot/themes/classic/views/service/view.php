<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_service" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<div class="m-logo">
		<a target="_self" href="<?php echo $this->createUrl('/site/index')?>" class="logo"><img title="mushw.com - 钼市网" alt="zzz" src="/images/logo.jpg"></a>
	</div>
</div>

<div class="layout main">
	<div class="m-service-detail">
	<div class="hd"></div>
	<div class="bd">
	<div class="ui-m-crumb">
		<p>你当前位置：<a>钼服务</a><em>&gt;</em><span>客户服务</span></p>
	</div>
	<div class="cont">
	<div class="grid-254">
	
	<div class="service-menu ui-m-border">
		<div class="hd"></div>
		<div class="bd">
			<ul>
				<li class="on"><a href="">仓单质押</a><i class="arrow"></i></li>
				<li><a href="">仓单质押</a><i class="arrow"></i></li>
				<li><a href="">仓单质押</a><i class="arrow"></i></li>
				<li><a href="">仓单质押</a><i class="arrow"></i></li>
				<li><a href="">仓单质押</a><i class="arrow"></i></li>
				<li class="last"><a href="">仓单质押</a><i class="arrow"></i></li>
			</ul>
		</div>
		<div class="ft"></div>
	</div>
	
<?php $this->widget('ServiceContact');?>
</div>
	
	<div class="grid-680">
		
 <div class="m-article-detail">
			<div>
            <h1><?php echo $service['art_title'];?></h1>
                  <div class="tit-bar clearfix">
					<div class="ll">
                    <span class="color-a-0"></span><span class="bor-tit"></span><span class="color-a-1" ><a target="_blank" href=""><?php echo $service['art_source'];?></a></span><span class="infoMblog"><span class="color-a-2"></span></span><span class="article-time">发布时间：<?php echo $service['art_post_date'];?></span><span class="bor-tit"></span></div>

					</div>
                 
                    <div class="line"></div>
                    <div class="content ui-m-border">
<?php echo $service['art_content'];?>                      

                    </div>

                </div>
		</div>
		
		
	</div>
	
	</div>
	</div>
	</div>
		
		
		
	
	

	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	

</div>




</div>
<?php $this->widget("CommonFooterWidget");?>
</body>
</html>
       
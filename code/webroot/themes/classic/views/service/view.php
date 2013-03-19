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
		<p>你当前位置：<a href="<?php echo $this->createUrl('/service/index')?>">钼服务</a><em>&gt;</em><span><?php echo $service['art_title'];?></span></p>
	</div>
	<div class="cont">
	<div class="grid-254">
	
	<div class="service-menu ui-m-border">

		<div class="bd">
			<ul>
			<?php 
			$class1=$class2=$class3=$class4=$class5=$class6=$class7='';
			switch ($service['art_id'])
			{
				case 651:
					$class1='on';
					break;
				case 652:
					$class2='on';
					break;
				case 653:
					$class3='on';
					break;
				case 654:
					$class4='on';
					break;
				case 655:
					$class5='on';
					break;
				case 656:
					$class6='on';
					break;
				case 657:
					$class7='on';
					break;
			}
			?>
				<li class="<?php echo $class1?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>651))?>">仓储金融服务</a><i class="arrow"></i></li>
				<li class="<?php echo $class2?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>652))?>">仓单质押(现货通)</a><i class="arrow"></i></li>
				<li class="<?php echo $class3?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>653))?>">动产质押逐笔控制服务</a><i class="arrow"></i></li>
				<li class="<?php echo $class4?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>654))?>">动产质押总量控制服务</a><i class="arrow"></i></li>
				<li class="<?php echo $class5?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>655))?>">配送服务</a><i class="arrow"></i></li>
				<li class="<?php echo $class6?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>656))?>">前置现货通</a><i class="arrow"></i></li>
				<li class="last <?php echo $class7?>"><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>657))?>">质检服务</a><i class="arrow"></i></li>
			</ul>
		</div>
	
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
       
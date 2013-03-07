<?php 

$class_user = $class_password = $class_company = $class_cert = $class_news = '';
$class_supply = $class_goods = $class_template = $class_slist = $class_glist = $class_nlist = '';
switch (Yii::app()->controller->action->id)
{
case 'detail':
    $class_user ="on";
    break;
case 'password':
    $class_password = "on";
    break;
case 'company':
    $class_company="on";
    break;
case 'cert':
    $class_cert = "on";
    break;
case 'news':
    $class_news = "on";
    break;
case 'nlist':
    $class_nlist = "on";
    break;
case 'supply':
    $class_supply = "on";
    break;
case 'goods':
    $class_goods = "on";
    break;
case 'templateSetting':
    $class_template = "on";
    break;
case "slist":
    $class_slist = "on";
    break;
case 'glist':
    $class_glist ="on";
    break;
}
?>


<div class="m-left-panel" id="J_LeftPanel">
	<h3><a>用户管理</a></h3>
	<ul>
    <li class="<?php echo $class_user;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/detail');?>" >基本信息</a></li>
    <li class="<?php echo $class_password;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/password');?>" >修改密码</a></li>
		<!-- <li><a href="#" >账号升级</a></li> -->
	</ul>
	<h3><a>企业管理</a></h3>
	<ul>
    <li class="<?php echo $class_company;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/company');?>" >基本信息</a></li>
    <li class="<?php echo $class_cert;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/cert');?>" >企业资质</a></li>
    <li class="<?php echo $class_nlist;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/nlist');?>" >企业新闻</a></li>
    <li class="<?php echo $class_news;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/news');?>" >添加新闻</a></li>
		<!-- <li><a href="index.php?r=uehome/user/ad" >广告中心</a></li> -->
		<!-- <li><a href="index.php?r=uehome/user/job" >人才招聘</a></li> -->
	</ul>
	<h3><a>供求管理</a></h3>
	<ul>
    <li class="<?php echo $class_slist;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/slist');?>" >供求列表</a></li>
    <li class="<?php echo $class_supply;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/supply');?>" >发布供求</a></li>

	</ul>
	<h3><a>现货管理</a></h3>
	<ul>
    <li class="<?php echo $class_glist;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/glist');?>" >现货列表</a></li>
    <li class="<?php echo $class_goods;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/goods');?>" >添加现货</a></li>
		<!-- <li><a href="index.php?r=uehome/user/special" >特价产品</a></li> -->
	</ul>
	<h3><a>旺铺管理</a></h3>
	<ul>
    <li class="<?php echo $class_template;?>"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/templateSetting');?>" >主页设置</a></li>
	</ul>
	</div>
	

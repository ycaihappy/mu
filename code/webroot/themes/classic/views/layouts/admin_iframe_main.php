<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>钼市网--管理后台</title>
<link rel="stylesheet" href="css/admin.css">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>
<body>
<div id="p_index" class="pg-layout"><?php 
$this->widget("AdminHeader");
$this->widget("AdminLeftMenu");
?> <?php $indexAction='site/manageTerm';

switch (Yii::app()->request->getParam('type',0))
{
	case 1:
		$indexAction='site/manageTerm';
		break;
	case 2:
		$indexAction='user/manageUser';
		break;
	case 3:
		$indexAction='site/manageBasicSiteInfo';
		break;
	case 4:
		$indexAction='product/manageProduct';
		break;
	case 5:
		$indexAction='article/manageNews';
		break;
	case 6:
		$indexAction='advertisementRecommend/manageAdvertisement';
		break;
	case 7:
		$indexAction='system/manageMessageTemplate';
		break;
	default:
		$indexAction='site/frontPage';
}
?>
<div class="m-main-frame" id="J_MainFrame"><iframe scrolling="auto"
	frameborder="no" hidefocus="" id="mainFrame" name="mainFrame"
	src="<?php echo Yii::app()->controller->createUrl($indexAction)?>"></iframe>
</div>

</div>
<?php $this->widget("AdminFooter");?>
</body>
</html>

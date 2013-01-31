<div class="m-left-panel" id="J_LeftPanel" >
<h3>常规操作</h3>
    <?php switch(Yii::app()->request->getParam('type',1)):
case 3:
case 1:
	  $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'网站基本信息设置', 'url'=>array('site/manageTerm'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'地区管理', 'url'=>array('site/manageCity'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'基本类别管理', 'url'=>array('site/manageTerm'),'linkOptions'=>array('target'=>'mainFrame')),
				
				),
		));
break;
case 2:
  $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'会员管理', 'url'=>array('user/manageProduct'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'管理员管理', 'url'=>array('user/manageSpecial'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'角色管理', 'url'=>array('user/manageSupply'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'角色管理', 'url'=>array('user/manageSupply'),'linkOptions'=>array('target'=>'mainFrame')),
				),
		)); 
		
break;
case 4:
		  $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'现货管理', 'url'=>array('product/manageProduct'),'linkOptions'=>array('target'=>'mainFrame'),'active'=>true),
				array('label'=>'特价管理', 'url'=>array('product/manageSpecial'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'供应管理', 'url'=>array('product/manageSupply'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'求购管理', 'url'=>array('product/manageBuy'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'企业库管理', 'url'=>array('product/manageEnterprise'),'linkOptions'=>array('target'=>'mainFrame')),
				
				),
		)); 
break;
case 5:
 $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'新闻管理', 'url'=>array('article/manageNews'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'行情管理', 'url'=>array('article/managePrice'),'linkOptions'=>array('target'=>'mainFrame')),
				
				),
		)); 
		break;
case 6:
 $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'广告管理', 'url'=>array('advertisementRecommend/manageAdvertisement'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'推荐管理', 'url'=>array('advertisementRecommend/manageRecommend'),'linkOptions'=>array('target'=>'mainFrame')),
				),
		)); 
		endswitch;?>
</div>
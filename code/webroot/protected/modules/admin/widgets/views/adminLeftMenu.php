<div class="m-left-panel" id="J_LeftPanel" >
<h3>常规操作</h3>
    <?php switch(Yii::app()->request->getParam('type',1)):
case 3:
case 1:
	  $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'网站基本信息设置', 'url'=>array('site/manageBasicSiteInfo'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'网站基本设置之描述', 'url'=>array('site/manageSiteDescription'),'linkOptions'=>array('target'=>'mainFrame',)),
				array('label'=>'地区管理', 'url'=>array('site/manageCity'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'基本类别管理', 'url'=>array('site/manageTerm'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'邮件设置', 'url'=>array('site/manageSiteEmailSetting'),'linkOptions'=>array('target'=>'mainFrame',)),
				array('label'=>'短信设置', 'url'=>array('site/manageSMSSetting'),'linkOptions'=>array('target'=>'mainFrame',)),
				array('label'=>'网站友情链接', 'url'=>array('site/manageFLink'),'linkOptions'=>array('target'=>'mainFrame',)),
				),
		));
break;
case 2:
  $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'会员管理', 'url'=>array('user/manageUser'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'管理员管理', 'url'=>array('user/manageAdminUser'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'旺铺模板管理', 'url'=>array('user/manageUserTemplate'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'友情链接管理', 'url'=>array('user/manageFLink'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'角色管理', 'url'=>array('user/manageAuthItem'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'功能管理', 'url'=>array('user/generateNewRightOpers'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'会员组管理', 'url'=>array('user/manageUserGroup'),'linkOptions'=>array('target'=>'mainFrame')),
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
$html=<<<tree
<ul>
	<li>
		<a href="{$this->getController()->createUrl('article/manageNews')}" target="mainFrame">文章管理</a>
		<ul>
tree;
foreach ($articleType as $key=>$name)
{
$url=$this->getController()->createUrl('article/manageNews',array('Article[art_category_id]'=>$key));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$name}管理</a></li>
tree;
}
$html.=<<<tree
		</ul>
	</li>
	<li><a href="{$this->getController()->createUrl('article/manageImageLibary')}" target="mainFrame">图库管理</a></li>
	<li><a href="{$this->getController()->createUrl('article/managePriceSummary')}" target="mainFrame">行情走势数据</a></li>
</ul>
tree;
echo $html;

	/*$this->widget('system.web.widgets.CTreeView',array(
	 	'animated' => 'normal',
		'htmlOptions'=>array('class'=>'treeview-gray'),
		'data'=>array(
			array(
				'text'=>'文章管理',
			 	'expanded' => false,
				'children'=>array(
					array('text'=>'<a target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/manageNews',array('Article[art_category_id]'=>17)).'" >新闻管理</a>'),
					array('text'=>'<a  target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/manageNews',array('Article[art_category_id]'=>16)).'" >行情管理</a>'),
					array('text'=>'<a  target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/manageNews',array('Article[art_category_id]'=>20)).'" >百科管理</a>'),
					array('text'=>'<a  target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/manageNews',array('Article[art_category_id]'=>98)).'" >展会管理</a>'),
					array('text'=>'<a  target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/manageNews',array('Article[art_category_id]'=>103)).'" >服务管理</a>'),
				),
			),
			array(
				'hasChildren'=>false,
				'text'=>'<a target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/manageImageLibary').'">图库管理</a>',
			),
			array(
				'hasChildren'=>false,
				'text'=>'<a target="mainFrame" href="'.$this->getController()->createUrl('/admin/article/managePriceSummary').'">行情走势数据</a>',
				'children'=>array(),
			),
			
		),
	));
 /*$this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'文章管理', 'url'=>array('article/manageNews'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				//array('label'=>'行情管理', 'url'=>array('article/managePrice'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'图库管理', 'url'=>array('article/manageImageLibary'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'行情走势数据', 'url'=>array('article/managePriceSummary'),'linkOptions'=>array('target'=>'mainFrame')),
				),
		)); */
		break;
case 6:
 $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'广告管理', 'url'=>array('advertisementRecommend/manageAdvertisement'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'推荐管理', 'url'=>array('advertisementRecommend/manageRecommend'),'linkOptions'=>array('target'=>'mainFrame')),
				),
		)); 
		break;
case 7:
 $this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'邮件模板管理', 'url'=>array('system/manageMessageTemplate'),'linkOptions'=>array('target'=>'mainFrame',),'active'=>true),
				array('label'=>'钼相关稀土价格', 'url'=>array('system/manageRelativeRePrice'),'linkOptions'=>array('target'=>'mainFrame',)),
				),
		)); 
		endswitch;?>
</div>
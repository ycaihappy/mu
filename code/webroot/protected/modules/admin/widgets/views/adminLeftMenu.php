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
		$html=<<<tree
<ul>
	<li>
		<a href="{$this->getController()->createUrl('product/manageProduct',array('Product[product_user_id]'=>3))}" target="mainFrame">钼市网现货录入</a>
		<ul>
tree;
foreach ($productMenuType as $key=>$type)
{
$url=$this->getController()->createUrl('product/manageProduct',array('parentCategory'=>$key,'Product[product_user_id]'=>3));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$type['name']}</a>
			<ul>
tree;
	foreach ($type['subTypes'] as $key=>$subType){
		$url=$this->getController()->createUrl('product/manageProduct',array('Product[product_type_id]'=>$key,'Product[product_user_id]'=>3));
$html.=<<<tree
				<li><a href="{$url}" target="mainFrame">{$subType}</a></li>
tree;
	}
$html.=<<<tree
			</ul>
			</li>
tree;
}
$html.=<<<tree
			</ul>
			</li>
tree;
	$html.=<<<tree

	<li>
		<a href="{$this->getController()->createUrl('product/manageProduct')}" target="mainFrame">现货管理</a>
		<ul>
tree;
foreach ($productMenuType as $key=>$type)
{
$url=$this->getController()->createUrl('product/manageProduct',array('parentCategory'=>$key));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$type['name']}</a>
			<ul>
tree;
	foreach ($type['subTypes'] as $key=>$subType){
		$url=$this->getController()->createUrl('product/manageProduct',array('Product[product_type_id]'=>$key));
$html.=<<<tree
				<li><a href="{$url}" target="mainFrame">{$subType}</a></li>
tree;
	}
$html.=<<<tree
			</ul>
			</li>
tree;
}
$html.=<<<tree
		</ul>
	</li>
	<li><a href="{$this->getController()->createUrl('product/manageSpecial')}" target="mainFrame">特价管理</a>
	<ul>
tree;
foreach ($productMenuType as $key=>$type)
{
$url=$this->getController()->createUrl('product/manageSpecial',array('parentCategory'=>$key));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$type['name']}</a>
			<ul>
tree;
	foreach ($type['subTypes'] as $key=>$subType){
		$url=$this->getController()->createUrl('product/manageSpecial',array('Product[product_type_id]'=>$key));
$html.=<<<tree
				<li><a href="{$url}" target="mainFrame">{$subType}</a></li>
tree;
	}
$html.=<<<tree
			</ul>
			</li>
tree;
}
$html.=<<<tree
		</ul>
	</li>
	<li><a href="{$this->getController()->createUrl('product/manageSupply')}" target="mainFrame">供应管理</a>
		<ul>
tree;
foreach ($productMenuType as $key=>$type)
{
$url=$this->getController()->createUrl('product/manageSupply',array('parentCategory'=>$key));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$type['name']}</a>
			<ul>
tree;
	foreach ($type['subTypes'] as $key=>$subType){
		$url=$this->getController()->createUrl('product/manageSupply',array('Supply[supply_category_id]'=>$key));
$html.=<<<tree
				<li><a href="{$url}" target="mainFrame">{$subType}</a></li>
tree;
	}
$html.=<<<tree
			</ul>
			</li>
tree;
}
$html.=<<<tree
		</ul>
	</li>
	<li><a href="{$this->getController()->createUrl('product/manageBuy')}" target="mainFrame">求购管理</a>
			<ul>
tree;
foreach ($productMenuType as $key=>$type)
{
$url=$this->getController()->createUrl('product/manageBuy',array('parentCategory'=>$key));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$type['name']}</a>
			<ul>
tree;
	foreach ($type['subTypes'] as $key=>$subType){
		$url=$this->getController()->createUrl('product/manageBuy',array('Supply[supply_category_id]'=>$key));
$html.=<<<tree
				<li><a href="{$url}" target="mainFrame">{$subType}</a></li>
tree;
	}
$html.=<<<tree
			</ul>
			</li>
tree;
}
$html.=<<<tree
		</ul>
	</li>
	<li><a href="{$this->getController()->createUrl('product/manageEnterprise')}" target="mainFrame">企业库管理</a></li>
</ul>
tree;
echo $html;
		  /*$this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'on',
			'items'=>array(
				array('label'=>'现货管理', 'url'=>array('product/manageProduct'),'linkOptions'=>array('target'=>'mainFrame'),'active'=>true),
				array('label'=>'特价管理', 'url'=>array('product/manageSpecial'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'供应管理', 'url'=>array('product/manageSupply'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'求购管理', 'url'=>array('product/manageBuy'),'linkOptions'=>array('target'=>'mainFrame')),
				array('label'=>'企业库管理', 'url'=>array('product/manageEnterprise'),'linkOptions'=>array('target'=>'mainFrame')),
			
				),
		));*/
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
	<li>
		<a href="{$this->getController()->createUrl('system/manageRelativeRePrice',array('RelativeRePrice[re_type]'=>134))}" target="mainFrame">钼相关价格</a>
		<ul>
tree;
foreach ($relativeReType as $key=>$name)
{
$url=$this->getController()->createUrl('system/manageRelativeRePrice',array('RelativeRePrice[re_type]'=>$key));
$html.=<<<tree
			<li><a href="{$url}" target="mainFrame">{$name}</a></li>
tree;
}
$html.=<<<tree
		</ul>
	</li>
</ul>
tree;
echo $html;

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
	$html=<<<tree
<ul>
<li><a href="{$this->getController()->createUrl('system/manageMessageTemplate')}" target="mainFrame">邮件模板管理</a></li>
<li><a href="{$this->getController()->createUrl('dataBack/showData')}" target="mainFrame">数据库备份管理</a></li>

tree;
echo $html;
		endswitch;?>
</div>

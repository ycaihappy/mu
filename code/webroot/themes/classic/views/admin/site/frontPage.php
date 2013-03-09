<?php 
$this->breadcrumbs=array(
	'首页',
);
?>

<div class="m-home">

<h1>管理首页</h1>
<dl>
	<dt>待处理信息</dt>
	<dd>
		<div class="item"><label>待审核会员</label><a href="<?php echo $this->createUrl('user/manageUser',array('user_status'=>33))?>" ><span><?php echo $userCount?></span></a></div>
		<div class="item"><label>待审核企业</label><a href="<?php echo $this->createUrl('product/manageEnterprise',array('Enterprise[ent_status]'=>33))?>" ><span><?php echo $entCount?></span></a></div>
	</dd>
	<dd>
		<div class="item"><label>待审核特价产品</label><a href="<?php echo $this->createUrl('product/manageSpecial',array('Product[product_status]'=>33))?>" ><span><?php echo $specialCount?></span></a></div>
		<div class="item"><label>待审核现货产品</label><a href="<?php echo $this->createUrl('product/manageProduct',array('Product[product_status]'=>33))?>" ><span><?php echo $productCount?></span></a></div>
	</dd>
	<dd>
		<div class="item"><label>待审核供应信息</label><a href="<?php echo $this->createUrl('product/manageSupply',array('Supply[supply_status]'=>33))?>" ><span><?php echo $supplyCount?></span></a></div>
		<div class="item"><label>待审核求购信息</label><a href="<?php echo $this->createUrl('product/manageBuy',array('Supply[supply_status]'=>33))?>" ><span><?php echo $buyCount?></span></a></div>
	</dd>
	<dd>
		<div class="item"><label>待审核友情链接</label><a href="<?php echo $this->createUrl('user/manageFLink',array('FriendLink[flink_status]'=>33))?>" ><span><?php echo $flinkCount?></span></a></div>
	</dd>
</dl>
<dl>
	<dt>个人信息</dt>
	<dd>
		<div class="item"><label>登录用户名</label><span><?php echo $userName?></span></div>
		<div class="item"><label>登录IP</label><span><?php echo $userIp ?></span></div>
	</dd>
	<dd>
		<div class="item"><label>角色</label><span><?php echo $userRoles?></span></div>
		<div class="item"><label>服务器时间</label><span><?php echo date('Y-m-d H:i:s')?></span></div>
	</dd>
</dl>

</div>
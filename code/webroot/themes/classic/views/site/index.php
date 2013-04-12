<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>
<div id="p_index" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
    <?php $this->widget('SearchWidget');?>
    <?php $this->widget('NavigationWidget');?>
</div>

<div class="layout main">

    <div class="layout-area">
       
        <?php $this->widget('IndexAdsWidget');?>
		
		<div class="price-area index-price">
				<div class="ui-purple-hd  ui-m-tab4 ui-m-border">
						<span class="on">市场价格</span><span>现货价格</span>
						
				</div>
				<div class="bd">
					<ul>
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody><tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
												<tr><td>钨矿</td><td>120000</td><td> ↑ 20</td><td>浙江有色</td></tr>
												<tr><td>钨矿</td><td>120000</td><td> ↑ 12</td><td>浙江有色</td></tr>
												<tr><td>钨矿</td><td>120000</td><td> - </td><td>浙江有色</td></tr>
												<tr><td>钨矿</td><td>120000</td><td> ↑ 20</td><td>浙江有色</td></tr>
												<tr><td>钨矿</td><td>5221</td><td> ↑ 44</td><td>浙江有色</td></tr>
												<tr><td>钨矿</td><td>120000</td><td> - </td><td>浙江有色</td></tr>
												<tr><td>钨矿</td><td>120000</td><td> ↑ 20</td><td>浙江有色</td></tr>
											
											</tbody></table>
					</ul>
					<ul class="hide" style="display: none;">
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody><tr><th>品种</th><th>价格</th><th>日涨跌</th><th>市场</th></tr>
												<tr><td>黄金</td><td>300000</td><td> ↑ 23</td><td>浙江有色</td></tr>
												<tr><td>白银</td><td>2000</td><td> ↑ 23</td><td>浙江有色</td></tr>
												<tr><td>白金</td><td>400000</td><td> ↑ 21</td><td>浙江有色</td></tr>
												<tr><td>铜</td><td>1765</td><td> - </td><td>浙江有色</td></tr>
												<tr><td>黄金</td><td>300000</td><td> ↑ 23</td><td>浙江有色</td></tr>
												<tr><td>黄金</td><td>300000</td><td> ↑ 23</td><td>浙江有色</td></tr>
												<tr><td>铜1</td><td>1765</td><td> - </td><td>浙江有色</td></tr>
												
											</tbody></table>
					</ul>
				</div>
			</div>
		
		
        <?php $this->widget('IndexNewsWidget');?>

        <div class="clearfix"></div>
    </div>
    <div class="layout-area">
	 <?php $this->widget('IndexLoginWidget');?>
	 <div class="m-b2c ui-m-tab ui-m-border" id="J_Data_Center_2">
            <?php $this->widget('IndexProductWidget');?>
 
    </div>
      
        <?php $this->widget('IndexCategoryWidget');?>

        <div class="clearfix"></div>
    </div>
    <div class="layout-area">
        <?php $this->widget('IndexPriceWidget');?>
    </div>

    <div class="layout-area">
     <?php $this->widget('IndexSupplyWidget');?>
	 <?php $this->widget('IndexEnterpriseWidget');?>
 </div>
 <div class="layout-area">
  <div class="area-two">
                <?php $this->widget('IndexModuleWidget',array('type'=>1));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>2));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>3));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>4));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>5));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>6));?>
            </div>
 </div>
	<div class="layout-area grid-960">
	
		<div class="m-bt-ad">
		<?php if($adv1):?>
			<a href="<?php echo $adv1[0]->ad_link?>" class="first"><img src="<?php echo '/images/advertisement/'.$adv1[0]->ad_media_src?>" width="440" height="60" /></a>
		<?php endif;?>
		<?php if($adv2):?>
			<a href="<?php echo $adv2[0]->ad_link?>" style="float:right"><img src="<?php echo '/images/advertisement/'.$adv2[0]->ad_media_src?>" width="490" height="59" /></a>
		<?php endif;?>
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

<?php $this->widget("CommonFooterWidget");?>
</body>
</html>

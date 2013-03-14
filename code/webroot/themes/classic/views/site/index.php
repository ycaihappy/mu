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
        <?php $this->widget('IndexNewsWidget');?>
        <?php $this->widget('IndexAdsWidget');?>
        <?php $this->widget('IndexLoginWidget');?>

        <div class="clearfix"></div>
    </div>
    <div class="layout-area">
        <?php $this->widget('IndexSupplyWidget');?>
        <?php $this->widget('IndexCategoryWidget');?>

        <div class="clearfix"></div>
    </div>
    <div class="layout-area">
        <?php $this->widget('IndexPriceWidget');?>
    </div>

    <div class="layout-area">

    <div class="m-b2c ui-m-tab ui-m-border" id="J_Data_Center_2">

            <?php $this->widget('IndexProductWidget');?>
            <div class="area-two">
                <?php $this->widget('IndexModuleWidget',array('type'=>1));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>2));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>3));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>4));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>5));?>
                <?php $this->widget('IndexModuleWidget',array('type'=>6));?>
            </div>
    </div>


	<div class="layout-area">
	
		<div class="m-bt-ad">
			<a class="first"><img src="/images/bottom_ad_440x60.png" width="440" height="60" /></a>
			<a><img src="/images/bottom_ad_490x59.png" width="490" height="59" /></a>
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

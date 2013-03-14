<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>
<body>


<div id="p_user_index" class="pg-layout">
<div class="layout head">
    <?php $this->widget("UserCenterWidget"); ?>
</div>

</div>

    <div class="layout main">
        <?php $this->widget("UserTabWidget"); ?>
	
    	<div class="layout-area">
            <?php $this->widget("UserMenuWidget"); ?>
            <div class="col-r">
               <?php echo $content;?>
            </div>
        </div>
    
    	<div class="layout-area">
        <?php $this->widget("FooterWidget");?>
    	</div>
    
    </div>
    
</div>

<?php $this->widget("CommonFooterWidget"); ?>

</body>
</html>

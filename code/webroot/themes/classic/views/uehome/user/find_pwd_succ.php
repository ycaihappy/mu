<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>


<div id="p_forget_password" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<div class="m-logo">
		<a target="_self" href="" class="logo"><img title="xxx.com - xxxx" alt="zzz" src="images/logo.jpg"></a>
	</div>
	<div class="logo-side-title"></div>
	

</div>

<div class="layout main">
	
	<div class="m-reset">
		<div class="mainbox">
        <h2>找回密码</h2>
			
			<div class="notice">
			<?php if($mailServer):?>
            <p>操作成功！请到 <strong><?php echo $email ?></strong> 查阅来自钼市网的邮件，并重设您的密码。</p>
            
                <a target="_blank" href="http://<?php echo $mailServer?>/" class="link-button">去邮箱收信</a></div>
		 	<?php else:?>
			 <p>操作失败！你的邮箱 <strong><?php echo $email ?></strong> 格式不正确，为非法请求。</p>
          
			<?php endif;?>
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

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
            <p>操作成功！请到 <strong>54545@qq.com</strong> 查阅来钼市网的邮件，点击邮件中的链接重设您的密码。</p>
            
                <a target="_blank" href="http://mail.qq.com/" class="link-button">去邮箱收信</a></div>
		 
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

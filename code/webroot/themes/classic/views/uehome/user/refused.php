<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>用户提示</p>
</div>
<div class="m-form">
	<?php if($status==2):?>
	<p><b style="color:red;font-size:16px">对不起！您的信息未通过审核。</b>
	<br>
	<br>
	<br><b style="color:red;font-size:16px">原因是：您的信息还没有完善</b>
	</p>
	<?php elseif($status==3):?>
	<p><b style="color:red;font-size:16px">对不起！您的信息正在审核中，请耐心等待...</b></p>
	<?php endif;?>
</div>
		

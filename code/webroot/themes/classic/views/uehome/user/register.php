<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>会员注册</title>
    <link rel="stylesheet" href="css/global.css">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>

<body>


<div id="p_register" class="pg-layout">


<div class="layout head">
	<div class="m-logo clearfix">
		<a target="_self" href="" class="logo"><img title="xxx.com - xxxx" alt="zzz" src="images/reg_logo.png"></a>
	</div>

</div>

<div class="layout main">

	
	
	<div class="layout-area">
	
	
	<div class="m-register" id="J_Register" data-step="2">
		
		<div class="reg-box">
			<div class="hd clearfix">
				<div class="flow">
					<ul>
						<li class="step-1">验证账户信息<i class="reg-ok"></i></li>
						<li class="step-2 on">填写用户信息<i class="reg-ok"></i></li>
						<li class="step-3">注册成功<i class="reg-ok"></i></li>
					</ul>
				</div>
				<div class="bt"></div>
				
			</div>
			<div class="bd">
				<!--<div class="steps step-1">
					<form>
					<table width="100%">
						<tr>
							<td align="right"><label>手机号：</label></td>
							<td><div class="field"><input type="text" name="mobile_number" validate="require|请输入手机号 len[11]|手机号必须为11位 num|手机号必须为数字" /><button class="btn-modify send-sms" type="button" data-api="index.php?r=sms/send">发送验证码</button></div></td>
						</tr>					
						<tr>
							<td align="right"><label>请输入验证码：</label></td>
							<td><div class="field"><input type="text" name="validate_code" validate="require|请输入验证码" /></div></td>
						</tr>
						<tr>
							<td></td>
							<td><div class="reg-btns"><button tabindex="5" class="btn-reg act-one" data-api="index.php?r=sms/check">确定</button>
							</div></td>
						</tr>
					</table>
					</form>
					
				</div>-->
				<div class="steps step-2">
					<form>
					<input type="hidden" name="user_type" value="1" />
					<table width="100%">
						<!--<tr>
							<td align="right"><label>用户类别：</label></td>
							<td><div class="field"><label><input type="radio" name="user_type" value="0" class="cb user-type" checked>个人</label><label><input type="radio" name="user_type" value="1" class="cb user-type">企业</label></div></td>
						</tr>-->
						<tr class="for-company ">
							<td align="right"><label>企业名称：</label></td>
							<td><div class="field"><input type="text" name="company_name" validate="require|请输入企业名称" /></div></td>
						</tr>
						<tr class="for-company ">
							<td align="right"><label>企业类型：</label></td>
							<td><div class="field"><?php echo CHtml::dropDownList('company_type',0,$ent_type,array());?></div></td>
						</tr>
							<tr>
							<td align="right"><label>用户名：</label></td>
							<td><div class="field"><input type="text" name="user_name" validate="require|请输入用户名" /></div></td>
						</tr>					
						<tr>
							<td align="right"><label>邮箱：</label></td>
							<td><div class="field"><input type="text" name="email" validate="require|请输入邮箱 email|请输入正确邮箱" /></div></td>
						</tr>
						<tr>
							<td align="right"><label>密码：</label></td>
							<td><div class="field"><input type="password" name="pwd" validate="require|请输入密码 gt[5]|密码至少6位" /></div>
							<div class="pw-strength pw-weak">
                                <div class="pw-bar"></div>
                                <div class="pw-letter"><span>弱</span><span>中</span><span>强</span></div>
                            </div>
							</td>
						</tr>
						<tr>
							<td align="right"><label>确认密码：</label></td>
							<td><div class="field"><input type="password" name="repwd" validate="require|请输入确认密码 gt[5]|密码至少6位 eq[pwd]|输入的密码不一致" /></div></td>
						</tr>
						<tr>
							<td align="right"><label class="c-name" data-text="昵称：" data-c-text="称呼：">昵称：</label></td>
							<td><div class="field"><input type="text" name="nickname" validate="require|请输入昵称 reg[[^\d]]|昵称不能为全数字" /></div></td>
						</tr>
						<tr class="for-company ">
							<td align="right"><label>职务：</label></td>
							<td><div class="field"><?php echo CHtml::dropDownList('job_title',0,$role,array());?></td>
						</tr>
						<tr>
							<td align="right"><label>手机号：</label></td>
							<td><div class="field"><input type="text" name="mobile_number" validate="require|请输入手机号 len[11]|手机号必须为11位 num|手机号必须为数字" /></div></td>
						</tr>					
						<tr>
							<td align="right" class="label">城市：</td>
							<td><?php echo CHtml::dropDownList('user_province_id',0,$allProvince,array(
								'ajax'=>array(
									'type'=>'GET',
				                    'url'=>CController::createUrl('/uehome/user/getCity'),
				                    'update'=>'#user_city_id',
				                    'data'=>array('province_id'=>"js:this.value")
								),
							));?>  
							<?php echo CHtml::dropDownList('user_city_id',0,array(),array('empty'=>'选择城市'));?></td>
						</tr>
						
						<tr class="for-company ">
							<td align="right"><label>详细地址：</label></td>
							<td><div class="field"><input type="text" name="address" /></div></td>
						</tr>
						<tr>
							<td align="right"><label>订阅行情：</label></td>
							<td><div class="field"><input type="checkbox" name="newsletter" value="1" class="cb" /></div></td>
						</tr>
						<tr>
							<td></td>
							<td><div class="reg-btns"><!--<button tabindex="5" class="btn-reg prev">上一步</button>--> <button tabindex="5" class="btn-reg save" data-api="index.php?r=uehome/user/registeruser">同意条款并注册</button>
							<p><a>《钼市网服务条款》</a></p>
							</div></td>
						</tr>
					</table>
					</form>
				</div>
				<div class="steps step-3 hide">
					<div class="success-1"><i></i><p class="msg">恭喜，您已成功注册。</p></div>
					
					<div class="btn">
                    <a class="btn-modify" href="<?php echo Yii::app()->controller->createUrl('/site/index');?>">回到首页</a><a class="btn-modify" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/detail');?>">个人中心</a>
					</div>
					
				</div>
			</div>
		</div>
	
	</div>
	
	
	</div>

	
	
	<div class="layout-area">
		<div class="m-footer">
		<p class="first"><a>公司简介</a> | <a>广告服务</a> | <a>联系方式</a> | <a>服务项目</a> | <a>公司动态</a> | <a>工作机会</a> | <a>网站地图</a> | <a>公司简介</a> | <a>公司简介</a> | <a>公司简介</a></p>
		<p>客服热线：400-0000-0000  0766-1111111 / 11111111 / 1111111 传真：0443-11111111</p>
		<p>Copyright &copy; 1998 - 2012 中国XX网 All Rights Reserved</p>
		<p>全国咨询/投诉电话：400-000-0000   E-mail:kf@xxxx.com ICP证1003232</p>
		
		<p class="fa"> <a class="fa1" target="_blank" href="http://www.cqc.com.cn"></a> <a class="fa2" target="_blank" href="http://www.smestar.com/detail.credit?action=preLevel&amp;credcode=NO.20000001143"></a> <a class="fa3" target="_blank" href="http://www.e-315.org"></a> <a class="fa4" target="_blank" href="http://www.isc.org.cn"></a> <a class="fa5" target="_blank" href="http://www.ec.org.cn"></a> <a class="fa6" target="_blank" href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1697657781"></a> 
	</p>
		
		</div>
	</div>
	

</div>




</div>
<?php $this->widget("CommonFooterWidget");?>
</body>
</html>

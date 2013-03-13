<style>
.contactBtn{background-color: #F1F1F1; display:inline-block; border-color: #FFF6D3 #DFD5AF #DFD5AF #FFF6D3; border-right: 1px solid #DFD5AF; border-style: solid; border-width: 1px;color:#FF9900; padding:1px 3px; margin-left:20px;}
.contactBtn:hover{background-color:#F0EBD6;}
.common_box .text_label{text-align:right; font-weight:bold;}
</style>
<div class="common_box">
  <!-- <script language="javascript" src="<{$config.weburl}>/script/my_lightbox.js"></script> -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2" class="guide_ba"><span>联系我们</span></td>
    </tr>
    <tr>
      <td width="15%" class="text_label">所在地区：</td>
      <td width="85%"><?php echo $company->ent_city?></td>
    </tr>
    <tr>
      <td class="text_label">企业所在地：</td>
      <td><a onclick="alertWin('Map','',500,300,'<{$config.weburl}>/templates/default/map.php?addr=<{$com.addr|urlencode}>');" href="javascript:void(0);"><?php echo $company->ent_location?></a></td>
    </tr>
    <tr>
      <td class="text_label">电话：</td>
      <td><?php echo $user->user_first_name.' '.$user->user_telephone?></td>
    </tr>
    <?php if($user->user_mobile_no):?>
    <tr>
      <td class="text_label">手机：</td>
      <td><?php echo $user->user_mobile_no?></td>
    </tr>
    <?php endif;?>
    <tr>
      <td class="text_label">传真：</td>
      <td><?php echo $company->ent_tax?></td>
    </tr>
    <tr>
      <td class="text_label">邮编：</td>
      <td><?php echo $company->ent_zipcode?></td>
    </tr>
    <tr>
      <td class="text_label">公司网址：</td>
      <td><?php if($company->ent_website&&strncmp($company->ent_website,'http://',4)==0):?> <a target="_blank" href="javascript:window.location='<?php echo $company->ent_website?>'"><?php echo $company->ent_website?></a> <?php endif;?> </td>
    </tr>
    <!--<tr>
      <td class="text_label"><{$lang.reg_time}> </td>
      <td><{$com.uptime|date_format}> </td>
    </tr>  
    <tr>
      <td class="text_label"><{$lang.jscon}> </td>
      <td><{if $com.qq}> <a title="<{$com.qq}>" target="blank" href="tencent://message/?uin=<{$com.qq}>&Site=<{$config.company}>&Menu=yes"> <{$lang.qq}> </a> <{/if}>
        &nbsp;
        <{if $com.msn}>
        <script language="JavaScript" type="text/javascript">
		function SendMSNMessage(name)
		  MsgrObj.InstantMessage(name);
		function AddMSNContact(name)
		  MsgrObj.AddContact(0, name);
		</script>
        <object id="MsgrObj" classid="clsid:B69003B3-C55E-4B48-836C-BC5946FC3B28" codetype="application/x-oleobject" width="0" height="0">
        </object>
        <a title="<{$com.msn}>" href="#" onclick="SendMSNMessage('')"><{$lang.msn}></a> <{/if}>
        
        <{if $com.skype}>
        <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
        <a href="skype:<{$com.skype}>?call"> <{$lang.skype}> </a> <{/if}> </td>
    </tr>-->
  </table>
</div>
<div class="common_box m1"> 
  
  <?php 
  	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
  ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" class="guide_ba"><span>在线留言</span></td>
      </tr>
      <tr>
        <td colspan="2" align="left">
	        <li>请认真填写发信人信息和邮件内容，以便收信人看到后能及时与您联系，切勿发送垃圾信息。</li>
	        <li>此信息将发往客户邮箱和站内留言里，请经常登录我们的网站及时查看回复信息。</li>
            <?php if(!$uid):?>
	            <strong>提示已经是会员？</strong>
	            <br>
		                    请先<a href="<?php echo $loginUrl?>"><strong>登录</strong></a>，
		                    将发送的商业信息保存至您的信息中心内,这样更有利于商家互相联系。
	        <?php endif;?>
           </td>
      </tr>
     <!--  <{if $tid}>
      <tr>
        <td  class="text_label" ><{$lang.about}></td>
        <td><{foreach item=list from=$res}>
          <{$list.pname}><br />
          <{/foreach}> </td>
      </tr>
      <{/if}> -->
      <tr>
        <td  class="text_label" >收件人：</td>
        <td><?php echo $company->ent_name ?>&nbsp;<?php echo $user->user_first_name?></td>
      </tr>
     
      <tr>
        <td width="15%"  class="text_label" >邮件主题*：</td>
        <td  width="85%" >
        <?php echo $form->textField($model,'sub',array('style'=>'width:400px;'));?>
       <?php echo $form->error($model,'sub'); ?>
        </td>
      </tr>
      <tr>
        <td width="15%" class="text_label" valign="top" >邮件内容*：</td>
        <td width="85%" valign="middle" >
         <?php echo $form->textArea($model,'content',array('style'=>'width:400px;','rows'=>10));?>
         <?php echo $form->error($model,'content'); ?>
        </td>
      </tr>
      <?php if (!$uid):?>
       <tr>
        <td class="text_label">企业名称*：</td>
        <td>
        <?php echo $form->textField($model,'fromCompany',array('style'=>'width:400px;'));?>
        <?php echo $form->error($model,'fromCompany'); ?>
        </td>
      </tr>
      <tr>
        <td width="15%"  class="text_label" >联系人*：</td>
        <td  width="85%" >
        <?php echo $form->textField($model,'fromContact',array('style'=>'width:400px;'));?>
        <?php echo $form->error($model,'fromContact'); ?>
        </td>
      </tr>
      <tr>
        <td  class="text_label" >邮箱：</td>
        <td>
        <?php echo $form->textField($model,'fromEmail',array('style'=>'width:400px;'));?>
        <?php echo $form->error($model,'fromEmail'); ?>
        </td>
      </tr>
      <tr>
        <td  class="text_label" >电话号码*：</td>
        <td>
        <?php echo $form->textField($model,'fromTelephone',array('style'=>'width:400px;'));?>
        <?php echo $form->error($model,'fromTelephone'); ?>
        </td>
      </tr>
      <?php else:?>
      <tr>
        <td width="15%"  class="text_label" >发件人：</td>
        <td  width="85%" >
        <a target="_blank" href="<?php echo $storeFrontUrl?>">
        <?php echo $userName?>
        </a> </td>
      </tr>
      <?php endif;?>
      <?php if(CCaptcha::checkRequirements()): ?>
      <tr>
        <td height="28" class="text_label" >验证码*：</td>
        <td height="28" >
        <?php echo $form->textField($model,'verifyCode'); ?>
		<?php $this->widget('CCaptcha',array('showRefreshButton'=>false,
		'clickableImage'=>true,
		'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'),
		'urlParams'=>array('username'=>$user->user_name))
		); ?>
        <?php echo $form->error($model,'verifyCode'); ?>
		</td>
      </tr>
      <?php endif;?>
      <tr>
      	<td height="28" class="text_label" ></td>
      	<td height="28" ><?php echo CHtml::submitButton('保存'); ?></td>
      </tr>
    </table>
<?php $this->endWidget(); ?>
  </div>

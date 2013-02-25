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
      <td width="85%"><?php echo $area?></td>
    </tr>
    <tr>
      <td class="text_label">企业所在地：</td>
      <td><a onclick="alertWin('Map','',500,300,'<{$config.weburl}>/templates/default/map.php?addr=<{$com.addr|urlencode}>');" href="javascript:void(0);"><{$com.addr }></a></td>
    </tr>
    <tr>
      <td class="text_label">电话：</td>
      <td><{$com.tel }></td>
    </tr>
    <{if $com.mobile!=''}>
    <tr>
      <td class="text_label">手机：</td>
      <td><{$com.mobile }></td>
    </tr>
    <{/if}>
    <tr>
      <td class="text_label">传真：</td>
      <td><{$com.fax}></td>
    </tr>
    <tr>
      <td class="text_label">右边</td>
      <td><{$com.zip }></td>
    </tr>
    <tr>
      <td class="text_label">公司网址：</td>
      <td><{if $com.url&&$com.url!='http://'}> <a target="_blank" href="javascript:window.location='<{$com.url }>'"><{$com.url }></a> <{/if}> </td>
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
  
  <form method="post" action="" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" class="guide_ba"><span>在线留言</span></td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="color:#999999">
	        <li>请认真填写发信人信息和邮件内容，以便收信人看到后能及时与您联系，切勿发送垃圾信息。</li>
	        <li>此信息将发往客户邮箱和站内留言里，请经常登录我们的网站及时查看回复信息。</li>
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
        <td><{$com.company}> <{$com.contact}></td>
      </tr>
      <!-- <{if !$buid}>
      <tr>
        <td class="text_label"><{$lang.company}>*</td>
        <td><input type='text' name='company' value='' style="width:400px;" ></td>
      </tr>
      <tr>
        <td  class="text_label"><{$lang.country}></td>
        <td><select name="country" id="country" class="input" style="width:300px;">
            <{foreach item=list key=num from=$country}>
            <option value="<{$list.name}>"><{$list.name}></option>
            <{/foreach}>
          </select></td>
      </tr>
      <{/if}> -->
      <tr>
        <td width="15%"  class="text_label" >邮件主题：*</td>
        <td  width="85%" ><input type="text" value="<{$smarty.get.title}>" name="sub" style="width:400px;"  dataType="Require" msg="<{$lang.pls_title}>" />
        </td>
      </tr>
      <tr>
        <td width="15%" class="text_label" valign="top" >邮件内容*</td>
        <td width="85%" valign="middle" ><textarea name="con"  rows="10" style="width:400px;" dataType="Require" msg="<{$lang.pls_con}>"></textarea></td>
      </tr>
      <{if $smarty.cookies.USER==''}>
      <tr>
        <td width="15%"  class="text_label" >联系人*</td>
        <td  width="85%" ><input name="name" type="text" style="width:400px;"  dataType="Require" msg="<{$lang.pls_name}>" />
        </td>
      </tr>
      <tr>
        <td  class="text_label" ><{$lang.email}>*</td>
        <td><input name="email" type="text" style="width:400px;" dataType="Require" msg="<{$lang.pls_email}>" />
        </td>
      </tr>
      <tr>
        <td  class="text_label" ><{$lang.tel}>*</td>
        <td><input name="tell" type="text" style="width:400px;" dataType="Require" msg="<{$lang.pls_tel}>" />
        </td>
      </tr>
      <{else}>
      <tr>
        <td width="15%"  class="text_label" ><{$lang.sender}></td>
        <td  width="85%" ><a target="_blank" href="shop.php?uid=<{$buid}>"><{$smarty.cookies.USER}></a> </td>
      </tr>
      <{/if}>
      <tr>
        <td height="28" class="text_label" ><{$lang.yzm}>*</td>
        <td height="28" ><input name="yzm" type="text" style="width:60px; height:20px;" dataType="Require" msg="<{$lang.yzm}>" />
          <img style="vertical-align:top;" src='includes/rand_func.php' width="60" height="22"/></td>
      </tr>
      <tr>
        <td width="15%" height="28" >&nbsp;</td>
        <td height="28" width="85%" ><input type="hidden" name="contype" value="<{if $smarty.get.contype}><{$smarty.get.contype}><{else}>1<{/if}>" />
          <input type="hidden" name="tid" value="<{$tid}>" />
          <input type="submit" name="Submit" value="<{$lang.send_now}>" />
          <input name="submit" type="hidden" id="submit" value="submit" />
          <input name="toid" type="hidden"  value="<{$smarty.get.uid}>" />
          <input type="hidden"  name="tocontact" value="<{$com.email}>" />
        </td>
      </tr>
    </table>
  </form>
  </div>

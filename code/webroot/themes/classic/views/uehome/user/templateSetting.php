<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>企业旺铺设置</p>
</div>
<div class="m-form">
</div>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'enterprise-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
<table width="100%" border="0" cellpadding="7" cellspacing="1" bgcolor="#DDDDDD" class="admin_table">
<tbody><tr>
<td bgcolor="#EAEFF3">菜单栏目</td>
<td bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr> 
		<td bgcolor="#FFFFFF" style="font-weight:normal">是否显示</td>
		<td bgcolor="#FFFFFF" style="font-weight:normal">排序</td>
		<td bgcolor="#FFFFFF" style="font-weight:normal">名称</td>
	</tr>
		 <tr> 
	   <td width="50" bgcolor="#FFFFFF"><input name="menu_show[]" type="checkbox" value="1" checked=""></td>
       <td width="20" bgcolor="#FFFFFF">
	   	   <input name="menu_order[]" type="text" value="1" size="5" maxlength="3">
	   	   </td>
       <td width="*%" bgcolor="#FFFFFF"><input name="menu_name[]" type="text" value="公司首页" size="20" maxlength="100">
	    <input name="menu_link[]" type="hidden" value="">
	    <input name="module[]" type="hidden" value="">
	   </td>
       </tr>
		 <tr> 
	   <td width="50" bgcolor="#FFFFFF"><input name="menu_show[]" type="checkbox" value="1" checked=""></td>
       <td width="20" bgcolor="#FFFFFF">
	   	   <input name="menu_order[]" type="text" value="2" size="5" maxlength="3">
	   	   </td>
       <td width="*%" bgcolor="#FFFFFF"><input name="menu_name[]" type="text" value="产品展厅" size="20" maxlength="100">
	    <input name="menu_link[]" type="hidden" value="offer_list">
	    <input name="module[]" type="hidden" value="offer">
	   </td>
       </tr>
		 <tr> 
	   <td width="50" bgcolor="#FFFFFF"><input name="menu_show[]" type="checkbox" value="1" checked=""></td>
       <td width="20" bgcolor="#FFFFFF">
	   	   <input name="menu_order[]" type="text" value="5" size="5" maxlength="3">
	   	   </td>
       <td width="*%" bgcolor="#FFFFFF"><input name="menu_name[]" type="text" value="公司新闻" size="20" maxlength="100">
	    <input name="menu_link[]" type="hidden" value="news_list">
	    <input name="module[]" type="hidden" value="news">
	   </td>
       </tr>
		 <tr> 
	   <td width="50" bgcolor="#FFFFFF"><input name="menu_show[]" type="checkbox" value="1" checked=""></td>
       <td width="20" bgcolor="#FFFFFF">
	   	   <input name="menu_order[]" type="text" value="7" size="5" maxlength="3">
	   	   </td>
       <td width="*%" bgcolor="#FFFFFF"><input name="menu_name[]" type="text" value="企业相册" size="20" maxlength="100">
	    <input name="menu_link[]" type="hidden" value="album_list">
	    <input name="module[]" type="hidden" value="album">
	   </td>
       </tr>
		 <tr> 
	   <td width="50" bgcolor="#FFFFFF"><input name="menu_show[]" type="checkbox" value="1" checked=""></td>
       <td width="20" bgcolor="#FFFFFF">
	   	   <input name="menu_order[]" type="text" value="9" size="5" maxlength="3">
	   	   </td>
       <td width="*%" bgcolor="#FFFFFF"><input name="menu_name[]" type="text" value="联系我们" size="20" maxlength="100">
	    <input name="menu_link[]" type="hidden" value="mail">
	    <input name="module[]" type="hidden" value="company">
	   </td>
       </tr>
		 <tr> 
	   <td width="50" bgcolor="#FFFFFF"><input name="menu_show[]" type="checkbox" value="1" checked=""></td>
       <td width="20" bgcolor="#FFFFFF">
	   	   <input name="menu_order[]" type="text" value="10" size="5" maxlength="3">
	   	   </td>
       <td width="*%" bgcolor="#FFFFFF"><input name="menu_name[]" type="text" value="公司介绍" size="20" maxlength="100">
	    <input name="menu_link[]" type="hidden" value="profile">
	    <input name="module[]" type="hidden" value="company">
	   </td>
       </tr>
	</tbody></table>
</td>
</tr>
<tr>
<td bgcolor="#EAEFF3">公司首页</td>
<td bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
    <td bgcolor="#FFFFFF"><input type="checkbox" name="home_intro_show" value="1" checked=""> </td>
    <td bgcolor="#FFFFFF"><input name="home_intro_name" type="text" size="20" maxlength="100" value="公司介绍">
    </td>
    </tr>
		<tr>
    <td bgcolor="#FFFFFF"><input type="checkbox" name="home_news_show" value="1" checked=""> </td>
    <td bgcolor="#FFFFFF"><input name="home_news_name" type="text" size="20" maxlength="100" value="公司新闻">
    数量
	<input name="home_news_nums" type="text" size="5" maxlength="5" value="5"></td>
    </tr>
		<tr>
    <td bgcolor="#FFFFFF"><input type="checkbox" name="home_contact_show" value="1" checked=""> </td>
    <td bgcolor="#FFFFFF"><input name="home_contact_name" type="text" size="20" maxlength="100" value="联系方式">
    </td>
    </tr>
	</tbody></table>
	</td>
	</tr>
<tr>
    <td bgcolor="#EAEFF3">公司产品列表显示方式</td>
    <td bgcolor="#FFFFFF">
     <input type="radio" name="shop_pro_list" id="radio" value="1" checked="">
竖排
<input type="radio" name="shop_pro_list" id="radio2" value="2">
横排</td>
 </tr>
 
 <tr>
    <td bgcolor="#EAEFF3">商铺整体背景图片</td>
    <td bgcolor="#FFFFFF">
		<input name="styleimg" type="text" id="styleimg" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583348.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','styleimg',300,300)">上传</a>] 
		[<a href="javascript:preview('styleimg');">预览</a>]
		[<a href="javascript:delet_pic('styleimg');">删除</a>]
	</td>
</tr>
 
<tr>
	<td bgcolor="#EAEFF3">头部图片Banner广告</td>
	<td bgcolor="#FFFFFF">
		<input name="headimage" type="text" id="headimage" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583400.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','headimage',700,90)">上传</a>] 
		[<a href="javascript:preview('headimage');">预览</a>]
		[<a href="javascript:delet_pic('headimage');">删除</a>]
	</td>
</tr>


<tr>
    <td bgcolor="#EAEFF3">头部幻灯片<br>[最多可上传五张]</td>
    <td bgcolor="#FFFFFF" style="line-height:25px;">
		<input name="flash[]" type="text" id="flash1" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583179.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','flash1',980,250)">上传</a>] 
		[<a href="javascript:preview('flash1');">预览</a>]
		[<a href="javascript:delet_pic('flash1');">删除</a>]<br>
		
		<input name="flash[]" type="text" id="flash2" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583184.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','flash2',980,250)">上传</a>] 
		[<a href="javascript:preview('flash2');">预览</a>]
		[<a href="javascript:delet_pic('flash2');">删除</a>]<br>
		
		<input name="flash[]" type="text" id="flash3" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583240.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','flash3',980,250)">上传</a>] 
		[<a href="javascript:preview('flash3');">预览</a>]
		[<a onclick="javascript:delet_pic('flash3');" href="#">删除</a>]<br>
		
		<input name="flash[]" type="text" id="flash4" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583245.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','flash4',980,250)">上传</a>] 
		[<a href="javascript:preview('flash4');">预览</a>]
		[<a href="javascript:delet_pic('flash4');">删除</a>]<br>
		
		<input name="flash[]" type="text" id="flash5" value="http://www.b2bbuilder.com/uploadfile/all/2013/02/23/1361583249.jpg" size="60">
		[<a href="javascript:uploadfile('Style images','flash5',980,250)">上传</a>] 
		[<a href="javascript:preview('flash5');">预览</a>]
		[<a href="javascript:delet_pic('flash5');">删除</a>]
	</td>
 </tr>

<tr>
<td bgcolor="#EAEFF3">公司网站Title </td>
<td bgcolor="#FFFFFF">
  <input name="hometitle" type="text" id="hometitle" size="70" maxlength="100" value="">
 [未设置则显示公司名称]</td>
</tr>
<tr>
<td bgcolor="#EAEFF3">公司网站关键词</td>
<td bgcolor="#FFFFFF">
  <input name="homekeyword" type="text" id="homekeyword" size="70" maxlength="100" value="">
 [未设置则显示公司名称]</td>
    </tr>
  <tr>

    <td bgcolor="#EAEFF3">公司网站描述</td>
    <td bgcolor="#FFFFFF">
      <input name="homedes" type="text" id="homedes" size="70" maxlength="100" value="">
      [未设置则显示公司名称] </td>
    </tr>
  <tr> 
	<td colspan="4" align="center" bgcolor="#EAEFF3"><input class="btn" type="submit" name="sconfig" id="sconfig" value="提交" onclick="change();"></td>
	</tr>
</tbody></table>

<?php $this->endWidget();?>
    
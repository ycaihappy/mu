<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>旺铺管理<i></i>主页设置</p>
</div>

	<div class="m-form" id="J_Shop_Setting">
	
	<form enctype="multipart/form-data" method="post" action="">
<table width="100%" cellspacing="1" cellpadding="7" border="0"  class="table-field">
<tbody><tr>
<td bgcolor="#f3f3f3">菜单栏目</td>
<td bgcolor="#ffffff">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody><tr> 
		<td bgcolor="#ffffff" style="font-weight:normal">是否显示</td>
		<td bgcolor="#ffffff" style="font-weight:normal">排序</td>
		<td bgcolor="#ffffff" style="font-weight:normal">名称</td>
	</tr>
	<?php foreach ($storeFrontConfig['menu'] as $menu):?>
		 <tr> 
	   <td width="50" bgcolor="#ffffff">
	   <?php echo CHtml::checkBox('menu_show[]',$menu['menu_show']==1?true:false,array('value'=>1))?>
	   </td>
       <td width="20" bgcolor="#ffffff">
	   	   <input type="text" maxlength="3" size="5" value="<?php echo $menu['menu_order']?>" name="menu_order[]">
	   	   </td>
       <td width="*%" bgcolor="#ffffff">
       <input type="text" maxlength="100" size="20" value="<?php echo $menu['menu_name']?>" name="menu_name[]">
	    <input type="hidden" value="<?php echo $menu['menu_link']?>" name="menu_link[]">
	   </td>
       </tr>
       <?php endforeach;?>
		
	</tbody></table>
</td>
</tr>
 <tr class="styleimg">
    <td bgcolor="#f3f3f3">商铺整体背景图片</td>
    <td bgcolor="#ffffff">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['styleimg']?>" name="styleimg">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
	</td>
</tr>
 
<tr class="banner">
	<td bgcolor="#f3f3f3">头部图片Banner广告</td>
	<td bgcolor="#ffffff">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['headimage']?>"  name="headimage">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
	</td>
</tr>


<tr class="flash">
    <td bgcolor="#f3f3f3">头部幻灯片<br>[最多可上传五张]</td>
    <td bgcolor="#ffffff" style="line-height:25px;">
		<div class="item">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['flash'][0]?>" name="flash[]">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
		</div>
		<div class="item">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['flash'][1]?>" name="flash[]">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
		</div>
		<div class="item">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['flash'][2]?>" name="flash[]">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
		</div>
		<div class="item">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['flash'][3]?>" name="flash[]">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
		</div>
		<div class="item">
		<input type="text" size="60" value="<?php echo $storeFrontConfig['flash'][4]?>" name="flash[]">
		[<a href="javascript:;" class="upload">上传</a>] 
		[<a href="javascript:;" class="preview">预览</a>]
		[<a href="javascript:;" class="delete">删除</a>]
		</div>
	</td>
 </tr>

<tr>
<td bgcolor="#f3f3f3">公司网站Title </td>
<td bgcolor="#ffffff">
  <input type="text" value="<?php echo $storeFrontConfig['hometitle']?>" maxlength="100" size="70"  name="hometitle">
 [未设置则显示公司名称]</td>
</tr>
<tr>
<td bgcolor="#f3f3f3">公司网站关键词</td>
<td bgcolor="#ffffff">
  <input type="text" value="<?php echo $storeFrontConfig['homekeyword']?>" maxlength="100" size="70" name="homekeyword">
 [未设置则显示公司名称]</td>
    </tr>
  <tr>

    <td bgcolor="#f3f3f3">公司网站描述</td>
    <td bgcolor="#ffffff">
      <input type="text" value="<?php echo $storeFrontConfig['homedes']?>" maxlength="100" size="70" name="homedes">
      [未设置则显示公司名称] </td>
    </tr>
  <tr> 
<<<<<<< HEAD
	<td bgcolor="#EAEFF3" align="center" colspan="4">
	<?php echo CHtml::button()?>
	<button type="submit" id="sconfig" class="btn-modify">保存</button>
	
	</td>
=======
	<td bgcolor="#f3f3f3" align="center" colspan="4"><button type="submit" class="btn-modify">保存</button></td>
>>>>>>> 5d16fababf12281db6472376bcc8933682fe6535
	</tr>
</tbody></table>
</form>
</div>
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCssFile('css/uploadify.css');
$cs->registerCssFile('css/jquery-ui-1.10.1.custom.min.css');
$cs->registerScriptFile('js/jquery.uploadify.min.js');
?>

	<div class="m-breadcrumb">
	    <p><b class="crumb"></b>会员中心<i></i>添加图片</p>
    </div>

	<div class="m-form">
<?php	
    $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'upload-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		
		<tr>
			<td class="label">标题：</td><td><input type="text" name="title" value="" class="cmp-input" /></td>
		</tr>
			
		<tr>
			<td class="label">图片品类：</td><td><select name="category"><option value="0">1111</option></select></td>
		</tr>	
		<tr>
			<td class="label">图片描述：</td><td><textarea name="description" rows="10" class="cmp-text"  ></textarea></td>
		</tr>
		<tr>
        <td class="label">图片上传：</td><td><?php echo CHtml::activeFileField($model, 'image'); ?>
			<p>(图片大小不要超过200K，格式GIF,JPG,PNG图片宽度最大为220像素效果最佳！)</p>
			
			<br /><img src="images/thumb.gif" class="thumb"></td>
		</tr>
		
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>

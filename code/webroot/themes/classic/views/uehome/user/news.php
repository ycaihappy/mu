	<div class="m-form">
	
	<form>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
			<td class="label">标题：</td><td><input type="text" name="title" value="" class="cmp-input" /></td>
		</tr>
		<tr>
<?php
$this->widget('application.extensions.ckeditor.CKEditor',array(

    "model"=>$model,

    "attribute"=>'siteDescription',

    "height"=>'400px',

    "width"=>'600px',

    'editorTemplate'=>'advanced',

)
                                                                );
?>
			<td class="label">详细内容：</td><td><textarea name="description" rows="10" class="cmp-text"  ></textarea></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
	</form>
</div>

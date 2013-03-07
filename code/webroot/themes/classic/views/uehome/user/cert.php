<div class="m-breadcrumb">
    <p><b class="crumb"></b>会员中心<i></i>企业资质</p>
</div>
    <div class="m-table-list">
	
	<div class="hd">
		<div class="photo-hd">
		<p>您可以添加贵公司的营业执照和资质证书</p>
        <a class="cmp-btn-a" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/addcert');?>">添加企业相册图片</a>
		</div>
	</div>
	
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="123">图片</th><th width="123">分类</th><th width="421">详细说明</th><th>操作</th>
		</tr>
<?php
for ($i=0;$i<count($data);$i++)
{
    if ( $i%2 == 0)
    {
        $class = ($i%2 == 0) ? '' : 'class="even"';
    }
?>
    <tr <?php echo $class;?>>
    <td><img src="<?php echo $data[$i]['file_url'];?>" style="width:100px;" /></td>		
    <td><?php echo $data[$i]['file_title'];?></td>
			<td>
<?php echo $data[$i]['file_content'];?>
			</td>		
                <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/certdel',array('ids'=>$data[$i]['file_id']));?>" class="ico-del">删除</a></td>
		</tr>
<?php
}
?>
	</table>
	
	
	</div>

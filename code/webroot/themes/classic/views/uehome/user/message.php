		
	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>站内信</p>
	</div>

<?php
if ( Yii::app()->user->hasFlash('success'))
{
?>
	<div class="hd">		
		<div class="block-error">
        <p><?php  echo Yii::app()->user->getFlash('success');?> </p>
		</div>
	</div>
<?php
}
?>
	<!--m-table-list-->
	<div class="m-table-list" id="J_Supply_List">
	
	<div class="repeatbg search">

       <?php echo CHtml::dropDownList('msg_type',@$_REQUEST['msg_type'], array(0=>'不限',1=>'收件箱',2=>'发件箱'));?>
                <a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/messageadd');?>" class="cmp-btn">发送站内信</a> 
			
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="30">选择</th><th width="70">收信人</th><th width="280">主题</th><th width="156">公司名称</th><th width="50">联系人</th><th width="80">时间</th><th>操作</th>
		</tr>
                <?php for($index=0;$index<count($data);$index++):
                    $class = ($index%2 == 0) ? "" : "class='even'";
                    ?>
                    <tr <?php echo $class;?>>    
                    <td><input type="checkbox" value="<?php echo $data[$index]['msg_id'];?>" /></td>
                    <td><?php echo $data[$index]['user_name'];?></td>
                    <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/messageadd',array('msg_id'=>$data[$index]['msg_id'],'view'=>1));?>"><?php echo $data[$index]['msg_subject'];?></a></td>
                    <td><?php echo $data[$index]['ent_name'];?></td>
                    <td><?php echo $data[$index]['ent_chief'];?></td>
                    <td><?php echo $data[$index]['msg_date'];?></td>
		            <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/messagedel',array('ids'=>$data[$index]['msg_id']));?>" class="ico-del">删除</a></td>
                    </tr>
		<?php endfor;?>			   
	
		<tr>
			<td colspan="9">
				<p class="btn-group">
					<a class="cmp-btn all">全选</a>
					<a class="cmp-btn cancel">取消</a>
					<a class="cmp-btn delete" data-api="<?php echo Yii::app()->controller->createUrl('/uehome/user/messagedel');?>">删除</a>
				</p>
			</td>
		
		</tr>
		
	</table>
	
	<div class="pager">
			<?php 
	            $this->widget('CLinkPager',array(
							'header'=>'',
							'firstPageLabel'=>'首页',
							'lastPageLabel'=>'末页',
							'prevPageLabel'=>'上一页',
							'nextPageLabel'=>'下一页',
							'pages'=>$pager,
							'maxButtonCount'=>7,
							)
				
				);
            ?>		
	</div>
	
	</div>
	<!--m-table-list-->

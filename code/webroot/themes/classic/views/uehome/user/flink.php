	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>企业旺铺<i></i>友情链接</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list" id="J_Supply_List">
	
	<!--<div class="hd">		
		<div class="block-error">
			<p>企业名称必须填写！</p>
		</div>
	</div>-->
	<div class="repeatbg search">
                <a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/flinkadd');?>" class="cmp-btn">添加友情链接</a> 
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="30">选择</th><th width="170">链接标题</th><th width="280">链接URL</th><th width="160">创建时间</th><th>操作</th>
		</tr>
                <?php for($index=0;$index<count($data);$index++):
                    $class = ($index%2 == 0) ? "" : "class='even'";
                    ?>
                    <tr <?php echo $class;?>>    
                    <td><input type="checkbox" value="<?php echo $data[$index]['flink_id'];?>" /></td>
                    <td><?php echo $data[$index]['flink_name'];?></td>
                    <td><?php echo $data[$index]['flink_url'];?></td>
                    <td><?php echo date("Y-m-d H:i",strtotime($data[$index]['flink_create_date']));?></td>
		            <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/flinkdel',array('ids'=>$data[$index]['flink_id']));?>" class="ico-del">删除</a></td>
                    </tr>
		<?php endfor;?>			   
	
		<tr>
			<td colspan="9">
				<p class="btn-group">
					<a class="cmp-btn all">全选</a>
					<a class="cmp-btn cancel">取消</a>
					<a class="cmp-btn delete" data-api="<?php echo Yii::app()->controller->createUrl('/uehome/user/flinkdel');?>">删除</a>
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

	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>供求列表</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list" id="J_Supply_List">
	
	<div class="repeatbg search">
			<form>
			<input type="hidden" name="r" value="<?php echo $_GET['r']?>" />
<?php echo CHtml::dropDownList('supply_status',$select_status, $status);?>
				<!--<select name="category"><option>选择栏目</option></select>
				<label>关键字：</label>
				<input type="text" name="keyword" class="cmp-input" />
				<select name="rank"><option>排序</option></select>
				<input type="submit" class="cmp-btn" value="搜索"/>-->
                <a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/supply');?>" class="cmp-btn">添加供求</a>
			</form>
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="30">选择</th><th width="30">状态</th><th width="300">标题</th><th width="107">品类</th><th width="56">品位</th><th width="106">存货地</th><th width="160">有效期</th><th width="40">操作</th>
		</tr>
                    <?php for($index=0;$index<count($data);$index++):
                    $class = ($index%2 == 0) ? "" : "class='even'";
                    ?>
                    <tr <?php echo $class;?>>    
                    <td><input type="checkbox" value="<?php echo $data[$index]['supply_id'];?>" /></td>
                    <td><?php echo $status[$data[$index]['supply_status']];?></td>
                    <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/supply',array('supply_id'=>$data[$index]['supply_id'],'update'=>1));?>"><?php echo $data[$index]['supply_name'];?></a></td>
                    <td><?php echo $data[$index]->category?$data[$index]->category->term_name:'未指定';?></td>
                    <td><?php echo $data[$index]->supply_mu_content;?></td>
                    <td><?php echo $data[$index]->city?$data[$index]->city->city_name:'未指定'?></td>
                    <td><?php echo date('Y-m-d',strtotime($data[$index]['supply_valid_date']));?></td>                      
		            <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/supply',array('supply_id'=>$data[$index]['supply_id'],'update'=>1));?>" class="ico-edit">编辑</a><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/supplydel',array('ids'=>$data[$index]['supply_id']));?>" class="ico-del">删除</a></td>
                    </tr>
		<?php endfor;?>			   

		<tr>
			<td colspan="8">
				<p class="btn-group">
					<a class="cmp-btn all">全选</a>
					<a class="cmp-btn cancel">取消</a>
					<a class="cmp-btn delete" data-api="index.php?r=/uehome/user/supplydel">删除</a>
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

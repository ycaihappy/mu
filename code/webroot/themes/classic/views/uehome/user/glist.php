	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>现货列表</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list">
	
	<div class="repeatbg search">
			<form>
<?php echo CHtml::dropDownList('product_status','', $status,array());?>
				<!--<select name="category"><option>选择栏目</option></select>
				<label>关键字：</label>
				<input type="text" name="keyword" class="cmp-input" />
				<select name="rank"><option>排序</option></select>
				<input type="submit" class="cmp-btn" value="搜索"/>-->
			<a class="cmp-btn">添加现货</a>
			</form>
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="58">状态</th><th width="35">选择</th><th width="314">标题</th><th width="107">品类</th><th width="106">品位</th><th width="106">存货地</th><th>操作</th>
		</tr>
                    <?php for($index=0;$index<count($data);$index++):
                    $class = ($index%2 == 0) ? "" : "class='even'";?>
        <tr>                     
                    <td><?php echo $status[$data[$index]['product_status']];?></td>
                    <td><input type="checkbox" /></td>
                    <td><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/goods',array('product_id'=>$data[$index]['product_id'],'update'=>1));?>"><?php echo $data[$index]['product_name'];?></a></td>
                    <td><?php echo $allcategory[$data[$index]['product_type_id']];?></td>
                    <td><?php echo $data[$index]['product_mu_content'];?></td>
                    <td><?php echo $allcity[$data[$index]['product_city_id']];?></td>
                    <td><?php echo $data[$index]['product_join_date'];?></td>                      
		<td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/goods',array('product_id'=>$data[$index]['product_id'],'update'=>1));?>" class="ico-edit">编辑</a><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/productdel',array('product_id'=>$data[$index]['product_id']));?>" class="ico-del">删除</a></td>
                    </tr>
		<?php endfor;?>			   
		<tr>
			<td colspan="8">
				<p class="btn-group">
					<a class="cmp-btn">全选</a>
					<a class="cmp-btn">取消</a>
					<a class="cmp-btn">删除</a>
				</p>
			</td>
		
		</tr>
		
	</table>
	
	<div class="pager">共 600 页/20000条记录 <a>首页</a><a>1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>下页</a><a>末页</a></div>
	
	</div>

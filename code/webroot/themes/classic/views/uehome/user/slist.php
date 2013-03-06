	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>供求列表</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list" id="J_Supply_List">
	

	<div class="repeatbg search">
			<form>
			<input type="hidden" name="r" value="uehome/user/slist" />
<?php echo CHtml::dropDownList('supply_status','', $status,array());?>
				<!--<select name="category"><option>选择栏目</option></select>
				<label>关键字：</label>
				<input type="text" name="keyword" class="cmp-input" />
				<select name="rank"><option>排序</option></select>
				<input type="submit" class="cmp-btn" value="搜索"/>-->
			<a class="cmp-btn">添加供求信息</a>
			</form>
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="30">状态</th><th width="30">选择</th><th width="314">标题</th><th width="107">品类</th><th width="60">品位</th><th width="106">存货地</th><th width="106">有效时间</th><th width="40">操作</th>
		</tr>

        <?php for($index=0;$index<count($data);$index++):
        $class = ($index%2 == 0) ? "" : "class='even'";
        ?>
            <tr <?php echo $class;?>>           
                    <td><?php echo $status[$data[$index]['supply_status']];?></td>
                    <td><input type="checkbox" name="supply_id[]" value="<?php echo $data[$index]['supply_id'];?>" /></td>
                    <td class="td02"><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('/uehome/supply/view',array('supply_id'=>$data[$index]['supply_id'],'update'=>true));?>"><?php echo $data[$index]['supply_name'];?></a></td>
                    <td><?php echo $allcategory[$data[$index]['supply_category_id']];?></td>
                    <td><?php echo $data[$index]['supply_mu_content'];?></td>
                    <td><?php echo $allcity[$data[$index]['supply_city_id']];?></td>
                    <td><?php echo $data[$index]['supply_valid_date'];?></td>                      
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">删除</a></td>
                    </tr>
	        		<?php endfor;?>			   
		<tr>
			<td colspan="6">
				<p class="btn-group">
					<a class="cmp-btn all">全选</a>
					<a class="cmp-btn cancel">取消</a>
					<a class="cmp-btn delete">删除</a>
				</p>
			</td>
		
		</tr>
		
	</table>
	
	<div class="pager">共 600 页/20000条记录 <a>首页</a><a>1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>下页</a><a>末页</a></div>
	
	</div>

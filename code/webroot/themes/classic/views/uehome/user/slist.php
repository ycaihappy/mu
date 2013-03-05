	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>供求列表</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list">
	

	<div class="repeatbg search">
			<form>
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
			<th width="58">状态</th><th width="35">选择</th><th width="314">标题</th><th width="107">品类</th><th width="106">品位</th><th width="106">存货地</th><th width="106">有效时间</th><th>操作</th>
		</tr>
		<tr>
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
            <td>面议</td>
            <td>2013-1-1</td>
            <td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr class="even">
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
			<td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr>
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
			<td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr class="even">
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
			<td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr>
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
			<td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr class="even">
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
			<td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr>
			<td>001</td>
			<td><input type="checkbox" /></td>
			<td>文字文字文字文字文字文字</td>
			<td>2013-1-1</td>
			<td>面议</td>
			<td><a href="" class="ico-edit">编辑</a><a href="" class="ico-del">编辑</a></td>
		</tr>
		<tr>
			<td colspan="6">
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

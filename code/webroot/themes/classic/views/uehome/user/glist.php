	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>现货列表</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list" id="J_Supply_List">
	
	<div class="repeatbg search">
			<form>
			<input type="hidden" name="r" value="<?php echo $_GET['r']?>" />
<?php echo CHtml::dropDownList('product_status',$select_status, $status,array());?>
				<!--<select name="category"><option>选择栏目</option></select>
				<label>关键字：</label>
				<input type="text" name="keyword" class="cmp-input" />
				<select name="rank"><option>排序</option></select>
				<input type="submit" class="cmp-btn" value="搜索"/>-->
			<a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/goods');?>" class="cmp-btn">添加现货</a>
			</form>
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="30">选择</th><th width="40">状态</th><th width="314">标题</th><th width="107">品类</th><th width="106">品位</th><th width="106">存货地</th><th width="106">添加时间</th><th width="85">操作</th>
		</tr>
                    <?php for($index=0;$index<count($data);$index++):
                    $class = ($index%2 == 0) ? "" : "class='even'";?>
        <tr>         
        			<td><input type="checkbox" value="<?php echo $data[$index]['product_id'];?>" /></td>            
                    <td><?php echo $status[$data[$index]['product_status']];?></td>
                    <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/goods',array('product_id'=>$data[$index]['product_id'],'update'=>1));?>"><?php echo $data[$index]['product_name'];?></a></td>
                    <td><?php echo $data[$index]['type']['term_name'];?></td>
                    <td><?php echo $data[$index]['product_mu_content']?></td>
                    <td><?php echo $data[$index]->city->city_name?></td>
                    <td><?php echo date('Y-m-d',strtotime($data[$index]['product_join_date']));?></td>                      
		<td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/goods',array('product_id'=>$data[$index]['product_id'],'update'=>1));?>" class="ico-edit">编辑</a><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/productdel',array('ids'=>$data[$index]['product_id']));?>" class="ico-del">删除</a></td>
                    </tr>
		<?php endfor;?>			   
		<tr>
			<td colspan="8">
				<p class="btn-group">
					<a class="cmp-btn all">全选</a>
					<a class="cmp-btn cancel">取消</a>
					<a class="cmp-btn delete" data-api="index.php?r=/uehome/user/productdel">删除</a>
					<a class="cmp-btn special">设置特价</a>
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

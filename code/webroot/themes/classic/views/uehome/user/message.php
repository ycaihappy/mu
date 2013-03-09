		
	<div class="m-breadcrumb">
		<p><b class="crumb"></b>会员中心<i></i>站内信</p>
	</div>
	<!--m-table-list-->
	<div class="m-table-list" id="J_Supply_List">
	
	<div class="hd">		
		<div class="block-error">
			<p>企业名称必须填写！</p>
		</div>
	</div>
	<div class="repeatbg search">
			
				
				<a class="cmp-btn">发送站内信</a> <a class="cmp-btn">已发站内信</a>
			
		</div>
	
	<table border="0" cellpadding="0" cellspacing="0" class="table-list" width="100%">
		<tr class="repeatbg">
			<th width="30">选择</th><th width="70">发信人</th><th width="280">主题</th><th width="156">公司名称</th><th width="50">联系人</th><th width="80">时间</th><th>操作</th>
		</tr>
                <?php for($index=0;$index<count($data);$index++):
                    $class = ($index%2 == 0) ? "" : "class='even'";
                    ?>
                    <tr <?php echo $class;?>>    
                    <td><input type="checkbox" value="<?php echo $data[$index]['msg_id'];?>" /></td>
                    <td><?php echo $data[$index]['user_name'];?></td>
                    <td><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/messageadd',array('msg_id'=>$data[$index]['msg_id'],'update'=>1));?>"><?php echo $data[$index]['msg_subject'];?></a></td>
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
					<a class="cmp-btn delete" data-api="index.php?r=">删除</a>
				</p>
			</td>
		
		</tr>
		
	</table>
	
	<div class="pager">
			<ul class="yiiPager" id="yw0"><li class="first hidden"><a href="/index.php?r=uehome/user/slist">首页</a></li>
<li class="previous hidden"><a href="/index.php?r=uehome/user/slist">上一页</a></li>
<li class="page selected"><a href="/index.php?r=uehome/user/slist">1</a></li>
<li class="page"><a href="/index.php?r=uehome/user/slist&amp;page=2">2</a></li>
<li class="page"><a href="/index.php?r=uehome/user/slist&amp;page=3">3</a></li>
<li class="page"><a href="/index.php?r=uehome/user/slist&amp;page=4">4</a></li>
<li class="page"><a href="/index.php?r=uehome/user/slist&amp;page=5">5</a></li>
<li class="page"><a href="/index.php?r=uehome/user/slist&amp;page=6">6</a></li>
<li class="page"><a href="/index.php?r=uehome/user/slist&amp;page=7">7</a></li>
<li class="next"><a href="/index.php?r=uehome/user/slist&amp;page=2">下一页</a></li>
<li class="last"><a href="/index.php?r=uehome/user/slist&amp;page=10">末页</a></li></ul>		
	</div>
	
	</div>
	<!--m-table-list-->

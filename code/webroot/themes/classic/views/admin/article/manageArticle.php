<?php
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'文章管理',
);
?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>

<div>
<?php 
foreach ($artCategory as $categoryId=>$category) {
	if($categoryId==0)
	continue;
	$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'addArticle'.$categoryId,
			'caption'=>'添加'.$category,
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    window.location.href="'.Yii::app()->controller->createUrl("updateArticle",array('parentId'=>$categoryId)).'";
		}',
		)
);
}
?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div style="float:right;">
<div>
<label>状态：</label>
<?php echo $form->dropDownList($model,'art_status',$artStatus);?>
<label>大分类：</label>
<?php echo $form->dropDownList($model,'art_category_id',$artCategory,array(
        'ajax'=>array(
                    'type'=>'GET',
                    'url'=>CController::createUrl('article/manageNews'),
                    'update'=>'#Article_art_subcategory_id',
                    'data'=>array('categoryId'=>"js:this.value",'type'=>'getSubCategory')
                )));?>
<label>小分类：</label>
<?php echo $form->dropDownList($model,'art_subcategory_id',$artSubcategory);?>
<label>标题：</label>
<?php echo $form->textField($model,'art_title',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="articleForm" action='<?php echo  Yii::app()->controller->createUrl('changeNewsStatus') ?>' method='post'>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'art_id',
        	'checkBoxHtmlOptions'=>array('name'=>'art_id[]',),
        	'value'=>'$data->art_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->art_title.($data->art_img?"（图）":"")',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'发布人',
        	'value'=>'$data->createUser->user_name',
        ), 
        array(
        	'name'=>'大分类',
        	'value'=>'$data->category->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'小分类',
        	'value'=>'$data->subcategory->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->art_post_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateArticle",array("art_id"=>$data->art_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$alertTitle='文章';
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'发布',
		'value'=>'asd',
		'onclick'=>'js:function(){
			var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要生效的'.$alertTitle.'信息！");
			}
			else
			{
				var url=this.form.action+"&toStatus=1";
				$("#articleForm").ajaxSubmit(
					{
						url:url,
						success:function(msg){
							alert(msg);
							$.fn.yiiGridView.update("yw0");
						},
					}
				);
			}
			return false;
		}',
		)
);
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button2',
			'caption'=>'撤销',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要设为无效的'.$alertTitle.'信息！");
			}
			else
			{
				var url=this.form.action+"&toStatus=2";
				$("#articleForm").ajaxSubmit(
					{
						url:url,
						success:function(msg){
							alert(msg);
							$.fn.yiiGridView.update("yw0");
						},
					}
				);
			}
			return false;
		}',
		)
);
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button3',
			'caption'=>'删除',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要删除的'.$alertTitle.'信息！");
			}
			else
			{
				if(confirm("确定删除选中的'.$alertTitle.'信息"))
				{
					var url=this.form.action+"&toStatus=33";
					$("#articleForm").ajaxSubmit(
						{
							url:url,
							success:function(msg){
								alert(msg);
								$.fn.yiiGridView.update("yw0");
							},
						}
					);
				}
			}
			return false;
		}',
		)
);
echo '   '.CHtml::dropDownList('info_pos', 0, $rePosition);
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button4',
			'caption'=>'确定推荐',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要推荐的'.$alertTitle.'信息！");
			}
			else
			{
				var ids=[],info_pos=$("#info_pos").val();
				for(var i=0;i<selectedProducts.size();i++)
				{
					ids.push(selectedProducts[i].value);
				}
				
				$.ajax(
				{
					url:"'.Yii::app()->controller->createUrl("advertisementRecommend/recommendInfo").'",
        			type:"POST",
        			data:{info_ids:ids,info_type:23,info_pos:info_pos},
        			success:function(msg){
        				alert(msg);
        			},
        			error:function(){
        				alert("请求发送失败!");
        			},
				}
				);
			}
			return false;
		}',
		)
);
?>
</DIV>
</form>
<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.form.js');
?>
<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'字典分类管理',
);

?>
<div style="width:50%;float:left;">
<div style="float:left;">
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'添加新字典分类',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    $.ajax({
		    				url:"'.Yii::app()->controller->createUrl("saveTermGroup").'",
        					type:"POST",
        					beforeSend:function(){
        						$("#preview").addClass("srbacLoading");
        					},
        					success:function(html){$("#preview").html(html);},
        					complete:function(){
        						$("#preview").removeClass("srbacLoading");
        					}
        				});
			return false;
		}',
		)
);
?>
</div>
<div id="list" style="clear:both;"><?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'termGroupList',
    'dataProvider'=>$dataProvider,
	'summaryText'=>'',
    'columns'=>array(
		array(
        	'name'=>'编号',
        	'value'=>'$data->group_id',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'名称',
        	'value'=>'$data->group_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("saveTermGroup",array("group_id"=>$data->group_id))',
        	'buttons'=>array(
        		'update'=>array(
        			'click'=>'js:function(){
        				$.ajax({
        					url:this.href,
        					type:"GET",
        					beforeSend:function(){
        						$("#preview").addClass("srbacLoading");
        					},
        					success:function(html){$("#preview").html(html)},
        					complete:function(){
        						$("#preview").removeClass("srbacLoading");
        					}
        				});
        				return false;
        			}',
        		),
        	),
        	'updateButtonLabel'=>'修改'
        	)
    )
));
?>
</div>
</div>
<div id="preview" style="width:40%;float:left;padding:15px;">

</div>
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery.ui');
Yii::app()->getClientScript()->registerCssFile('css/srbac.css');
$saveScript=<<<SAVE
window.updateYiiGridView=function(){
	$.fn.yiiGridView.update('termGroupList');
};
SAVE;
Yii::app()->getClientScript()->registerScript('TermGroup#saveOrUpdate',$saveScript);
?>
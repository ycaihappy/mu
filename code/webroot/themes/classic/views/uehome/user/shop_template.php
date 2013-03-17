	
		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>旺铺模板选择</p>
</div>

<?php $this->renderPartial('updateTip'); ?>
 <div class="m-shop-tpl" id="J_ShopTpl">
 	<?php if($templates):
 			foreach ($templates as $template):
 	?>
	<div class="type_item ">
		<img class="type_preview" src="<?php echo '/images/storeFront/'.$template->temp_dir.'/'.'temp.jpg'?>" alt="" data-big="<?php echo '/images/storeFront/'.$template->temp_dir.'/'.'temp.jpg'?>" />
		<div class="type_info">
		<h3><?php echo $template->temp_name?></h3>
		<p>
		<?php if($userTemplate!=$template->temp_dir):?>
		<a href="<?php echo $this->createUrl('/uehome/user/shopTemplate',array('temp_id'=>$template->temp_id))?>" class="btn apply">[ 应用 ]</a>
		<?php else:?>
		<a href="javascript:;" class="btn preview"><b>正在应用...</b></a>
		<?php endif;?>
		</p>
		<?php if($userTemplate!=$template->temp_dir):?>
			<p><a target="_blank" href="<?php echo $this->createUrl('/storeFront/default/index',array('username'=>Yii::app()->user->getName(),'preview'=>$template->temp_dir))?>" class="btn preview">[ 预览 ]</a></p>
		<?php endif;?>
		</div>
	</div>
	<?php endforeach;
	endif;
	?>
</div>
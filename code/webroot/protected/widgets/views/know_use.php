<div class="clearfix"></div>
<div class="m-supply-news ui-m-tab ui-m-border">
	<div class="hd">
		<span class="on"><a href="">钼用途</a></span>
	</div>
	<div class="bd">
		<ul>
	<?php 
			if($data):
				for($index=0;$index<count($data);$index++):
				?>
					<li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
			<?php endfor;
			endif;
			?>			
		</ul>
	</div>

</div>
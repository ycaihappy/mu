		<div class="m-news-focus know">
		<div class="inner ui-m-border">
		<div class="ui-m-tab ui-m-border first" >
			<div class="hd"><span class="on">钼百科</span></div>
		</div>
		
		<div class="mod ui-m-tab ui-m-border">
                <div class="hd"><span class="on"><a href="#">国家标准</a></span></div>
                 
				<div class="bd">
				<h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data02[0]['art_id']));?>" target="_blank"><?php echo $data02[0]['art_title'] ?></h3>
				<ul class="mod-list main-list">
						<?php for($index=1;$index<count($data02);$index++):
									?>
										<li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data02[$index]['art_id']))?>" target="_blank"><?php echo $data02[$index]['art_title'] ?></a></li>
								<?php endfor;?>
				</ul>
				 </div>
         </div>
			
		 <div class="mod ui-m-tab ui-m-border ui-m-last">
			<div class="hd"><span class="on"><a href="#">政策法规</a></span></div>
              
                <div class="bd">
<?php if ( isset($data04[0]) ){?>
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data04[0]['art_id']));?>" target="_blank"><?php echo $data04[0]['art_title'] ?></a></h3>
<?php } ?>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data04);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data04[$index]['art_id']))?>" target="_blank"><?php echo $data04[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
         </div>
		 
		 <div class="mod ui-m-tab ui-m-border ui-m-last">
			<div class="hd"><span class="on"><a href="#">生产工艺</a></span></div>
              
                <div class="bd">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data05[0]['art_id']));?>" target="_blank"><?php echo $data05[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data05);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data05[$index]['art_id']))?>" target="_blank"><?php echo $data05[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
         </div>
		 
		</div>
</div>

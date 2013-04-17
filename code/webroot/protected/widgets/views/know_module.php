		<div class="m-news-focus know">
		<div class="inner ui-m-border">
		<div class="ui-m-tab ui-m-border first" >
			<div class="hd"><span class="on">钼百科</span></div>
		</div>
		
		<div class="mod ui-m-tab ui-m-border">
                <div class="hd"><span class="on"><a href="#">国内标准</a></span></div>
                 
				<div class="bd">
				<h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[0]['art_id']));?>" target="_blank"><?php echo $data01[0]['art_title'] ?></h3>
				<ul class="mod-list main-list">
						<?php for($index=1;$index<count($data01);$index++):
									?>
										<li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[$index]['art_id']))?>" target="_blank"><?php echo $data01[$index]['art_title'] ?></a></li>
								<?php endfor;?>
				</ul>
				 </div>
         </div>
		<div class="mod ui-m-tab ui-m-border">
			   <div class="hd"><span class="on"><a href="#">国际标准</a></span></div>
               
                <div class="bd">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data02[0]['art_id']));?>" target="_blank"><?php echo $data02[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data02);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data02[$index]['art_id']))?>" target="_blank"><?php echo $data02[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
        </div>
			
			
		<div class="mod ui-m-tab ui-m-border ui-m-last">
			<div class="hd"><span class="on"><a href="#">钼用途</a></span></div>
              
                <div class="bd">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[0]['art_id']));?>" target="_blank"><?php echo $data03[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data03);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[$index]['art_id']))?>" target="_blank"><?php echo $data03[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
         </div>
		 
		 <div class="mod ui-m-tab ui-m-border ui-m-last">
			<div class="hd"><span class="on"><a href="#">钼应用</a></span></div>
              
                <div class="bd">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[0]['art_id']));?>" target="_blank"><?php echo $data03[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data04);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[$index]['art_id']))?>" target="_blank"><?php echo $data03[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
         </div>
		 
		 <div class="mod ui-m-tab ui-m-border ui-m-last">
			<div class="hd"><span class="on"><a href="#">钼化工</a></span></div>
              
                <div class="bd">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[0]['art_id']));?>" target="_blank"><?php echo $data03[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data05);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[$index]['art_id']))?>" target="_blank"><?php echo $data03[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
         </div>
		 
		 <div class="mod ui-m-tab ui-m-border ui-m-last">
			<div class="hd"><span class="on"><a href="#">钼产品</a></span></div>
              
                <div class="bd">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[0]['art_id']));?>" target="_blank"><?php echo $data03[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data06);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[$index]['art_id']))?>" target="_blank"><?php echo $data03[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
         </div>
		
		
		
		</div>
</div>

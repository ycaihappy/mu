		<divdiv class="m-news-focus">
		
		<div class="area" id="jjsc">
		<div class="title-bar ui-til1"><h2><a><img width="140" height="30" alt="钼百科" src="#"></a></h2>
        <div class="links right">
           
        </div>
    </div>
		</div>
		
		<div class="mod">
                <div class="title-bar ui-til4"><h2><a href="#">国内标准</a></h2>
                  <!--  <span class="more link">
                        <a href="http://money.163.com/stock/">股票</a> <span class="cLGray">|</span>
                        <a href="http://biz.163.com/">商业</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/licai/">理财</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/finance/">金融</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/fund/">基金</a></span>-->
                </div>
	<div class="mod-list main-list news-date-list">
	<h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[0]['art_id']));?>" target="_blank"><?php echo $data01[0]['art_title'] ?></h3>
	<ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data01);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data01[$index]['art_id']))?>" target="_blank"><?php echo $data01[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
	</ul>
	 </div>
               </div>
			   <div class="mod">
                <div class="title-bar ui-til4">
                    <h2><a href="#">国际标准</a></h2>
                    <!--<span class="more link">
                        <a href="http://money.163.com/ipo/">新股</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/yanbao">研报</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/hkstock">港股</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/usstock">美股</a> <span class="cLGray">|</span>
                        <a href="http://i.money.163.com/">自选股</a>
                    </span>-->
                </div>
                <div class="mod-list main-list news-date-list">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data02[0]['art_id']));?>" target="_blank"><?php echo $data02[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data02);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('knowledge/view',array('art_id'=>$data02[$index]['art_id']))?>" target="_blank"><?php echo $data02[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
            </div>
			
			
			 <div class="mod">
                <div class="title-bar ui-til4">
                    <h2><a href="#">钼应用</a></h2>
                    <!--<span class="more link">
                        <a href="http://money.163.com/ipo/">新股</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/yanbao">研报</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/hkstock">港股</a> <span class="cLGray">|</span>
                        <a href="http://money.163.com/usstock">美股</a> <span class="cLGray">|</span>
                        <a href="http://i.money.163.com/">自选股</a>
                    </span>-->
                </div>
                <div class="mod-list main-list news-date-list">
                     <h3 class="bigsize"><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[0]['art_id']));?>" target="_blank"><?php echo $data03[0]['art_title'] ?></a></h3>
                     <ul class="mod-list main-list">
   			<?php for($index=1;$index<count($data03);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data03[$index]['art_id']))?>" target="_blank"><?php echo $data03[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                     </ul>
                    
                </div>
            </div>
		
		
		
		
		</div>

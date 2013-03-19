		<div class="m-hq-news" id="J_Hq_news">
                <h1>
                    <a class="on" href="#">市场评论</a> <a href="#" class="">
                        预测分析</a> <!--<a href="http://gc.steelcn.com" class="">钢厂调价</a> -->
                </h1>
                <div class="ck-news" style="display: block;">
                    <div class="con">
                        <label id="GsybList">
                        <h2><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[0]['art_id']));?>"><?php echo substr($data[0]['art_title'],0,60);?></a></h2><span class="article2"><?php echo substr($data[0]['art_content'],0,120)."...";?></span>
                        </label>
                        <ul id="indexGsrbInfo">
			<?php for($index=1;$index<count($data)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span> <a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
			<?php endfor;?>			
                        </ul>
                    </div>
                </div>
                <div style="display: none;" class="ck-news">
                    <div class="con">
                        <label id="ZjgdList">
                        <h2><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[0]['art_id']));?>"><?php echo substr($mu_news[0]['art_title'],0,60);?></a></h2><span class="article2"><?php echo substr($mu_news[0]['art_content'],0,120)."...";?></span>
                        </label>
                        <ul id="indexZjgdInfo">
   			<?php for($index=1;$index<count($mu_news)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($mu_news[$index]['art_post_date']));?></span>  <a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[$index]['art_id']));?>" title="<?php echo $mu_news[$index]['art_title'] ?>" target="_blank"><?php echo $mu_news[$index]['art_title']; ?></a><em></em></li>
			<?php endfor;?>			
                        </ul>
                    </div>
                </div>
                <!--<div style="display: none;" class="ck-news">
                    <div class="con">
                        <ul id="ul_tiaojia">

    <li><a title="2月26日山西新金山特钢建筑钢材出厂价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/62469109CAEC4F.html">2月26日山西新金山特钢建筑钢材出厂价格调整信息</a></li>


    <li><a title="2月26日山西海鑫建筑钢材出厂价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/62469086F8454B.html">2月26日山西海鑫建筑钢材出厂价格调整信息</a></li>


    <li><a title="2月26日长江钢铁合肥地区建筑钢材价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/624689E53E6710.html">2月26日长江钢铁合肥地区建筑钢材价格调整信息</a></li>


    <li><a title="2月26日福建三宝集团建筑钢材价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/624679CB530D34.html">2月26日福建三宝集团建筑钢材价格调整信息</a></li>


    <li><a title="2月26日唐山鑫宇工字钢价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/624677EC53EB96.html">2月26日唐山鑫宇工字钢价格调整信息</a></li>


    <li><a title="2月26日唐山荣泰工字钢价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/6246766315C250.html">2月26日唐山荣泰工字钢价格调整信息</a></li>


    <li><a title="2月26日唐山唐城工字钢价格调整信息" target="_blank" href="http://gc.steelcn.com/a/47/20130226/624674AC403A62.html">2月26日唐山唐城工字钢价格调整信息</a></li>
</ul>
                    </div>
                </div>-->
            </div>

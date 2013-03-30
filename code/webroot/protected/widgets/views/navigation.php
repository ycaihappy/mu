   <div class="m-nav showed" id="J_Nav">
        <div class="bd">
            <div class="nav-con <?php echo $controller=='site'?'on':'' ?>">

            <strong><a href="<?php echo $this->getController()->createUrl('/site/index')?>">首页</a><i class="sp"></i>
			<b></b></strong>

            <p>
                <em></em><a href="<?php echo $this->getController()->createUrl('/product/index')?>">钼现货</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>1))?>">钼供应</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>2))?>">钼求购</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/product/list',array('type'=>1))?>">钼特价</a><em>|</em>
                 <a href="<?php echo $this->getController()->createUrl('/news/index')?>">钼资讯</a><em>|</em>
                <!-- <a href="<?php //echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>41))?>">钼市热点</a><em>|</em>
                <a href="<?php //echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">钼财经</a><em>|</em>-->
                <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>67))?>">钼产品</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>66))?>">钼用途</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>68))?>">钼化工</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>652))?>">仓单质押(现货通)</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>653))?>">动产质押逐笔控制</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/query',array('type'=>31))?>">钼走势图</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">行业动态</a><em>|</em>
                <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>654))?>">动产质押总量控制</a>
            </p>
           
            </div>
            <div class="nav-con <?php echo $controller=='news'?'on':'' ?>">

            <strong><a href="<?php echo $this->getController()->createUrl('/news/index')?>">新闻资讯</a><i class="sp"></i>
			<b></b></strong>

            <p>
            <em></em><!--  <a href="<?php //echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>40))?>">本网视点</a><em>|</em>
            <a href="<?php //echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">行业动态</a><em>|</em>-->
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>41))?>">钼市热点</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">钼财经</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>36))?>">国内行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>37))?>">国际行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>101))?>">原料行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>60))?>">市场评论</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>61))?>">预测分析</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>59))?>">价格汇总</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>653))?>">动产质押逐笔控制</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>654))?>">动产质押总量控制</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/query',array('type'=>31))?>">钼走势图</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>655))?>">配送服务</a>
            </p>
           
            </div>
            <div class="nav-con <?php echo in_array($controller,array('product','supply'))?'on':'' ?>">

            <strong><a href="<?php echo $this->getController()->createUrl('/product/index')?>">现货供求</a><i class="sp"></i>
			<b></b></strong><p>
            <em></em><a href="<?php echo $this->getController()->createUrl('/product/index')?>">钼现货</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>1))?>">钼供应</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/product/list',array('type'=>1))?>">钼特价</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>2))?>">钼求购</a><em>|</em>
            <!-- <a href="<?php //echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>36))?>">钼国内行情</a><em>|</em>
            <a href="<?php //echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>37))?>">钼国际行情</a><em>|</em>-->
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>101))?>">钼原料行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>60))?>">钼市场评论</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>61))?>">钼预测分析</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>59))?>">钼价格汇总</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>66))?>">钼用途</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>65))?>">钼生产工艺</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/query',array('type'=>31))?>">钼走势图</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>68))?>">钼化工</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>63))?>">钼国际标准</a>
            </p>
          
            </div>
            <div class="nav-con <?php echo $controller=='price'?'on':'' ?>">
           <strong><a href="<?php echo $this->getController()->createUrl('/price/index')?>">价格行情</a><i class="sp"></i>
			<b></b></strong>
           <p>
            <em></em><a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>36))?>">钼国内行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>37))?>">钼国际行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>101))?>">钼原料行情</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>60))?>">钼市场评论</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>61))?>">钼预测分析</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>59))?>">钼价格汇总</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/query',array('type'=>31))?>">钼走势图</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/product/index')?>">钼现货</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>1))?>">钼供应</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/product/list',array('type'=>1))?>">钼特价</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>2))?>">钼求购</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>68))?>">钼化工</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>655))?>">配送服务</a><em>|</em>
            <!--<a href="<?php //echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>40))?>">本网视点</a><em>|</em>
            <a href="<?php //echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">行业动态</a>-->
            </p>

           

            </div>
            <div class="nav-con <?php echo $controller=='knowledge'?'on':'' ?>">

           <strong><a href="<?php echo $this->getController()->createUrl('/knowledge/index')?>">钼百科</a><i class="sp"></i>
			<b></b></strong><p>
           <em></em><a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>66))?>">钼用途</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>65))?>">钼生产工艺</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>63))?>">钼国际标准</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>64))?>">钼国内标准</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>67))?>">钼产品</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>68))?>">钼化工</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>40))?>">本网视点</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">行业动态</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>41))?>">钼市热点</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">钼财经</a><em>|</em>
            <!--  <a href="<?php //echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>36))?>">国内行情</a><em>|</em>
            <a href="<?php //echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>37))?>">国际行情</a><em>|</em>-->
            <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>652))?>">仓单质押(现货通)</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/product/list',array('type'=>1))?>">钼特价</a><em>|</em>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>101))?>">原料行情</a>
            </p>
           
            </div>
            <div class="nav-con <?php echo $controller=='service'?'on':'' ?>">
           <strong><a href="<?php echo $this->getController()->createUrl('/service/index')?>">钼服务</a><i class="sp"></i>
			<b></b></strong>
           <p>
          <em></em> <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>651))?>">仓储金融</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>652))?>">仓单质押(现货通)</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>653))?>">动产质押逐笔控制</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>654))?>">动产质押总量控制</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>655))?>">配送服务</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>656))?>">前置现货通</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>656))?>">质检服务</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>66))?>">钼用途</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>65))?>">钼生产工艺</a><em>|</em>
           <!-- <a href="<?php //echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>63))?>">钼国际标准</a><em>|</em> -->
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>64))?>">钼国内标准</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/product/list',array('type'=>1))?>">钼特价</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>67))?>">钼产品</a>
           </p>
           
            </div>
            
            <div class="nav-con <?php echo $controller=='enterprise'?'on':'' ?>">
           <strong><a href="<?php echo $this->getController()->createUrl('/enterprise/index')?>">钼企业</a><i class="sp"></i>
			<b></b></strong>
           <p>
          <em></em>
          <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('bus_model'=>6))?>">采矿型钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('bus_model'=>7))?>">贸易型钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('bus_model'=>120))?>">加工型钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('bus_model'=>143))?>">生产型钼企</a><em>|</em>
           
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>16))?>">河南钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>27))?>">陕西钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>3))?>">河北钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>5))?>">内蒙古钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>6))?>">辽宁钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>7))?>">吉林钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>15))?>">山东钼企</a><em>|</em>
           <a href="<?php echo $this->getController()->createUrl('/enterprise/index',array('ent_city'=>14))?>">江西钼企</a>
          </p>
           
            </div>
           

        </div>
    </div>

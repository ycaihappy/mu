<?php
?>
   <div class="m-nav showed" id="J_Nav">
        <div class="bd">
            <div class="nav-con <?php echo $controller=='site'?'on':'' ?>">

            <strong><a href="<?php echo $this->getController()->createUrl('/site/index')?>">首页</a><i class="sp"></i>
			<b></b></strong>

            <p>
	            <a href="<?php echo $this->getController()->createUrl('/product/index')?>">钼现货通</a>
	            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>1))?>">钼供应</a>
	            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>1))?>">钼求购</a>
	            <a href="<?php echo $this->getController()->createUrl('/news/index')?>">钼资讯</a>
            </p>
           
            </div>
            <div class="nav-con <?php echo $controller=='news'?'on':'' ?>">

            <strong><a href="<?php echo $this->getController()->createUrl('/news/index')?>">新闻资讯</a><i class="sp"></i>
			<b></b></strong>

            <p>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>40))?>">本网视点</a>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>42))?>">行业动态</a>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>41))?>">钼市热点</a>
            <a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">钼财经</a>
            </p>
           
            </div>
            <div class="nav-con <?php echo in_array($controller,array('product','supply'))?'on':'' ?>">

            <strong><a href="<?php echo $this->getController()->createUrl('/product/index')?>">现货供求</a><i class="sp"></i>
			<b></b></strong><p>
            <a href="<?php echo $this->getController()->createUrl('/product/index')?>">钼现货</a>
            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>1))?>">钼供应</a>
            <a href="<?php echo $this->getController()->createUrl('/product/list',array('type'=>1))?>">钼特价</a>
            <a href="<?php echo $this->getController()->createUrl('/supply/list',array('type'=>2))?>">钼求购</a>
            </p>
          
            </div>
            <div class="nav-con <?php echo $controller=='price'?'on':'' ?>">
           <strong><a href="<?php echo $this->getController()->createUrl('/price/index')?>">价格行情</a><i class="sp"></i>
			<b></b></strong>
           <p>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>36))?>">钼国内行情</a>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>37))?>">钼国际行情</a>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>101))?>">钼原料行情</a>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>60))?>">钼市场评论</a>
            <a href="<?php echo $this->getController()->createUrl('/price/list',array('subcategory_id'=>61))?>">钼预测分析</a>
            </p>
           

            </div>
            <div class="nav-con <?php echo $controller=='knowledge'?'on':'' ?>">

           <strong><a href="<?php echo $this->getController()->createUrl('/knowledge/index')?>">钼百科</a><i class="sp"></i>
			<b></b></strong><p>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>66))?>">钼用途</a>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>65))?>">钼生产工艺</a>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>63))?>">钼国际标准</a>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>64))?>">钼国内标准</a>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>67))?>">钼产品</a>
           <a href="<?php echo $this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>68))?>">钼应用</a>
            </p>
           
            </div>
            <div class="nav-con <?php echo $controller=='site'?'on':'' ?>">
           <strong><a href="<?php echo $this->getController()->createUrl('/service/index')?>">钼服务</a><i class="sp"></i>
			<b></b></strong>
           <p>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>651))?>">仓储金融</a>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>652))?>">仓单质押（现货通）</a>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>653))?>">动产质押逐笔控制</a>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>654))?>">动产质押总量控制</a>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>655))?>">配送服务</a>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>656))?>">前置现货通</a>
           <a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>656))?>">质检服务</a>
           </p>
           
            </div>
           

        </div>
    </div>

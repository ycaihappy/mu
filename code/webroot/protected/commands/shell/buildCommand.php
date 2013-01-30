<?php

class buildCommand extends CConsoleCommand{  
    public function run($args){  

        switch ($args[0])
        {
        case 'price':
            /*
             * ·2012年1-12月份我国钼铁进口对比图
             * ·2012年1-12月份我国钼铁出口对比图
             * ·2012年1-12月国内氧化钼价格走势图
             * ·2012年1-12月国内钼铁价格走势图
             * ·2012年1-12月国际氧化钼价格走势图
             * ·2012年1-12月国际钼铁价格走势图
             * ·2012年12月国内氧化钼价格走势图
             * ·2012年12月国内钼铁价格走势图
             * ·2012年12月国际氧化钼价格走势图
             * ·2012年12月国际钼铁价格走势图
             */
            for($i=300;$i<350;$i++)           
            {
                $article = new Article();
                #$article->art_id = $i+10;
                $article->art_title = '2011年4月份钼系产品月报告';
                $article->art_title = '2012年1-12月份我国钼铁进口对比图';
                $article->art_status=1;
                $article->art_content="　钼精矿市场：今日40-45%钼精矿主流报价1540-1570元/吨度附近，47%及以上品位1560-1580元/吨度，价格暂时持稳，行情仍有继续向上运行迹象。行情短期利好，之前部分商家场外观望，近期开始逐步参与市场。栾川某商家表示，前期矿商停产较多，贸易商多以低库存场外等待行情好转。虽然近期钼精矿价格开始有所好转，但是上调的步伐依然较慢。与成本相比，盈利空间较小。期待后期继续上行。
                    
                    　　钼铁市场：钼铁价格暂时保持平稳，市场主流报价10.7-11万元/吨（现款-承兑）。当前，在行情利好带动下，有商家报价呈现虚高状况，整体现款报价期间10.6-10.8万元/吨为主，承兑10.9-11.1万元/吨左右。市场需求尚无完全释放，高价成交偏少。月底部分钢厂招标会逐步启动，钼铁厂家有继续挺价迹象。从近期的钢厂招标来看，钢厂60钼铁的承兑招标价格10.4-10.6万元/吨较为常见，后期有提升空间。
                    
                    　　12月21日LME钼期货报价整体保持平稳，3月期钼报价25250/25750美元/吨；15月期钼报价25720/26720美元/吨，LME期钼持仓132手。今日简讯：明年贷款需求将相对旺盛，城镇化为信贷投放重点；中金：新型城镇化难以支持新一轮地产投资；意大利总理蒙蒂递交辞呈，大选或于明年2月举行。
                    
                    　　周初外盘钼市部分产品价格仍有上调迹象，欧洲钼铁、氧化钼等都有一定涨幅；美国市场稍显平稳，价格暂稳波动。其次，欧亚将钼氧化物进口关税从5%降至零，这有利增加外部市场对该产品的需求，降低钼铁合金的生产成本，提高外部市场行业竞争力。国内行情运行平稳，主要钼产品价格继续保持在相对高位。同时，市场部分商家报价仍有抬高迹象，加之年底逼近，后期钢厂招标或有新的改观。";
                $article->art_source="lizhili".$i;
                $article->art_category_id = 16;
                $article->art_recommend = rand(0,1);
                $article->art_user_id = 1;
                $article->art_check_by = "lizhili".$i;
                $article->art_tags = '钼';
                $article->art_post_date = time();
                $article->art_modified_date = time();
                $article->save();
            }
            break;
        case 'article':
            for($i=300;$i<350;$i++)
            {
                $article = new Article();
                $article->art_id = $i+10;
                $article->art_title = 'Yiic介绍 '.$i;
                $article->art_status=1;
                $article->art_content="先来一句废话，命令行方式下的app为CConsoleApplication（位于framework\console下），而不是网页端的CWebApplication，所以一些默认的组件是没有加载，如authManager等，请参考CWebApplication的registerCoreComponents方法。 
                    CConsoleApplication读取的配置文件为console.php(位与webapp\protected\config下)，而不是main.php.其中至关重要的一项配置即为commandPath（默认是webapp\protected\commands），即我们的命令放在什么地方，我一般放在webapp\protected\commands\shell下。如果用到model，如某些AR类，也需要导入。我的配置为";
                $article->art_source="lizhili".$i;
                $article->art_category_id = rand(20,21);
                $article->art_recommend = rand(0,1);
                $article->art_user_id = 1;
                $article->art_check_by = "lizhili".$i;
                $article->art_tags = '钼';
                $article->art_post_date = time();
                $article->art_modified_date = time();
                $article->save();
            }
            break;
        case 'supply':
            /*
             * ·钼铁钼棒回收钼片钼块回收钼渣回收上海钼丝废钼回收
             * ·深圳废钼条回收
             * ·采购钼丝，钼针，钼板，钼铁
             * ·我公司长期大量求购废钼丝
             * ·保密现金回收钼铁
             * ·求购废钼催化剂
             * ·采购钼丝，钼针，钼板，钼铁
             * ·长期供应钼铁
             * ·长期出售钼酸铵
             * ·长期供应钼铁60%
             * ·长期供应钼铁60%，欢迎来电
             * ·供应钼铁
             * ·长期钼铁出售
             */
            for($i=30;$i<200;$i++)
            {
                $supply = new Supply();
                $supply->supply_id = $i+1;
                $supply->supply_user_id = 1;
                $supply->supply_type=rand(0,1);
                $supply->supply_keyword="钼铁，钼矿";
                $supply->supply_category_id = rand(1,21);
                $supply->supply_contractor = '李先生';
                $supply->supply_content= '求购钼矿石';
                $supply->supply_address= "深圳龙华大浪石光工业区";
                $supply->supply_city_id = rand(2,20);
                $supply->supply_status = 1;
                $supply->supply_phone= '18666666';
                $supply->supply_price = rand(10,1000);
                $supply->supply_valid_date = time();
                $supply->supply_check_by = 1;
                $supply->supply_recommend = 1;
                $supply->save();
            }
            break;
        case 'product':
            for($i=2;$i<200;$i++)
            {
                $product = new product();
                $product->product_id = $i;
                $product->product_user_id = 1;
                $product->product_keyword="钼铁，钼矿";
                $product->product_type_id= rand(1,10);
                $product->product_name = '钼精矿'.$i;
                $product->product_unit = 11;
                $product->product_quanity = rand(100,1000);
                $product->product_location= "深圳龙华大浪石光工业区";
                $product->product_city_id = rand(2,20);
                $product->product_status = 1;
                $product->product_price = rand(10,1000);
                $product->product_city_id = rand(2,20);
                $product->product_special= 1;
                $product->product_join_date = time();
                $product->product_image_src = 'http://www.zhuzao.com/UploadFile/Baikeuppic/1230873708.jpg';
                $product->save();
            }
            break;
        case 'case':
            for($i=0;$i<100;$i++)
            {
                $succCase = new SuccessCase();
                $succCase->case_id = $i+1;
                $succCase->supply_id = rand(1,100);
                $succCase->supply_user_id=1;
                $succCase->purchase_user_id=1;
                $succCase->purchase_amount= $i*100;
                $succCase->create_time = time();
                $succCase->case_status =1;
                $succCase->save();
            }
            break;
        case 'user':
            for($i=2;$i<100;$i++)
            {
                $user = new User();
                $user->user_id = $i+1;
                $user->user_name = 'ueelife';
                $user->user_pwd  ='e10adc3949ba59abbe56e057f20f883e';
                $user->user_status =1;
                $user->save();
            }
            break;
        case 'enterprise':
            for($i=2;$i<100;$i++)
            {
                $enterprise = new Enterprise();
                $enterprise->ent_id= $i+1;
                $enterprise->ent_user_id= rand(1,10);
                $enterprise->ent_name='深圳优意生活网络公司';
                $enterprise->ent_type =rand(1,5);
                $enterprise->ent_website = 'www.mushw.com';
                $enterprise->ent_business_model = rand(1,10);
                $enterprise->ent_zipcode ='51800';
                $enterprise->ent_introduce ='企业是从事生产、流通、服务等经济活动，以生产或服务满足社会需要，实行自主经营、独立核算、依法设立的一种盈利性的经济组织。企业主要指独立的盈利性组织。在中国计划经济时期，“企业”是与“事业单位”平行使用的常用词语。《辞海》1979年版中，“企业”的解释为：“从事生产、流通或服务活动的独立核算经济单位”；“事业单位”的解释为：“受国家机关领导，不实行经济核算的单位”。在20世纪后期中国大陆改革开放与现代化建设及信息技术领域新概念大量涌入的背景下，“企业”一词的用法有所变化，并不限于商业性或盈利组织';
                $enterprise->ent_location ='深圳';
                $enterprise->ent_city=1;
                $enterprise->ent_status =1;
                $enterprise->ent_chief = '李总';
                $enterprise->ent_create_time = time();
                $enterprise->ent_chief_postion = rand(1,5);
                $enterprise->ent_business_scope = '网络，安全，建站';
                $enterprise->ent_registered_capital = 500;
                $enterprise->ent_recommend = 1;
                $enterprise->ent_logo= 1;
                $enterprise->ent_update_time = time();
                $enterprise->save();
            }
            break;
        }
    }  
}  
?>

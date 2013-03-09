<?php

class buildCommand extends CConsoleCommand{  
    public function run($args){  

        switch ($args[0])
        {
        case 'summary':

            $year = array(2012,2011,2013);
            $month = array(1,2,3,4,5,6,7,8,9,10,11,12);
            $day   = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29);
            $area = arraY(6,16,27);
            $mu_product = array(31,32,57,73,77,78,80,81,82,83,84,85,86.87,88,89);
            for($i=0;$i<1000;$i++)
            {
               $smp = new PriceSummary();
               $smp->sum_id    = $i+1;
               $smp->sum_unit  = 3;
               $smp->sum_price = rand(50, 100);
               $smp->sum_year = $year[array_rand($year)];
               $smp->sum_month = $month[array_rand($month)];
               $smp->sum_day  = $day[array_rand($day)];
               $smp->sum_product_type = $mu_product[array_rand($mu_product)];
               $smp->sum_product_zone = $area[array_rand($area)];
               $smp->sum_add_date = date("Y-m-d");
               $smp->save();
            }
            break;
        case 'knowledge':
            $title = array(
              ' 关于钼的一般常识 ',
              ' 钼钨氧化矿选矿工艺',
              ' 磨矿介质对钼精矿碳含量影响研究',
              ' 金堆城钼业公司选矿工艺现状分析',
              ' 钼铁的冶炼',
              ' 钼矿及其处理',
              ' 钼及其化合物的物理化学性质',
              ' 钼铁的牌号及其用途'
            );
            
            for($i=250;$i<450;$i++)           
            {
                $article = new Article();
                
                $article->art_id = $i+1;
                $article->art_title = trim($title[array_rand($title)]);
                $article->art_status=1;
                $article->art_content="　钼精矿市场：今日40-45%钼精矿主流报价1540-1570元/吨度附近，47%及以上品位1560-1580元/吨度，价格暂时持稳，行情仍有继续向上运行迹象。行情短期利好，之前部分商家场外观望，近期开始逐步参与市场。栾川某商家表示，前期矿商停产较多，贸易商多以低库存场外等待行情好转。虽然近期钼精矿价格开始有所好转，但是上调的步伐依然较慢。与成本相比，盈利空间较小。期待后期继续上行。
                    
                    　　钼铁市场：钼铁价格暂时保持平稳，市场主流报价10.7-11万元/吨（现款-承兑）。当前，在行情利好带动下，有商家报价呈现虚高状况，整体现款报价期间10.6-10.8万元/吨为主，承兑10.9-11.1万元/吨左右。市场需求尚无完全释放，高价成交偏少。月底部分钢厂招标会逐步启动，钼铁厂家有继续挺价迹象。从近期的钢厂招标来看，钢厂60钼铁的承兑招标价格10.4-10.6万元/吨较为常见，后期有提升空间。
                    
                    　　12月21日LME钼期货报价整体保持平稳，3月期钼报价25250/25750美元/吨；15月期钼报价25720/26720美元/吨，LME期钼持仓132手。今日简讯：明年贷款需求将相对旺盛，城镇化为信贷投放重点；中金：新型城镇化难以支持新一轮地产投资；意大利总理蒙蒂递交辞呈，大选或于明年2月举行。
                    
                    　　周初外盘钼市部分产品价格仍有上调迹象，欧洲钼铁、氧化钼等都有一定涨幅；美国市场稍显平稳，价格暂稳波动。其次，欧亚将钼氧化物进口关税从5%降至零，这有利增加外部市场对该产品的需求，降低钼铁合金的生产成本，提高外部市场行业竞争力。国内行情运行平稳，主要钼产品价格继续保持在相对高位。同时，市场部分商家报价仍有抬高迹象，加之年底逼近，后期钢厂招标或有新的改观。";
                $article->art_source="lizhili";
                $article->art_category_id = 20;
                $article->art_recommend = rand(0,1);
                $article->art_user_id = 1;
                $article->art_check_by = "lizhili";
                $article->art_tags = '钼,行情,美元';
                $article->art_post_date = date("Y-m-d");
                $article->art_modified_date = date('Y-m-d');
                $article->save();
            }
            break;
        case 'price':
            $title = array(
             '2012年1-12月份我国钼铁进口对比图',
             '2012年1-12月份我国钼铁出口对比图',
             '2012年1-12月国内氧化钼价格走势图',
             '2012年1-12月国内钼铁价格走势图',
             '2012年1-12月国际氧化钼价格走势图',
             '2012年1-12月国际钼铁价格走势图',
             '2012年12月国内氧化钼价格走势图',
             '2012年12月国内钼铁价格走势图',
             '2012年12月国际氧化钼价格走势图',
             '2012年12月国际钼铁价格走势图',
             '2011年4月份钼系产品月报告',
            );
            
            for($i=450;$i<600;$i++)           
            {
                $article = new Article();
                
                $article->art_id = $i+1;
                $article->art_title = $title[array_rand($title)];
                $article->art_status=1;
                $article->art_content="　钼精矿市场：今日40-45%钼精矿主流报价1540-1570元/吨度附近，47%及以上品位1560-1580元/吨度，价格暂时持稳，行情仍有继续向上运行迹象。行情短期利好，之前部分商家场外观望，近期开始逐步参与市场。栾川某商家表示，前期矿商停产较多，贸易商多以低库存场外等待行情好转。虽然近期钼精矿价格开始有所好转，但是上调的步伐依然较慢。与成本相比，盈利空间较小。期待后期继续上行。
                    
                    　　钼铁市场：钼铁价格暂时保持平稳，市场主流报价10.7-11万元/吨（现款-承兑）。当前，在行情利好带动下，有商家报价呈现虚高状况，整体现款报价期间10.6-10.8万元/吨为主，承兑10.9-11.1万元/吨左右。市场需求尚无完全释放，高价成交偏少。月底部分钢厂招标会逐步启动，钼铁厂家有继续挺价迹象。从近期的钢厂招标来看，钢厂60钼铁的承兑招标价格10.4-10.6万元/吨较为常见，后期有提升空间。
                    
                    　　12月21日LME钼期货报价整体保持平稳，3月期钼报价25250/25750美元/吨；15月期钼报价25720/26720美元/吨，LME期钼持仓132手。今日简讯：明年贷款需求将相对旺盛，城镇化为信贷投放重点；中金：新型城镇化难以支持新一轮地产投资；意大利总理蒙蒂递交辞呈，大选或于明年2月举行。
                    
                    　　周初外盘钼市部分产品价格仍有上调迹象，欧洲钼铁、氧化钼等都有一定涨幅；美国市场稍显平稳，价格暂稳波动。其次，欧亚将钼氧化物进口关税从5%降至零，这有利增加外部市场对该产品的需求，降低钼铁合金的生产成本，提高外部市场行业竞争力。国内行情运行平稳，主要钼产品价格继续保持在相对高位。同时，市场部分商家报价仍有抬高迹象，加之年底逼近，后期钢厂招标或有新的改观。";
                $article->art_source="lizhili";
                $article->art_category_id = 16;
                $article->art_recommend = rand(0,1);
                $article->art_user_id = 1;
                $article->art_check_by = "lizhili";
                $article->art_tags = '钼,行情,美元';
                $article->art_post_date = date("Y-m-d");
                $article->art_modified_date = date('Y-m-d');
                $article->save();
            }
            break;
        case 'article':
            $title = array(
             '  2013年固定资产投资预计增8万亿 多省GDP预增1',
             '  我国确定今年工业节能减排目标',
             '  武钢预计今年减税7300万',
             '  钼股份荣获“陕西省质量信用等级A级企业”称',
             '  乌海三美国际矿业高管拜访中信锦州公司',
             '  近期钢厂钼铁招标汇总（920吨/6家）',
             '  辽宁发生5.1级地震 当地矿企未受影响',
             '  铁路货运提价或上半年推出 提价一分约增收200',
             '  宝钢提前大幅上调3月份钢价',
             '  2012国内粗钢产量7.17亿吨 钢铁转向低速增长',
             '  2012年全国粗钢产量同比增长3.1%',
             '  2012年12月全国进口铁合金分国别统计',
             '  2012年12月全国进口铁合金分关别统计',
             '  2012年我国新增铁、锰、镍、钨、钼矿资源储量',
             '  有色金属行业:钓鱼岛争端升温,战争金属上火,',
            );
            for($i=600;$i<650;$i++)
            {
                $article = new Article();
                $article->art_id = $i+1;
                $article->art_title = $title[array_rand($title)];
                $article->art_status=1;
                $article->art_content="中新网1月30日电 随着春节逐渐临近，每年唯一的烟花爆竹销售燃放季即将开始，这对原本已经屡屡爆表的空气质量无异于雪上加霜。根据媒体报道，2012年除夕夜北京PM2.5数据在短短几小时内暴增80倍，市民开始对是否燃放烟花爆竹进行反思，相对应的，却是节能减排相应政策法规对烟花爆竹燃放监管的缺失。

                   北京雾霾又来侵袭，多日不见阳光，空气中弥散着烟灰的味道，看不见摸不着的PM2.5让人心生恐慌，新一轮口罩采购潮涌起。上一次雾霾的消散基本靠“吹”，而本轮还只能依靠冷空气吗？

                   北京2013年春节烟花爆竹将于2月5日也就是腊月二十五正式开卖，现在烟花鞭炮公司已经开始向各个销售网点配送烟花。10天后，大量烟花爆竹将在城市、乡村的各个角落中升腾、炸响。已经不堪重负的北京空气恐将愈加不堪。";

                $article->art_source="lizhili";
                $article->art_category_id = 21;
                #$article->art_category_id = 17;
                $article->art_recommend = rand(0,1);
                $article->art_user_id = 1;
                $article->art_check_by = "lizhili";
                $article->art_tags = '钼';
                $article->art_post_date = date("Y-m-d");
                $article->art_modified_date = date('Y-m-d');
                $article->save();
            }
            break;
        case 'supply':
            $title = array(
             '钼铁钼棒回收钼片钼块回收钼渣回收上海钼丝废钼回收',
             '深圳废钼条回收',
             '采购钼丝，钼针，钼板，钼铁',
             '我公司长期大量求购废钼丝',
             '保密现金回收钼铁',
             '求购废钼催化剂',
             '采购钼丝，钼针，钼板，钼铁',
             '长期供应钼铁',
             '长期出售钼酸铵',
             '长期供应钼铁60%',
             '长期供应钼铁60%，欢迎来电',
             '供应钼铁',
             '长期钼铁出售',
            );
            $city = array(3,4,6);
            for($i=30;$i<200;$i++)
            {
                $supply = new Supply();
                $supply->supply_id = $i+1;
                $supply->supply_user_id = 1;
                $supply->supply_type=rand(18,19);
                $supply->supply_keyword="钼铁，钼矿";
                $supply->supply_category_id = rand(21,22);
                $supply->supply_contractor = '李先生';
                $supply->supply_content= trim($title[array_rand($title)]);
                $supply->supply_name= trim($title[array_rand($title)]);
                $supply->supply_address= "深圳龙华大浪石光工业区";
                $supply->supply_city_id = $city[array_rand($city)];
                $supply->supply_status = 1;
                $supply->supply_phone= '18666666';
                $supply->supply_price = rand(10,1000);
                $supply->supply_valid_date = time();
                $supply->supply_check_by = 1;
                $supply->supply_recommend = 1;
                $supply->supply_unit = '吨';
                $supply->save();
            }
            break;
        case 'product':
            $title = array(
               '钼片',
               '钼靶材',
               'TZM',
               '工业炉用钼制品',
               '钼杆/钼棒',
               '钼丝',
               '钼板',
               '银靶，锡靶，钼靶，钼靶，钽靶，钨靶，铌靶',
               '供应三氧化钼',
               'C-276万能的抗腐蚀镍-铬-钼合金',
               '钛,钛合金钨钼等稀有金属',
               '钛,钛合金钨钼等稀有金属',
               '钼丝网',
               '钼粉/纳米钼粉',
               '钨粉，钨条，钨铁，钨钼合金粉，钨锭',
               '废钼回收',
               '钼网',
               '钼丝网',
               '钛丝网除沫器',
               '钼网',
               '钼粉,电解钼粉,金属钼粉,纳米钼粉,纳米碳化钼粉',
               '钼盒',
               '钼板',
               '进口金属钼、钼棒、钼带、钼粉、钼条、钼合金',
               '钼坩埚',
            );
            $city = array(3,4,6);
            for($i=1;$i<200;$i++)
            {
                $product = new product();
                $product->product_id = $i;
                $product->product_user_id = 1;
                $product->product_keyword="钼铁，钼矿";
                $product->product_type_id= rand(21,22);
                $product->product_name = $title[array_rand($title)];
                $product->product_unit = 11;
                $product->product_quanity = rand(100,1000);
                $product->product_location= "深圳龙华大浪石光工业区";
                $product->product_city_id = $city[array_rand($city)];
                $product->product_status = 1;
                $product->product_price = rand(10,1000);
                $product->product_special= rand(0,1);
                $product->product_join_date = time();
                $product->product_image_src = 'http://www.zhuzao.com/UploadFile/Baikeuppic/1230873708.jpg';
                $product->save();
            }
            break;
        case 'case':
            $status = array(1,2,20);
            for($i=1;$i<100;$i++)
            {
                $succCase = new SuccessCase();
                $succCase->case_id = $i;
                $succCase->supply_id = rand(31,100);
                $succCase->purchase_user_id=rand(1,99);
                $succCase->purchase_amount= rand(10,$i*100);
                $succCase->create_time = date("Y-m-d");
                $succCase->case_status =$status[array_rand($status)];
                $succCase->case_recommend =rand(0,1);
                $succCase->save();
            }
            break;
        case 'user':
            $user = new User();
            $user->user_id = 1;
            $user->user_name = 'ueelife';
            $user->user_pwd  = md5('123456');
            $user->user_status =1;
            $user->save();
            for($i=1;$i<100;$i++)
            {
                $user = new User();
                $user->user_id = $i+1;
                $user->user_name = 'ueelife'.$i;
                $user->user_pwd  = md5('123456');
                $user->user_status =1;
                $user->save();
            }
            break;
        case 'enterprise':
            $title = array(
             '洛阳栾川钼业集团股份有限公司销售公司(钼生产型企业)',
             '遵义县世纪有色金属有限责任公司(钼生产型企业)',
             '昆明昊泰钼化有限公司(钼生产型/贸易型企业)',
             '朝阳金达钼业有限责任公司(钼生产型/贸易型企业)',
             '广汉市天九金属材料有限公司(钼生产型企业)',
             '黑龙江鸡东县金场沟矿业开发有限责任公司(钼生产型/贸易型企业)',
             '广汉国宏冶金炉料有限责任公司(钼生产型/贸易型企业)',
             '栾川县振江工贸矿业有限公司(钼生产型企业)',
             '建水县鹏建矿业有限公司(钼生产型企业)',
             '宝钢资源有限公司(钼贸易型企业)',
             '镇江市金广铁合金有限公司(钼贸易型企业)',
             '常州苏南铁合金有限公司(钼生产型企业)',
             '浙江钱塘控股集团(钼生产型企业)',
             '英国五金太平洋有限公司广州办事处(钼贸易型企业)',
             '厦门虹鹭钨钼工业有限公司(钼生产型/贸易型企业)',
             '深圳优意生活科技有限公司',
            );
            $city = array(3,4,6);
            for($i=101; $i<150; $i++)
            {
                $key = array_rand($title);

                $enterprise = new Enterprise();
                $enterprise->ent_id= $i;
                $enterprise->ent_user_id= rand(1,100);
                $enterprise->ent_name = trim($title[$key]);
                $enterprise->ent_type =rand(4,5);
                $enterprise->ent_website = 'http://www.mushw.com';
                $enterprise->ent_business_model = rand(6,7);
                $enterprise->ent_zipcode ='51800';
                $enterprise->ent_introduce ='企业是从事生产、流通、服务等经济活动，以生产或服务满足社会需要，实行自主经营、独立核算、依法设立的一种盈利性的经济组织。企业主要指独立的盈利性组织。在中国计划经济时期，“企业”是与“事业单位”平行使用的常用词语。《辞海》1979年版中，“企业”的解释为：“从事生产、流通或服务活动的独立核算经济单位”；“事业单位”的解释为：“受国家机关领导，不实行经济核算的单位”。在20世纪后期中国大陆改革开放与现代化建设及信息技术领域新概念大量涌入的背景下，“企业”一词的用法有所变化，并不限于商业性或盈利组织';
                $enterprise->ent_location ='深圳';
                $enterprise->ent_city=$city[array_rand($city)];
                $enterprise->ent_status =rand(1,2);
                $enterprise->ent_chief = '李总';
                $enterprise->ent_create_time = date("Y-m-d");
                $enterprise->ent_chief_postion = 8;
                $enterprise->ent_business_scope = '网络，安全，建站';
                $enterprise->ent_registered_capital = 500;
                $enterprise->ent_recommend = 1;
                $enterprise->ent_logo= 'image';
                $enterprise->ent_update_time = date("Y-m-d");
                $enterprise->ent_check_by = 'lizhili';
                $enterprise->save();
            }
            break;
        case 'test':
            $connection = Yii::app()->db;
            $sql = 'select ent_name,ent_id,purchase_amount,supply_unit from mu_success_case sc,mu_user_enterprise ent,mu_supply sup
                where sc.supply_id=sup.supply_id and sc.purchase_user_id=ent.ent_user_id';
            $user = $connection->createCommand($sql)->queryAll();
#                ->select('ent_name,ent_id,purchase_amount,supply_unit')
#                ->from('mu_success_case sc,mu_user_enterprise ent,mu_supply sup')
#                ->where('sc.supply_id=sup.supply_id and sc.purchase_user_id=ent.ent_user_id')
#                ->queryRow();
var_export($user);
            break;
        }
    }  
}  
?>

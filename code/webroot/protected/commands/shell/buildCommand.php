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
            
            for($i=1000;$i<1200;$i++)           
            {
                $article = new Article();
                
                $article->art_id = $i+1;
                $article->art_title = trim($title[array_rand($title)]);
                $article->art_status=1;
                $article->art_click_count=0;
                $article->art_content="　钼精矿市场：今日40-45%钼精矿主流报价1540-1570元/吨度附近，47%及以上品位1560-1580元/吨度，价格暂时持稳，行情仍有继续向上运行迹象。行情短期利好，之前部分商家场外观望，近期开始逐步参与市场。栾川某商家表示，前期矿商停产较多，贸易商多以低库存场外等待行情好转。虽然近期钼精矿价格开始有所好转，但是上调的步伐依然较慢。与成本相比，盈利空间较小。期待后期继续上行。
                    
                    　　钼铁市场：钼铁价格暂时保持平稳，市场主流报价10.7-11万元/吨（现款-承兑）。当前，在行情利好带动下，有商家报价呈现虚高状况，整体现款报价期间10.6-10.8万元/吨为主，承兑10.9-11.1万元/吨左右。市场需求尚无完全释放，高价成交偏少。月底部分钢厂招标会逐步启动，钼铁厂家有继续挺价迹象。从近期的钢厂招标来看，钢厂60钼铁的承兑招标价格10.4-10.6万元/吨较为常见，后期有提升空间。
                    
                    　　12月21日LME钼期货报价整体保持平稳，3月期钼报价25250/25750美元/吨；15月期钼报价25720/26720美元/吨，LME期钼持仓132手。今日简讯：明年贷款需求将相对旺盛，城镇化为信贷投放重点；中金：新型城镇化难以支持新一轮地产投资；意大利总理蒙蒂递交辞呈，大选或于明年2月举行。
                    
                    　　周初外盘钼市部分产品价格仍有上调迹象，欧洲钼铁、氧化钼等都有一定涨幅；美国市场稍显平稳，价格暂稳波动。其次，欧亚将钼氧化物进口关税从5%降至零，这有利增加外部市场对该产品的需求，降低钼铁合金的生产成本，提高外部市场行业竞争力。国内行情运行平稳，主要钼产品价格继续保持在相对高位。同时，市场部分商家报价仍有抬高迹象，加之年底逼近，后期钢厂招标或有新的改观。";
                $article->art_source="lizhili";
                $article->art_category_id = 20;
                $article->art_subcategory_id = rand(63,68);
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

            $category= array(36,37,58,59,60,61,62,101);
            
            for($i=850;$i<1000;$i++)           
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
                $article->art_subcategory_id = $category[array_rand($category)];
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
            for($i=650;$i<900;$i++)
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
        case 'product_info':
        	$products=Product::model()->findAll('product_status=1');
        	if($products)
        	{
        		$prodeses=array('<p><span style="font-family:黑体;font-size:x-large;"><strong>我公司长期生产经销60钼铁，销售公司地处全国最大铁合金集散地—清河县，价格透明，诚信交易。为更好服务广大客户，公司长期存货200吨，现货交易，无需等待。</strong></span></p><p><span style="font-family:黑体;font-size:x-large;"><strong>&nbsp;&nbsp; 特别说明，本公司销售钼铁不掺假，含量绝对60%以上，硫磷等杂质含量极低，都能达到国际标准。</strong></span></p><p><strong><span style="font-family:黑体;font-size:x-large;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本报价为无税价格，有需要的朋友可电话联系或者直接上门看货取样化验。</span></strong></p><p><strong><span style="font-family:黑体;font-size:x-large;"><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i04.c.aliimg.com/img/ibank/2011/883/966/301669388_254261721.jpg" /><br class="img-brk" /><br class="img-brk" />?</span></strong></p><p><strong><span style="font-family:黑体;font-size:x-large;">&nbsp;<img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2011/795/385/250583597_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2011/015/385/250583510_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i00.c.aliimg.com/img/ibank/2011/663/880/280088366_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i01.c.aliimg.com/img/ibank/2011/493/385/250583394_254261721.jpg" /></span></strong><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2010/858/426/178624858_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i05.c.aliimg.com/img/ibank/2010/548/426/178624845_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i01.c.aliimg.com/img/ibank/2010/828/426/178624828_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i05.c.aliimg.com/img/ibank/2010/808/426/178624808_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2010/387/426/178624783_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2010/967/426/178624769_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i01.c.aliimg.com/img/ibank/2010/747/426/178624747_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i01.c.aliimg.com/img/ibank/2010/237/426/178624732_254261721.jpg" /></p>',
        		'<p><span style="font-size:large;"><span style="font-size:large;"></span></span></p><p><span style="font-size:medium;"><strong><img style="visibility: visible;" alt="" src="http://i04.c.aliimg.com/img/ibank/2012/022/890/566098220_975931419.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i02.c.aliimg.com/img/ibank/2012/763/801/492108367_975931419.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i00.c.aliimg.com/img/ibank/2013/560/002/774200065_975931419.jpg" /><br class="img-brk" /><br class="img-brk" />钼铁介绍</strong></span></p><p><span style="font-size:medium;">钼
和铁组成的铁合金，一般含钼50～60%，用作炼钢的合金添加剂。 
钼铁1是钼与铁的合金。它的主要用途是在炼钢中作为钼元素的加入剂。钢中加入钼可使钢具有均匀的细晶组织，并提高钢的淬透性，有利于消除回火脆性。在高速
钢中，钼可代替一部分钨。钼同其他合金元素配合在一起广泛地应用于生产不锈钢、耐 
热钢、耐酸钢和工具钢，以及具有特殊物理性能的合金。钼加于铸铁里可增大其强度和耐磨性。</span></p><p><img style="visibility: visible; width: 750px; height: 250px;" alt="" src="http://i02.c.aliimg.com/img/ibank/2013/997/481/774184799_975931419.jpg" /></p><div class="album-links links-layout"><h3 class="headline-2"><a name="3_4"></a><a name="sub771417_3_4"></a><span class="headline-content">冶炼方法</span></h3><div class="para"><span style="font-size:medium;">&nbsp;&nbsp; 冶炼钼铁的原料主要为辉钼矿(MoS2)。冶炼前通常把</span><a href="http://detail.china.alibaba.com/offer/1232605675.html?spm=b26110380.2165030.0.224#" target="_blank"><span style="font-size:medium;color:#136ec2;">钼精矿</span></a><span style="font-size:medium;">用多膛炉进行氧化焙烧，获得含硫小于0.07%的焙烧钼矿。钼铁<sup><span style="color:#3366cc;">[2]</span></sup></span><a name="ref_[2]_771417"></a><span style="font-size:medium;">冶炼一般采用炉外法。炉子是一个放置在砂基上的圆筒，内砌粘土砖衬，用含硅75%的</span><a href="http://detail.china.alibaba.com/offer/1232605675.html?spm=b26110380.2165030.0.224#" target="_blank"><span style="font-size:medium;color:#136ec2;">硅铁</span></a><span style="font-size:medium;">和
少量铝粒作还原剂。炉料一次加入炉筒后，用上部点火法冶炼。在料面上用引发剂(硝石、铝屑或镁屑)，点火后即激烈反应，然后镇静、放渣、拆除炉筒。钼铁锭
先在砂窝中冷却，再送冷却间冲水冷却，最后进行破碎，精整。金属回收率为92～99%。在炼钢工业中近年广泛采用氧化钼压块代替钼铁。</span></div><div class="para"><span style="font-size:medium;">钼铁通常采用金属热法熔炼。钼铁是法定检验商品。主要产地有吉林、河北、江苏、河南、辽宁等，主要输往美国、荷兰、德国等</span>。<h3 class="headline-2"><a name="3_6"></a><a name="sub771417_3_6"></a><span class="headline-content">物理状态</span></h3><div class="para">&nbsp;&nbsp;<span style="font-size:medium;">产品以块状交货，块度范围为10～150mm,10 10mm以下粒度不得超过该批总重的5%，允许少量块度在一个方向最大尺寸为180mm。</span></div><h3 class="headline-2"><a name="3_8"></a><a name="sub771417_3_8"></a>&nbsp;</h3><h3 class="headline-2"><span class="headline-content">包装、储运、标志和质量证明书</span></h3><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;">(1)产品采用铁桶包装，每桶净重100kg，如需方对包装有特殊要求，可由供需双方协商解决 。</span></div><div class="para"><span style="font-size:medium;">(2)包装后的产品应存放于库房内，发运时要用棚车，如露天存放或敞车发运时，须用苫布盖好，严防包件内渗水或混入杂物。在储运过程中不得混批混号。</span></div><div class="para"><span style="font-size:medium;">(3)产品包装件上应涂有明显标志，包装件内应附有成品标签，标志和标签的内容应符合GB/ T3650—95的要求。</span></div><div class="para"><span style="font-size:medium;">(4)发货同时，供方应开据产品质量证明书，证明书内容应符合GB/T3650—95的要求。</span></div><div class="para">&nbsp;</div><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;"><strong>注意事项</strong></span></div><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;">&nbsp;&nbsp; 符合标准要求的合金具有微晶组织，断面无光泽。合金断面若有光亮的“小星点”时，表明硫含量较高。断面有光泽，“镜面闪光状”是合金中硅含量高的特征。</span></div><div class="para"><span style="font-size:medium;">该产品适用于炼钢中作为钼元素加八剂，是冶炼合金钢、工具钢、不锈钢、模具钢的添加剂，用于耐磨、耐热铸铁件生产中，广泛用于冶金建材、机械、地质等行业，并且是外贸口产品。炼铸方面技术人才较多集中在</span><a href="http://detail.china.alibaba.com/offer/1232605675.html?spm=b26110380.2165030.0.224#" target="_blank"><span style="font-size:medium;color:#136ec2;">钢铁英才网</span></a><span style="font-size:medium;">。</span></div><div class="para"><span style="font-size:medium;">包装、储运：产品采用铁桶包装和袋包装，每件为50KG、100KG两种，用户有特殊要求可双方商定储运保管要防水、防潮，供方可代办托运</span></div><div class="para"><span style="font-size:medium;">钼铁通常采用金属热法熔炼。钼铁是法定检验商品。主要产地有吉林、河北、江苏、河南、辽宁等，主要输往美国、荷兰、德国等。</span></div><div class="para"><span style="font-size:medium;">钼铁以块状交货，粒度规格：10~30mm，10~50mm，30~50mm。</span></div><div class="para"><span style="font-size:medium;">主要用于钢铁工业及特种领域。</span></div><div class="para"><span style="font-size:medium;">包装：铁桶装，每桶净重50kg，100kg和250kg，铅封桶盖。250kg铁桶的包装，每四桶固定于一木托盘上。</span></div><div class="para">&nbsp;</div><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;"><strong>&nbsp;&nbsp;
 
天津上嘉目铁合金有限公司现货供应60钼铁，价格透明，诚信交易。为更好服务广大客户，公司长期存货，现货交易，无需等待。"诚乃德之本、信乃商之根",
公司就是奉行"客户第一 
诚信为上"这个宗旨，赢得了广大客户的良好口碑，公司郑重承诺：无论订单大小，我们都一视同仁，真诚对待，力求提高客户的生产效率和资金周转率，确保在合
作关系建立后四天之内货物安全、快捷送达目的地。</strong></span></div></div></div>',
        		'<p>Na2M0O4.2H2O:&nbsp;&nbsp; 99.99%<br />MO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 39.8%<br />Fe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.001<br />As:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.003<br />Pb:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.002<br />PH:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8<br />PO4:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.004<br />NH4:&nbsp;&nbsp;&nbsp;&nbsp; 0.002<br />CL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.003<br />SO4:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.004<br />水不溶物：0.002<br />【产品适用范围】用于制造生物碱及其他物质的试剂，也用于染料、钼红颜料、催化剂、钼盐和耐晒色淀沉淀剂。是制造阻燃剂的原料和无公害型冷却水系统的金属腐蚀抑制剂，以及作为动植物必须的微量成分。</p><table style="WIDTH: 482px" border="1" cellpadding="0" cellspacing="0"><tbody><tr><td colspan="3" height="25" width="482">本公司长期批发零售以下产品：</td></tr><tr><td height="16">序号</td><td style="BORDER-LEFT: medium none">产品名称</td><td style="BORDER-LEFT: medium none">包装/KG</td></tr><tr><td rowspan="9" style="BORDER-TOP: medium none" height="144">1</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-10(德国汉姆)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(俄罗斯)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(韩国南韩)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(台湾盘亚)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(中日合成）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(德国汉堡）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">220</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(吉林吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">2</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-9（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-9（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-9（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-9（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">3</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-8（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-8（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-8（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-8（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">4</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂NP/TX/OP-7（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-7（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-7（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-7（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">5</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-6（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-6（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-6（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-6（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">6</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂NP/TX/OP-4（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-4（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-4（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-4（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="2" style="BORDER-TOP: medium none" height="32">7</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销枧油NP-8.6（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销枧油NP-8.6（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td rowspan="7" style="BORDER-TOP: medium none" height="112">8</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂AEO-9（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（泰国科宁）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（壳牌）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（吉林吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">190</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（日本丸善）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">190</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">205</td></tr><tr><td rowspan="5" style="BORDER-TOP: medium none" height="80">9</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销AEO-7（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（泰国科宁）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（壳牌）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td rowspan="5" style="BORDER-TOP: medium none" height="80">10</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销AEO3（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（泰国科宁）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（壳牌）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">185</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">11</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销三乙醇胺（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">232</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销三乙醇胺（巴斯夫）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销三乙醇胺（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销三乙醇胺（国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">12</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销丙二醇（进口/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-TOP: medium none" height="16">13</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乙二醇（进口/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">220</td></tr><tr><td style="BORDER-TOP: medium none" height="16">14</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二甘醇（进口/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">220</td></tr><tr><td style="BORDER-TOP: medium none" height="16">15</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG400（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">16</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG400（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">17</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG400（韩国南韩）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">18</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG600（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">19</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG600（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">20</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG600（韩国南韩）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">21</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG1000（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">227</td></tr><tr><td style="BORDER-TOP: medium none" height="16">22</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG1000（日本/南韩/台湾）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">23</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG2000（日本/南韩/台湾）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">24</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG4000（日本/南韩）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">25</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG6000（日本/南韩）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">26</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG10000（日本/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">27</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG20000（日本/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">28</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-12（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">29</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-15（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">30</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-40（吉林吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">31</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-40（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">32</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销渗透剂JFC（环保型）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">33</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销太古油/磺化蓖麻油/土耳其红油</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">34</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二乙醇酰胺6501（新加坡狮头）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">35</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二乙醇酰胺6501（椰子油/棕仁油）国产</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">36</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二乙醇酰胺6502</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">37</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销净洗剂6503</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">38</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销南京一厂/二厂磺酸</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td style="BORDER-TOP: medium none" height="16">39</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销AES（洁浪/吉利达/吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">110</td></tr><tr><td style="BORDER-TOP: medium none" height="16">40</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销精制植物油酸（西普/泸天化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">180</td></tr><tr><td style="BORDER-TOP: medium none" height="16">41</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销动物油酸（内蒙）1桶起订</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">180</td></tr><tr><td style="BORDER-TOP: medium none" height="16">42</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂司盘80（S-80）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">43</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂司盘60（S-60）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">44</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂土温80（T-80）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">45</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂土温60（T-60）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">46</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销甜菜碱（CAB-35/BS-12）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">47</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销1831（十八烷基三甲基氯化铵）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">48</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销1631（十六烷基三甲基氯化铵）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">49</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销十二烷基苯磺酸钠（液体）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">50</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销a-烯烃磺酸盐（AOS）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">51</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销三乙醇胺油酸皂（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">52</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销工业甘油</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">250</td></tr><tr><td style="BORDER-TOP: medium none" height="16">53</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销丙三醇甘油（皂化级/药用级）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">250</td></tr><tr><td style="BORDER-TOP: medium none" height="16">54</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销有机硅消泡剂（水性/油性）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">55</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销表面活性剂1227（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">125</td></tr><tr><td style="BORDER-TOP: medium none" height="16">56</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销快速渗透剂T（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">57</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销抗静电剂SN（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">125</td></tr><tr><td style="BORDER-TOP: medium none" height="16">58</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销三聚磷酸钠（贵州惠水）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">59</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销磷酸三钠（四川箭滩）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">60</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销纯碱（湖北双环）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">40</td></tr><tr><td style="BORDER-TOP: medium none" height="16">61</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销硼砂（辽宾/凤城）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">40</td></tr><tr><td style="BORDER-TOP: medium none" height="16">62</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销六偏磷酸钠（重庆川东）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">63</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销钼酸钠（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td colspan="3" height="16">由于价格变动频繁，欢迎致电李小姐13650896708资询当日价格</td></tr></tbody></table>',
        		);
        		$productImgs=array('78_1363284812_6515.jpg','89_1363284724_6427.jpg','83_1363284790_6493.jpg','57_1363284765_6468.jpg','72_1363284747_6450.jpg');
        		foreach ($products as $product)
        		{
        			$key = array_rand($prodeses);
        			$imgKey=array_rand($productImgs);
        			$product->product_content=$prodeses[$key];
        			$product->product_image_src=$productImgs[$imgKey];
        			$product->save();
        			
        		}
        		
        	}
        	echo 'update Successfully!';
        	break;
        case 'supply_info':
        	$supplies=Supply::model()->findAll('supply_status=1');
        	if($supplies)
        	{
        		$supplyeses=array('<p><span style="font-family:黑体;font-size:x-large;"><strong>我公司长期生产经销60钼铁，销售公司地处全国最大铁合金集散地—清河县，价格透明，诚信交易。为更好服务广大客户，公司长期存货200吨，现货交易，无需等待。</strong></span></p><p><span style="font-family:黑体;font-size:x-large;"><strong>&nbsp;&nbsp; 特别说明，本公司销售钼铁不掺假，含量绝对60%以上，硫磷等杂质含量极低，都能达到国际标准。</strong></span></p><p><strong><span style="font-family:黑体;font-size:x-large;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本报价为无税价格，有需要的朋友可电话联系或者直接上门看货取样化验。</span></strong></p><p><strong><span style="font-family:黑体;font-size:x-large;"><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i04.c.aliimg.com/img/ibank/2011/883/966/301669388_254261721.jpg" /><br class="img-brk" /><br class="img-brk" />?</span></strong></p><p><strong><span style="font-family:黑体;font-size:x-large;">&nbsp;<img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2011/795/385/250583597_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2011/015/385/250583510_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.199px;" alt="" src="http://i00.c.aliimg.com/img/ibank/2011/663/880/280088366_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i01.c.aliimg.com/img/ibank/2011/493/385/250583394_254261721.jpg" /></span></strong><br class="img-brk" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2010/858/426/178624858_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i05.c.aliimg.com/img/ibank/2010/548/426/178624845_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i01.c.aliimg.com/img/ibank/2010/828/426/178624828_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i05.c.aliimg.com/img/ibank/2010/808/426/178624808_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2010/387/426/178624783_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i03.c.aliimg.com/img/ibank/2010/967/426/178624769_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i01.c.aliimg.com/img/ibank/2010/747/426/178624747_254261721.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible; width: 750px; height: 502.441px;" alt="" src="http://i01.c.aliimg.com/img/ibank/2010/237/426/178624732_254261721.jpg" /></p>',
        		'<p><span style="font-size:large;"><span style="font-size:large;"></span></span></p><p><span style="font-size:medium;"><strong><img style="visibility: visible;" alt="" src="http://i04.c.aliimg.com/img/ibank/2012/022/890/566098220_975931419.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i02.c.aliimg.com/img/ibank/2012/763/801/492108367_975931419.jpg" /><br class="img-brk" /><br class="img-brk" /><img style="visibility: visible;" alt="" src="http://i00.c.aliimg.com/img/ibank/2013/560/002/774200065_975931419.jpg" /><br class="img-brk" /><br class="img-brk" />钼铁介绍</strong></span></p><p><span style="font-size:medium;">钼
和铁组成的铁合金，一般含钼50～60%，用作炼钢的合金添加剂。 
钼铁1是钼与铁的合金。它的主要用途是在炼钢中作为钼元素的加入剂。钢中加入钼可使钢具有均匀的细晶组织，并提高钢的淬透性，有利于消除回火脆性。在高速
钢中，钼可代替一部分钨。钼同其他合金元素配合在一起广泛地应用于生产不锈钢、耐 
热钢、耐酸钢和工具钢，以及具有特殊物理性能的合金。钼加于铸铁里可增大其强度和耐磨性。</span></p><p><img style="visibility: visible; width: 750px; height: 250px;" alt="" src="http://i02.c.aliimg.com/img/ibank/2013/997/481/774184799_975931419.jpg" /></p><div class="album-links links-layout"><h3 class="headline-2"><a name="3_4"></a><a name="sub771417_3_4"></a><span class="headline-content">冶炼方法</span></h3><div class="para"><span style="font-size:medium;">&nbsp;&nbsp; 冶炼钼铁的原料主要为辉钼矿(MoS2)。冶炼前通常把</span><a href="http://detail.china.alibaba.com/offer/1232605675.html?spm=b26110380.2165030.0.224#" target="_blank"><span style="font-size:medium;color:#136ec2;">钼精矿</span></a><span style="font-size:medium;">用多膛炉进行氧化焙烧，获得含硫小于0.07%的焙烧钼矿。钼铁<sup><span style="color:#3366cc;">[2]</span></sup></span><a name="ref_[2]_771417"></a><span style="font-size:medium;">冶炼一般采用炉外法。炉子是一个放置在砂基上的圆筒，内砌粘土砖衬，用含硅75%的</span><a href="http://detail.china.alibaba.com/offer/1232605675.html?spm=b26110380.2165030.0.224#" target="_blank"><span style="font-size:medium;color:#136ec2;">硅铁</span></a><span style="font-size:medium;">和
少量铝粒作还原剂。炉料一次加入炉筒后，用上部点火法冶炼。在料面上用引发剂(硝石、铝屑或镁屑)，点火后即激烈反应，然后镇静、放渣、拆除炉筒。钼铁锭
先在砂窝中冷却，再送冷却间冲水冷却，最后进行破碎，精整。金属回收率为92～99%。在炼钢工业中近年广泛采用氧化钼压块代替钼铁。</span></div><div class="para"><span style="font-size:medium;">钼铁通常采用金属热法熔炼。钼铁是法定检验商品。主要产地有吉林、河北、江苏、河南、辽宁等，主要输往美国、荷兰、德国等</span>。<h3 class="headline-2"><a name="3_6"></a><a name="sub771417_3_6"></a><span class="headline-content">物理状态</span></h3><div class="para">&nbsp;&nbsp;<span style="font-size:medium;">产品以块状交货，块度范围为10～150mm,10 10mm以下粒度不得超过该批总重的5%，允许少量块度在一个方向最大尺寸为180mm。</span></div><h3 class="headline-2"><a name="3_8"></a><a name="sub771417_3_8"></a>&nbsp;</h3><h3 class="headline-2"><span class="headline-content">包装、储运、标志和质量证明书</span></h3><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;">(1)产品采用铁桶包装，每桶净重100kg，如需方对包装有特殊要求，可由供需双方协商解决 。</span></div><div class="para"><span style="font-size:medium;">(2)包装后的产品应存放于库房内，发运时要用棚车，如露天存放或敞车发运时，须用苫布盖好，严防包件内渗水或混入杂物。在储运过程中不得混批混号。</span></div><div class="para"><span style="font-size:medium;">(3)产品包装件上应涂有明显标志，包装件内应附有成品标签，标志和标签的内容应符合GB/ T3650—95的要求。</span></div><div class="para"><span style="font-size:medium;">(4)发货同时，供方应开据产品质量证明书，证明书内容应符合GB/T3650—95的要求。</span></div><div class="para">&nbsp;</div><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;"><strong>注意事项</strong></span></div><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;">&nbsp;&nbsp; 符合标准要求的合金具有微晶组织，断面无光泽。合金断面若有光亮的“小星点”时，表明硫含量较高。断面有光泽，“镜面闪光状”是合金中硅含量高的特征。</span></div><div class="para"><span style="font-size:medium;">该产品适用于炼钢中作为钼元素加八剂，是冶炼合金钢、工具钢、不锈钢、模具钢的添加剂，用于耐磨、耐热铸铁件生产中，广泛用于冶金建材、机械、地质等行业，并且是外贸口产品。炼铸方面技术人才较多集中在</span><a href="http://detail.china.alibaba.com/offer/1232605675.html?spm=b26110380.2165030.0.224#" target="_blank"><span style="font-size:medium;color:#136ec2;">钢铁英才网</span></a><span style="font-size:medium;">。</span></div><div class="para"><span style="font-size:medium;">包装、储运：产品采用铁桶包装和袋包装，每件为50KG、100KG两种，用户有特殊要求可双方商定储运保管要防水、防潮，供方可代办托运</span></div><div class="para"><span style="font-size:medium;">钼铁通常采用金属热法熔炼。钼铁是法定检验商品。主要产地有吉林、河北、江苏、河南、辽宁等，主要输往美国、荷兰、德国等。</span></div><div class="para"><span style="font-size:medium;">钼铁以块状交货，粒度规格：10~30mm，10~50mm，30~50mm。</span></div><div class="para"><span style="font-size:medium;">主要用于钢铁工业及特种领域。</span></div><div class="para"><span style="font-size:medium;">包装：铁桶装，每桶净重50kg，100kg和250kg，铅封桶盖。250kg铁桶的包装，每四桶固定于一木托盘上。</span></div><div class="para">&nbsp;</div><div class="para">&nbsp;</div><div class="para"><span style="font-size:medium;"><strong>&nbsp;&nbsp;
 
天津上嘉目铁合金有限公司现货供应60钼铁，价格透明，诚信交易。为更好服务广大客户，公司长期存货，现货交易，无需等待。"诚乃德之本、信乃商之根",
公司就是奉行"客户第一 
诚信为上"这个宗旨，赢得了广大客户的良好口碑，公司郑重承诺：无论订单大小，我们都一视同仁，真诚对待，力求提高客户的生产效率和资金周转率，确保在合
作关系建立后四天之内货物安全、快捷送达目的地。</strong></span></div></div></div>',
        		'<p>Na2M0O4.2H2O:&nbsp;&nbsp; 99.99%<br />MO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 39.8%<br />Fe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.001<br />As:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.003<br />Pb:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.002<br />PH:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8<br />PO4:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.004<br />NH4:&nbsp;&nbsp;&nbsp;&nbsp; 0.002<br />CL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.003<br />SO4:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.004<br />水不溶物：0.002<br />【产品适用范围】用于制造生物碱及其他物质的试剂，也用于染料、钼红颜料、催化剂、钼盐和耐晒色淀沉淀剂。是制造阻燃剂的原料和无公害型冷却水系统的金属腐蚀抑制剂，以及作为动植物必须的微量成分。</p><table style="WIDTH: 482px" border="1" cellpadding="0" cellspacing="0"><tbody><tr><td colspan="3" height="25" width="482">本公司长期批发零售以下产品：</td></tr><tr><td height="16">序号</td><td style="BORDER-LEFT: medium none">产品名称</td><td style="BORDER-LEFT: medium none">包装/KG</td></tr><tr><td rowspan="9" style="BORDER-TOP: medium none" height="144">1</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-10(德国汉姆)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(俄罗斯)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(韩国南韩)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(台湾盘亚)原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(中日合成）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(德国汉堡）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">220</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(吉林吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-10(国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">2</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-9（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-9（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-9（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-9（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">3</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-8（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-8（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-8（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-8（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">4</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂NP/TX/OP-7（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-7（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-7（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-7（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">5</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂TX/NP/OP-6（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-6（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-6（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂TX/NP/OP-6（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">6</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂NP/TX/OP-4（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-4（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-4（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂NP/TX/OP-4（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td rowspan="2" style="BORDER-TOP: medium none" height="32">7</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销枧油NP-8.6（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销枧油NP-8.6（德国汉姆）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td rowspan="7" style="BORDER-TOP: medium none" height="112">8</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂AEO-9（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（泰国科宁）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（壳牌）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（吉林吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">190</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（日本丸善）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">190</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销乳化剂AEO-9（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">205</td></tr><tr><td rowspan="5" style="BORDER-TOP: medium none" height="80">9</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销AEO-7（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（泰国科宁）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（壳牌）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO-7（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td rowspan="5" style="BORDER-TOP: medium none" height="80">10</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销AEO3（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（泰国科宁）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（壳牌）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">185</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销AEO3（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td rowspan="4" style="BORDER-TOP: medium none" height="64">11</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销三乙醇胺（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">232</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销三乙醇胺（巴斯夫）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销三乙醇胺（台湾东联）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none" height="16">厂价直销三乙醇胺（国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">12</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销丙二醇（进口/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">215</td></tr><tr><td style="BORDER-TOP: medium none" height="16">13</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乙二醇（进口/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">220</td></tr><tr><td style="BORDER-TOP: medium none" height="16">14</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二甘醇（进口/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">220</td></tr><tr><td style="BORDER-TOP: medium none" height="16">15</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG400（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">16</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG400（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">17</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG400（韩国南韩）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">18</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG600（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">19</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG600（俄罗斯）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">20</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG600（韩国南韩）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">230</td></tr><tr><td style="BORDER-TOP: medium none" height="16">21</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG1000（美国陶氏）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">227</td></tr><tr><td style="BORDER-TOP: medium none" height="16">22</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG1000（日本/南韩/台湾）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">23</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG2000（日本/南韩/台湾）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">24</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG4000（日本/南韩）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">25</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG6000（日本/南韩）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">26</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG10000（日本/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">27</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销聚乙二醇PEG20000（日本/国产）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">20/25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">28</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-12（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">29</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-15（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">30</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-40（吉林吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">31</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销NP-40（台湾盘亚）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">32</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销渗透剂JFC（环保型）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">33</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销太古油/磺化蓖麻油/土耳其红油</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">34</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二乙醇酰胺6501（新加坡狮头）原装进口</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">35</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二乙醇酰胺6501（椰子油/棕仁油）国产</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">36</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销二乙醇酰胺6502</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">37</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销净洗剂6503</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">38</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销南京一厂/二厂磺酸</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">210</td></tr><tr><td style="BORDER-TOP: medium none" height="16">39</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销AES（洁浪/吉利达/吉化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">110</td></tr><tr><td style="BORDER-TOP: medium none" height="16">40</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销精制植物油酸（西普/泸天化）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">180</td></tr><tr><td style="BORDER-TOP: medium none" height="16">41</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销动物油酸（内蒙）1桶起订</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">180</td></tr><tr><td style="BORDER-TOP: medium none" height="16">42</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂司盘80（S-80）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">43</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂司盘60（S-60）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">44</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂土温80（T-80）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">45</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销乳化剂土温60（T-60）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">46</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销甜菜碱（CAB-35/BS-12）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">47</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销1831（十八烷基三甲基氯化铵）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">48</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销1631（十六烷基三甲基氯化铵）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">49</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销十二烷基苯磺酸钠（液体）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">50</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销a-烯烃磺酸盐（AOS）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">51</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销三乙醇胺油酸皂（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">52</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销工业甘油</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">250</td></tr><tr><td style="BORDER-TOP: medium none" height="16">53</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销丙三醇甘油（皂化级/药用级）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">250</td></tr><tr><td style="BORDER-TOP: medium none" height="16">54</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销有机硅消泡剂（水性/油性）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">55</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销表面活性剂1227（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">125</td></tr><tr><td style="BORDER-TOP: medium none" height="16">56</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销快速渗透剂T（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">200</td></tr><tr><td style="BORDER-TOP: medium none" height="16">57</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销抗静电剂SN（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">125</td></tr><tr><td style="BORDER-TOP: medium none" height="16">58</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销三聚磷酸钠（贵州惠水）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">50</td></tr><tr><td style="BORDER-TOP: medium none" height="16">59</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销磷酸三钠（四川箭滩）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">60</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销纯碱（湖北双环）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">40</td></tr><tr><td style="BORDER-TOP: medium none" height="16">61</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销硼砂（辽宾/凤城）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">40</td></tr><tr><td style="BORDER-TOP: medium none" height="16">62</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销六偏磷酸钠（重庆川东）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td style="BORDER-TOP: medium none" height="16">63</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">厂价直销钼酸钠（1桶起订）</td><td style="BORDER-LEFT: medium none; BORDER-TOP: medium none">25</td></tr><tr><td colspan="3" height="16">由于价格变动频繁，欢迎致电李小姐13650896708资询当日价格</td></tr></tbody></table>',
        		);
        		foreach ($supplies as $supply)
        		{
        			$key = array_rand($supplyeses);
        			$supply->supply_content=$supplyeses[$key];
        			$supply->save();
        			
        		}
        		
        	}
        	echo 'update Successfully!';
        	break;
        }
    }  
}  
?>

<?php

class buildCommand extends CConsoleCommand{  
    public function run($args){  

        switch ($args[0])
        {
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

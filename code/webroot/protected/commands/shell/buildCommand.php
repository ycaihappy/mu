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
            break;
        case 'enterprise':
            break;
        }
    }  
}  
?>

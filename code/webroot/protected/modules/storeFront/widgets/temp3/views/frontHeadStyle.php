<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $company->ent_name?>-<?php echo $config['hometitle']?></title>
	<meta name="description" content="<?php echo $config['homedes']?>">
	<meta name="keywords" content="<?php echo $config['homekeyword']?>">
</head>
<style type="text/css">
#imageFlow{top:400px; width:620px; left:410px; background-color:#CCCCCC;}
* { margin:0; padding:0; }
img { border:0; }
th { text-align:right; }
ul, li { list-style:none; }
<?php if( $config['styleimg']!=''):?>
body {background-image: url(<{$shopconfig.styleimg}>);line-height:22px;}
<?php else:?>
body {BACKGROUND: url(<?php echo $imgurl ?>bodyBg.jpg) fixed repeat-x 50% top}
<?php endif;?>
body,td {font-size:12px; line-height:22px; }
body, div, input, select, textarea, td { font-family:Arial, Helvetica, sans-serif; }
img, input, select { vertical-align:middle }
ul, li {list-style:none;list-style-image:none;list-style-position:outside;list-style-type:none; margin:0px;}
a * { cursor:pointer; text-decoration:none;}
a:link, a:visited {color:#022e9f;}
a:hover {color:#d443a7;}

#top { background-image:url(<?php echo $imgurl ?>topBg.gif); background-repeat:repeat-x; height:24px; line-height:24px; font-size: 12px; border-bottom:1px solid #C4C4C4; border-top:1px solid #FFFFFF; padding-right:10px; padding-left:10px; clear:both; font-weight:bold; }
#top a { color:#022e9f }
#top a:hover { color:#E66D02 }

#header{background:#284B75 url(<?php echo $imgurl ?>top-banner.gif) repeat-x scroll center top;clear:both;height:147px;margin:auto;width:980px;}
.company_name h1{color:#FFFFFF; font-size:22px;}
.company_name span{color:#6C8AB5}
#name{ height:112px;<?php if($config['headimage']!=''): ?>background:#284B75 url(<?php echo $config['headimage'] ?>) scroll center top;<?php endif;?>}

#navmenu{background:url(<?php echo $imgurl ?>mainNavBg.gif) repeat-x;}
#nav{height:34px;line-height:34px;overflow:hidden;font-size:12px;margin-left:70px;font-weight: bold;}
#nav a {margin-left:1px;}
#nav a:link, #nav a:hover, #nav a:visited {cursor:pointer;display:block !important;display:inline;zoom:1; padding-right:15px;padding-left:15px;text-decoration:none;float:left;}
#nav a:link, #nav a:visited {color:#FFFFFF;background-repeat: no-repeat;background-position:right top;}
#nav a:hover {background-position:left top;color:#1a498e;background:url(<?php echo $imgurl ?>m_bg.gif);background-repeat:repeat-x;text-decoration:none;}
#nav .now:link, #nav .now:visited, #nav .now:hover {background-position:left top;color:#1a498e;background: url(<?php echo $imgurl ?>m_bg.gif);background-repeat:repeat-x;text-decoration:none;}


#main {display:block;zoom:1;overflow:hidden;width:980px;background-color:#31609d;background-position:left top;padding:0px;margin:auto;}
#main .tp {display:block;line-height:10px;background-color:#31609d;height:10px;}

#menu {width: 220px;float:left;font-size:12px;margin-right:10px}
#menu .tp { display:none; line-height:54px; height:54px; }
#menu .bt {display:none;}
#menu .item {zoom:1;font-weight:bold;color:#022E9F;display:block;overflow:hidden;background-image: url(<?php echo $imgurl ?>leftTitleBg.gif);background-repeat:repeat-x;background-position:left top;text-decoration: none; background-color: #2f5b9a;border-bottom:1px solid #163e7d;}
#menu .o a, #menu .o span, #menu .item a:hover, #menu .item a:hover span {color:#1a498e;background-color:#f8a829; background-image:url(<?php echo $imgurl ?>leftTitleBg.gif);background-repeat:repeat-x;background-position:left top;}
#menu .item span {display:block;padding:5px 25px 5px 25px;}
#menu div.now a, #menu div.now span {color:#1a498e;background-color:#f8a829;background-image:url(<?php echo $imgurl ?>leftTitleBg.gif) ;background-repeat:repeat-x;background-position:left top;}

#mPro {padding:0px;margin-top:0px;}
#mPro .now {padding:5px 25px 5px 25px;background-color:#ffffff;color:#1a498e;border-bottom:1px solid #295690;}
#mPro li{padding:5px 25px 5px 25px;background-color:#7e8c97;color:#eef2f7;border-bottom: 1px solid #295690; margin:0px;}
#mPro li a:hover {padding:5px 25px 5px 25px;background-color:#bfd7e3;color:#FF0000;border-bottom:1px solid #b2a47f; margin:0px;}
#mPro div.r {margin:0px;padding:5px;background-color:#7e8c97;}
#mPro div.r a:link, #mPro div.r a:visited {color:#eef2f7;}
#mPro div.r li a:link, #mPro div.r li a:visited {background-image:none;}
#mPro #moreCat {border:1px solid #295690;width:170px;margin-left:215px;>margin-left:0px;margin-top:-15px; margin-top:5px;padding: 0px;}

#menu { line-height:1.3 }
#mPro div.r { padding-right:10px; padding-top:5px; }
#mPro div.r a:link, #mPro div.r a:visited { text-decoration:underline; }
#mPro ul li a:link, #mPro ul li a:visited, div.r #moreCat a:link, div.r #moreCat a:visited { text-decoration:none; display:block }
#mPro .now { font-weight:bold; }
#mPro #moreCat { position:absolute; padding:10px; text-align: left; }
#mPro #moreCat ul li { padding-bottom:5px; padding-top:5px; }
#content {float:right;width:745px;}
#bottom {background-color:#F5F5F5;border-top:1px solid #999999;text-align:right;margin:auto; width:980px;}
#supply,#news{ width:368px; float:left;}
.clear{ clear:both;}
.guide_ba img{ float:right; margin-right:5px;}
.common_box{ width:100%; margin-bottom:5px; background-color:#FFFFFF;}
.common_box table{border-collapse:collapse;}
.common_box td{border:1px solid #537AAD; padding:3px; text-align:left}
.guide_ba{background-image:url('<?php echo $imgurl ?>main_info_bg.gif'); font-weight:bold; color:#ffffff;text-align:left; padding:5px;};
.info_text{text-align:left}

.li_pro_list{ padding-top:0px!important; padding-top:5px; width:100%; height:90px; background-color:#FFFFFF;}
.li_pro_list li{width:85px; height:90px;float:left;}
.li_pro_list li img{width:82px; height:75px;padding:3px;}
.li_pro_list_img{width:85px; float:left}
.li_pro_list_con{float:right; width:620px;}
.pro_list_col{float:left;margin-left:7px;}
.pro_list_col img,.probox img{border:1px solid #CCCCCC; padding:1px; width:150px; height:150px;}
.com_intro{ background-color:#FFFFFF; text-indent:2em;}
.com_intro p{font-size:14px; margin-top:5px;}
.shop_pro_list{ padding-top:0px!important; padding-top:5px; width:100%; height:auto; background-color:#FFFFFF;}
.shop_pro_list li{width:95px;float:left;margin-left:10px;}
.shop_pro_list li img{width:92px; height:80px;padding:3px;}
.newoffer{padding-top:0px!important; padding-top:5px; width:100%;background-color:#FFFFFF;}
.newoffer li{width:100%; padding:3px;}
.content{margin:0px;background-image: url(<?php echo $imgurl ?>main_info_bg.jpg) ;background-repeat:repeat-x;background-position:left top;}
.com_contact{background-color:#FFFFFF;}
</style>
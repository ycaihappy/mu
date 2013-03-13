<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $company->ent_name?>-<?php echo $config['hometitle']?></title>
	<meta name="description" content="<?php echo $config['homedes']?>">
	<meta name="keywords" content="<?php echo $config['homekeyword']?>">
</head>
<style type="text/css">
#imageFlow{top:705px; width:620px; left:410px; background-color:#CCCCCC;}
* { margin:0; padding:0; }
img { border:0; }
th { text-align:right; }
ul, li { list-style:none; }

<?php if( $config['styleimg']!=''):?>
body {background-image: url(<?php echo $config['styleimg'] ?>);}

<?php else:?>
body {background-image:url(<?php echo $imgurl ?>pf_02.gif)}
<?php endif;?>

body,td { font-size:12px; line-height:22px; color:#FFF }
body, div, input, select, textarea, td { font-family:Verdana, Arial, Helvetica, sans-serif; }
img, input, select { vertical-align:middle }
ul, li {list-style:none;list-style-image:none;list-style-position:outside;list-style-type:none; margin:0px;}
a * { cursor:pointer; }
a:link, a:visited {color:#fff;text-decoration:none}
a:hover {color:#fff; text-decoration:underline}

#top { background-image:url(<?php echo $imgurl ?>top_bg.gif); background-repeat:repeat-x; height:24px; line-height:24px; font-size: 12px; border-bottom:1px solid #C4C4C4; border-top:1px solid #FFFFFF; padding-right:10px; padding-left:10px; clear:both; font-weight:bold;color:#022e9f  }
#top a { color:#022e9f }
#top a:hover { color:#E66D02 }

#header{/*background:#284B75 url(<{$imgurl}>header.jpg) repeat-x scroll center top;clear:both;*/height:147px;margin:auto;width:960px;}

<?php if($config['headimage']!=''): ?>
.company_name{background:#284B75 url(<?php echo $config['headimage'] ?>)scroll center top;}
<?php else:?>
.company_name{background:url(<?php echo $imgurl ?>pf_02.gif);}
<?php endif;?>


.company_name h1{color:#FFFFFF; height:32px; line-height:32px; font-size:22px;}
.company_name span{color:#6C8AB5}
#name{ height:112px;}

#nav {height:34px;line-height:34px;overflow:hidden;font-size:12px;/*margin-left:80px;*/font-weight: bold; background-image:url(<?php echo $imgurl ?>tf_08.jpg);}
#nav a {margin-left:1px; background:url(<?php echo $imgurl ?>pf_11.gif) no-repeat left 6px;}
#nav a:link, #nav a:hover, #nav a:visited {cursor:pointer;display:block !important;display:inline;zoom:1; padding-right:15px;padding-left:15px;text-decoration:none;float:left;}
#nav a:link, #nav a:visited {color:#FFF; width:65px; text-align:center;/*background-image:url(<{$imgurl}>navmenu.gif);background-repeat: no-repeat;background-position:right top;*/}
#nav a:hover {/*background-position:left top;color:#1a498e;background-image:url(<{$imgurl}>navmenu-o.gif);background-repeat:repeat-x;*/text-decoration:none;}
#nav .now:link, #nav .now:visited, #nav .now:hover {background-position:left top;color:#1a498e;background-image: url(<?php echo $imgurl ?>navmenu-o.gif);background-repeat:repeat-x;text-decoration:none;}


#main {display:block;zoom:1;overflow:hidden;width:960px;margin:auto;}
#main .tp {display:block;line-height:10px;height:10px;}

#menu {width: 220px;float:left;font-size:12px;margin-right:10px;}
#menu .tp { display:none; line-height:54px; height:54px; }
#menu .bt {display:none;}
.item span{font-weight:bold;}
#menu .item a {zoom:1;font-weight:bold;color:#FFF;display:block;overflow:hidden;/*background-image: url(<{$imgurl}>bg-item.gif);background-repeat:repeat-x;background-position:left top;text-decoration: none; background-color: #2f5b9a;border-bottom:1px solid #163e7d;*/}
#menu .o a, #menu .o span, #menu .item a:hover, #menu .item a:hover span {/*color:#1a498e;background-color:#f8a829; background-image:url(<{$imgurl}>bg-item-o.gif);background-repeat:repeat-x;background-position:left top;*/}
#menu .item span {display:block;padding:5px 25px 5px 25px; background:url(<?php echo $imgurl ?>pf_17.gif);}
#menu div.now a, #menu div.now span {color:#1a498e;background-color:#f8a829;background-image: url(<?php echo $imgurl ?>bg-item-o.gif);background-repeat:repeat-x;background-position:left top;}
#mPro {padding:0px;margin:0px; background:url("img/pf_51.gif") repeat-x scroll left bottom #474747;}
#mPro .now {padding:5px 25px 5px 25px;background-color:#feb747;color:#1a498e;border-bottom:1px solid #295690;}

#mPro li{margin:0;padding:4px 4px;}

#mPro li a:link, #mPro li a:visited {padding:5px 25px 5px 25px;/*background-color:#5486bd;*/color:#eef2f7;/*border-bottom: 1px solid #295690;*/ margin:0px; height:18px;}
#mPro li a:hover {color:#f9c500;text-decoration:underline;}
#mPro div.r {margin:0px;padding:5px;background-color:#5486BD;}
#mPro div.r a:link, #mPro div.r a:visited {color:#eef2f7;}
#mPro div.r li a:link, #mPro div.r li a:visited {background-image:none;}
#mPro #moreCat {border:1px solid #295690;width:170px;margin-left:215px;>margin-left:0px;margin-top:-15px; >margin-top:5px;padding: 0px;}

#menu { line-height:1.3; }
#mPro div.r { padding-right:10px; padding-top:5px; }
#mPro div.r a:link, #mPro div.r a:visited { /*text-decoration:underline;*/}
#mPro ul li a:link, #mPro ul li /*a:visited*/, div.r #moreCat a:link, div.r #moreCat /*a:visited*/ {display:block }
#mPro .now { font-weight:bold; }
#mPro #moreCat { position:absolute; padding:10px; text-align: left; }
#mPro #moreCat ul li { padding-bottom:5px; padding-top:5px; }
#content {float:right;width:730px; min-height:700px;}
#bottom {background:url(<?php echo $imgurl ?>pt-72.jpg); height:50px
padding-bottom:10px;padding-right:10px;padding-top:10px;text-align:right; width:950px; margin:auto; margin-top:10px}
#supply,#news{ width:360px; float:left;}
.clear{ clear:both;}
.guide_ba img{ float:right; margin-right:5px; margin-top:0px}
.guide_ba span {display:block;width:180px;float:left;}
.common_box{ width:100%; margin-bottom:5px; background:#3f3d3e}
.common_box table{border-collapse:collapse;}
.common_box td{/*border:1px solid #537AAD;*/ padding:5px; text-align:left; text-indent:10px; padding-left:10px;}
.guide_ba{background:url(<?php echo $imgurl ?>pt7.jpg) no-repeat; font-weight:bold; text-align:left; *padding:5px;}
.info_text{text-align:left;}
#nav #g_one {background:none;}

.li_pro_list{ padding-top:0px!important; padding-top:5px; width:100%; height:90px; }
.li_pro_list li{width:85px; height:90px;float:left;}
.li_pro_list li img{width:82px; height:75px;padding:3px;}
.li_pro_list_img{width:100px; float:left}
.li_pro_list_con{float:right; width:600px;}
.pro_list_col{float:left; margin-left:7px;}
.pro_list_col img,.probox img{border:1px solid #CCCCCC; padding:1px; width:150px; height:150px;}
.shop_pro_list{ padding-top:0px!important; padding-top:5px; width:100%; height:auto; }
.shop_pro_list li{width:95px;float:left;margin-left:10px;}
.shop_pro_list li img{width:92px; height:80px;padding:3px;}
.newoffer{padding-top:0px!important; padding-top:5px; width:100%;}
.newoffer li{width:100%; padding:3px;}
.exp{ background:url(<?php echo $imgurl ?>pf_51.gif)repeat-x scroll left bottom #474747;}

.com_intro{ text-indent:2em;}
.com_intro p{margin-top:5px;}
</style>
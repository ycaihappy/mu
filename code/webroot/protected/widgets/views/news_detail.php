
        <div class="m-article-detail">
			<div>
            <h1><?php echo $art_detail['art_title'];?></h1>
                  <div class="tit-bar clearfix">
					<div class="ll">
                    <span class="color-a-0"></span><span class="bor-tit"></span><span class="color-a-1" ><a target="_blank" href=""><?php echo $art_detail['art_source'];?></a></span><span class="infoMblog"><span class="color-a-2" bosszone="jgmblog"></span></span><span style="margin:0 8px;" class="color-a-3"><?php echo $art_detail['art_user_id'];?></span><span class="article-time"><?php echo $art_detail['art_post_date'];?></span><span class="bor-tit"></span></div>

					</div>
                 
                    <div class="line"></div>
                    <div class="content">
<?php echo $art_detail['art_content'];?>                      

                    </div>
                <!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<span class="bds_more">分享到：</span>
<a class="bds_qzone"></a>
<a class="bds_tsina"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
<a class="bds_t163"></a>
<a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
                </div>
		</div>

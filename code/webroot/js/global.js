$.extend(MU.mods,{
    body : function(){
		var self = $(this);			
			//MU.mods.lazyloadImage.call(self);
		$('div.m-tab-list,div.m-quot,div.m-case,div.m-nous,div.ui-m-tab,div.ui-m-tab2,div.m-new-hx').find('.hd span').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('span').index($(this));
			$(this).closest('.hd').siblings('.bd').find('>ul').eq(index).show().siblings('ul').hide();
		});
		
		$('.ui-purple-hd span').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('span').index($(this));
			$(this).closest('.ui-purple-hd').siblings('.bd').find('ul').eq(index).show().siblings('ul').hide();
		});
	},
	lazyloadImage : function(){
		$(this).find('img').lazyload({ effect: "fadeIn", threshold: 200, failurelimit: 20 });
		
	},
	JSearchForm : function () {
		var self = $(this);
		/*if($('#q').val() !=""){
			$(this).parent().addClass('search-status-focus');
		}
		$('#q').focusin(function(){
			$(this).parent().addClass('search-status-focus');
		}).focusout(function(){
			if ($(this).val() == "") {
				$(this).parent().removeClass('search-status-focus');
			}
		}).keydown(function(){
			$(this).parent().addClass('search-status-focus');
		});*/
		
		self.find('input[name=type]').val(self.find('.switchable-nav li.selected').data('type'));
		
		self.find('.switchable-nav li').click(function () {
			$(this).addClass('selected').siblings().removeClass('selected');
			self.find('input[name=type]').val($(this).data('type'));
		});
	},
	JNewTabList : function () {
		var self = $(this);
		/*self.find('.hd span').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('span').index($(this));
			$(this).closest('.hd').siblings('.bd').find('ul').eq(index).show().siblings().hide();
		});*/
	},
	JQkLogin : function () {
		var self = $(this),form = self.find('form');
		
		self.find('.btn-red').on('click',function(e){
			
			$.post(form.attr('action'),form.serializeArray(),function(re){
				if(re.status == 1){
					location.reload();
				}else{
					alert(re.msg);
				}
			},'json');
		});
	},
	JNav : function(){
		var self = $(this);
		self.find('.nav-con').on('mouseenter',function() {
			$(this).find('p').stop(false,true).fadeIn('fast');
			$(this).addClass('on').siblings().removeClass('on');
		}).mouseleave(function(){
			if(!self.hasClass('showed')){
				$(this).find('p').stop(false,true).fadeOut('fast');
			}
		});
		var pos = [0,0,50,50,100,0];
		self.find('.nav-con').each(function(i){
			var left = $(this).position().left,o = $(this);
			//$('<a>').css({display:'inline-block',width:pos[i]}).prependTo(o.find('p'));
			
		});
		
	},
	JIndexAd : function (){
		var self = $(this);
		var adroll = new MU.Tool.AdRoll({el:self,interval:4500});
	},
	JRcm : function () {
		var self = $(this);
		self.find('.scroll li').mouseenter(function(){
			$(this).addClass('on').siblings().removeClass('on');
		});
	},
	JLogin : function (){
		var self = $(this);
		self.find('.hd span').mouseover(function () {
			$(this).addClass('on').siblings().removeClass('on');
		});
	},
	JLeftPanel : function(){
		var self = $(this);
		self.find('h3').click(function(){
			var h3 = $(this);
			$(this).next().slideToggle('fast',function(){
				h3.toggleClass('on');
			});
		});
	},
	JNewsSlider : function (){
		var self = $(this),btns = self.find('.widget-slide-ctrl-nav'),btnhtml = [],el = self.find('.widget-slide-body'),padding = 0,pagesize = 1;
		
		var swim = new MU.Tool.Swimming({'el':el,'padding':padding,'count':pagesize});
		for(var i=1;i<=swim.pages;i++){
			btnhtml.push('<a href="javascript:;" class="'+(i==1 ? 'on' : '')+'">'+i+'</a>');
		}
		swim.onChange = function(i){
			btns.find('a').removeClass('on').eq(i).addClass('on');
		}
	
		btns.children().remove();
		btns.append(btnhtml.join(''));
		btns.delegate('a','mouseenter',function(e){
			e.preventDefault();
			var target = $(e.target);
			$(this).siblings().removeClass('on');
			target.addClass('on');
			swim.playPageIndex(btns.find('a').index(target));			
		});
	},
	JRegister : function () {
		var self = $(this),cname = self.find('.c-name');
		self.find('form').attr('autocomplete','off');
		/*window.onbeforeunload = function() { 
			return 'a';
		}*/
		self.find('.user-type').click(function () {
			if ( $(this).val() == 1) {
				self.find('.for-company').show();
				cname.text(cname.data('c-text'));
			}else{
				self.find('.for-company').hide();
				cname.text(cname.data('text'));
			}
		});
		
		self.find(':input[validate]').blur(function (){
			$.PValidate($(this));
		});
		
		
		self.find('.btn-reg').click(function(e){
			e.preventDefault();
			var cur = self.data('step'), o = $(this),isok = false;
			if(!$.PValidate(o.closest('form'))){
					return;
			}
			if( o.hasClass('act-one')) {
			
				
					 $.ajax({  
						type:"post",  
						url:o.data('api'),
						dataType:"json",
						async : false,
						data : o.closest('form').serializeArray(),
						success: function(re) { 
							self.find('.err-msg').remove();
							if(re.status == 0){
								for(var i in re.data){
									
									$(':input[name='+i+']').parent().append('<p class="err-msg">'+re.data[i]+'</p>');
								}
								isok = false;
							}else{
								isok = true;
							}
						},
						failure : function (){
							isok = false;
						}
					});				
				
				if(false === isok) return;
				self.find('.step-2').find('input[name=mobile_number]').val(self.find('.step-1').find('input[name=mobile_number]').val());
				
			}
			
			if( o.hasClass('save')) {
			
				 $.ajax({  
					type:"post", 
					url:o.data('api'),  
					dataType:"json",
					async : false,
					data : o.closest('form').serializeArray(),
					success: function(re) {  
						self.find('.err-msg').remove();
						if(re.status == 0){
							for(var i in re.data){		
								$(':input[name='+i+']').parent().append('<p class="err-msg">'+re.data[i]+'</p>');
							}
							isok = false;
						}else{
							isok = true;
						}
					},
					failure : function (){
						isok = false;
					}
				});
				if(false === isok) return;				
			}
			
			
			cur = $(this).hasClass('prev') ? 1 : cur + 1;
			self.data('step',cur);
			self.find('.flow li').removeClass('on').filter(':lt('+cur+')').addClass('on');			
			self.find('.step-' + cur).fadeIn().siblings('.steps').hide();
		});
		self.find('input[name=pwd]').keyup(function(){
			var strength = MU.Tool.wordStrength($(this).val()),pw = self.find('.pw-strength'),arr = ['weak','weak','medium','strong'];
			pw[0].className = pw[0].className.split(' ')[0] + ' pw-' + arr[strength];
		});
		
		var timer,t;
		
		self.find('.send-sms').click(function(){
			var o = $(this);
			$('.err-msg').remove();
			if(o.hasClass('disabled')) return;
				t = 10;
				o.addClass('disabled');
			$.getJSON(o.data('api') + '&mobile_number=' + o.prev('input[name=mobile_number]').val(),function(re){
				
				
				if(re.status == 0){
					for(var i in re.data){
						$(':input[name='+i+']').parent().append('<p class="err-msg">'+re.data[i]+'</p>');
					}
					o.text('发送验证码').removeClass('disabled');
					return;
				}
				timer = setInterval(function(){
					o.text(t-- + '秒后重发');
					if(t == 0) {
						o.text('发送验证码').removeClass('disabled');
						clearInterval(timer);
						
					}
				},1000);
			});
		});
		
		
	},
	JHqNews : function (){
		var self = $(this);
		
	},
	JHqBox : function(){
		var self = $(this);
		self.find('h2 a').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('a').index($(this));
			self.find('.fp-con ul').eq(index).show().siblings().hide();
		});

	},
	JShopSetting : function () {
		var self = $(this);
		self.find('.upload,.preview,.delete').on('click',function(){
			var o = $(this);
			switch(o.attr('class')){
				case 'upload':
				var width=o.data('width');
				var height=o.data('height');
				var html = '<div class="m-form uploader"><p><input type="file" name="file_upload" id="file_upload" /></p><p>宽度<input type="text" name="upload_width" value="'+width+'" />px 高度<input type="text" name="upload_height" value="'+height+'" />px</p><p><button class="btn">上传</button></p></div>';
				$(html).dialog({width:'auto',height:'auto',title:'图片上传',
				close : function(){
					$('#file_upload').uploadify('destroy');
					$(this).dialog('destroy');
					
				},
				create : function(){
					var dialog = $(this);
					$('#file_upload').uploadify({
						'buttonText' : '选择文件',
						'auto'     : false,
						'formData' : {
							
						},
						'onUploadStart' : function(file) {
							$("#file_upload").uploadify("settings", "formData",  {
							'upload_width' : $('.uploader').find('input[name=upload_width]').val(),
							'upload_height' : $('.uploader').find('input[name=upload_height]').val()
							});
						},
						'multi'    : false,
						'fileTypeExts' : '*.gif; *.jpg; *.png',
						'swf'      : 'css/uploadify.swf',
						'uploader' : self.find('form').data('upload-api'),

						 'onUploadSuccess' : function(file, data, response) {
							//alert('文件 ' + file.name + ' 上传成功！' + data);
							o.siblings('input').val(data);
							dialog.dialog('close');
							
						},
						'onUploadError' : function(file, errorCode, errorMsg, errorString) {
							alert('文件 ' + file.name + ' 上传失败！');
						}
						
					});
					$(this).find('.btn').on('click',function(){
						$('#file_upload').uploadify('upload');
					});
				}});
				
				
				break;
				case 'preview':
				if(o.siblings('input').val() != '' ) {
					$('<img />').attr('src',o.siblings('input').val()).load(function(){
						$(this).dialog({width:'auto',height:'auto',title:'Preview',
							close : function(){
								$(this).dialog('destroy');
							}
						});
					}).error(function(){alert('图片加载失败');});
				}
				break;
				case 'delete':
				o.siblings('input').val('');
				break;
			}
		});
	},
	JUserSuppy : function () {
		var self = $(this);
		var box  = {
			current : 1,
			total : 2,
			cid : 1,
			getBox : function(){
				return $('#pic_box').length > 0 ? $('#pic_box') : $('<div>').attr('id','pic_box').append('<div class="bd"></div><div class="ft"><div class="page"><a href="javascript:void(0);" class="prev">&lt;上一页</a><a href="javascript:void(0);" title="下一页" class="next">下一页&gt;</a></div></div>');
			},
			request : function(cid,page){				
				var box = this.getBox(),html = [],objbox = this;
				box.find('.bd').html('<img src="css/process-working.gif" />');
				
				$.getJSON(self.data('select-img-api') + '&category_id='+cid+'&page=' + page,function(re){
					if(re.imageCount == 0){
						html.push('<p>暂无数据</p>');
					}
					if(re.imageList){
						objbox.current = re.currentPage;
						objbox.total = re.pageCount;
						for(var i=0,len = re.imageList.length;i < len;i++){
							html.push('<li src="'+re.imageList[i].image_src+'"><img src="'+re.imageList[i].image_thumb_src+'" /><p>'+re.imageList[i].image_title+'</p></li>');
						}
					
					}
					box.find('.bd').html('<ul>' + html.join('') + '</ul>');
				});
			},
			showBox : function(cid){
				var box = this.getBox(),objbox = this;
				objbox.cid = cid;
				box.dialog({width:470,height:'auto',title:'选择图片',
				close : function(){	
					$(this).dialog('destroy');
					
				},
				create : function(){
					var dialog = $(this);	
					$(this).find('.page').on('click','a',function(){
						if($(this).hasClass('prev')){
							objbox.prevPage();
						}else{
							objbox.nextPage();
						}
					});
					$(this).find('.bd').on('click','li',function(){
						dialog.dialog('close');
						$('#image_src').val($(this).attr('src'));
						$('#image_thumb').attr('src',$(this).find('img').attr('src'));
						
					
					});
					objbox.request(objbox.cid,objbox.current);
				}});
			},
			nextPage : function(){
				if(this.current < this.total){
					this.current++;
				}
				this.request(this.cid,this.current);
			},
			prevPage : function(){
				if(this.current > 1){
					this.current--;
				}
				this.request(this.cid,this.current);
			}
		}
		self.find('.btn-select').click(function(){
			var cid = 0;
			if($('#ProductForm_product_type_id,#SupplyForm_category').length > 0){
				cid = $('#ProductForm_product_type_id,#SupplyForm_category').val();
			}
			if(cid ==0){
				alert('请先选择品类');
			}else{
				box.showBox(cid);
			}
		});
		$('#SupplyForm_effective_time,#ProductForm_product_join_date').datepicker({dateFormat : 'yy-mm-dd'});
	},
	JCertAdd : function (){
		var self = $(this);
		$(".image-preview").uploadPreview({ width: 200, height: 200, imgDiv: ".thumb", imgType: ["bmp", "gif", "png", "jpg"] });

	},
	JSupplyList : function () {
		var self = $(this);
		var chks = self.find('.table-list :checkbox');
		self.find('.btn-group .cmp-btn').on('click',function(){
			var o = $(this);
			if(o.hasClass('all')){
				chks.prop('checked',true);
			}else if(o.hasClass('cancel')){
				chks.prop('checked',false);
			}else if(o.hasClass('delete')){
				if(confirm('确定要删除？！')){
					var arr = chks.filter(':checked').map(function(){
						return this.value;
					}).get().join(',');
					$.getJSON(o.data('api')+'&ids=' + arr,function(re){
						if(re.status == 1){
							location.reload();
						}
					});
					
				}
			}else if(o.hasClass('special')){
			
				var arr = chks.filter(':checked').map(function(){
					return this.value;
				}).get().join(',');
				$.getJSON(o.data('api') + '&ids=' + arr,function(re){
					if(re.status == 1){
						location.reload();
					}
				});
					
				
			}
		});
		self.find('.ico-del').on('click',function(e){
			e.preventDefault();
			if(confirm('确定要删除？！')){
				$.getJSON($(this).attr('href'),function(re){
						if(re.status == 1){
							location.reload();
						}
				});
			}
		});
		
		$('#product_status,#supply_status,#msg_type').change(function(){
			$(this).closest('form').submit();
		});
	
	},
	JQuot : function () {
		var self = $(this),api = $('#chart').data('api');
		$('#chart').css({width:250,height:150});
		var loadChart = function (params) {
			var p = $.param (params);
			api = api.indexOf('?') == -1 ? api + '?' + p : api + '&' + p;
			$.getJSON(api,function (re) {
				var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart',
                    type: 'line'
                },
                title: {
                    text: re.text
                },
                xAxis: {
                    categories: re.xAxis
                },
                yAxis: {
                    title: {
                        text: re.yAxis
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '' +  this.series.name + ': ' + this.y + '';
                    }
                },
                credits: {
                    enabled: false
                },
                series: re.series,
                exporting: {
                    enabled: false
                }
            });
			});
		}
		$.getAsset('script',['js/highcharts.js'],function(){
			 loadChart({cid:1});
		});
	},
	JXhSlist : function (){
		var self = $(this);
		$('.search-Date-show').find('tr').hover(function(){$(this).addClass('hover');},function(){$(this).removeClass('hover')}).filter(':odd').addClass('odd');
	},
	JQgxx : function(){
		var $outer = $('#jq_animate_loop');
		if ( ! $outer.length) { return false; }
		var timer = 0;
		var loop = true;
		$outer.on({
			frame: function() {
				var $last = $outer.children(':last');

				var height = $last.outerHeight();

				$outer.animate({paddingTop:height}, 1000, 'linear', function() {
					$outer.css({
						paddingTop:0
					}).prepend($last);

					if (loop) {
						$outer.triggerHandler('mouseleave');
					}
				});
			},
			mouseleave: function() {
				loop = true;
				if ( ! timer) {
					timer = setTimeout(function() {
						$outer.triggerHandler('frame');
						timer = 0;
					}, 3000);
				}
			},
			mouseenter: function() {
				loop = false;

				if (timer) {
					clearTimeout(timer);
					timer = 0;
				}
			}
		}).triggerHandler('frame');
	},
	JMessageCreate : function () {
		var self = $(this),reveriver = $('#MessageForm_msg_to_user_name');
		
		 reveriver.autocomplete({
			source: reveriver.data('api'),
			minLength: 1,
			select: function( event, ui ) {
				$('#MessageForm_msg_to_user_id').val(ui.item.id);
				reveriver.val(ui.item.value);
				
			}
		});
		
	},
	JDataCenter : function () {
		var self = $(this),api = $('#chart1').data('api'),api2 = $('#chart2').data('api');
		$('#chart1,#chart2').css({width:301,height:185});
		var loadChart = function (params) {
			var p = $.param (params);
			api = api.indexOf('?') == -1 ? api + '?' + p : api + '&' + p;
			$.getJSON(api,function (re) {
				var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart1',
                    type: 'line'
                },
                title: {
                    text: re.text
                },
                xAxis: {
                    categories: re.xAxis
                },
                yAxis: {
                    title: {
                        text: re.yAxis
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '' +  this.series.name + ': ' + this.y + '';
                    }
                },
                credits: {
                    enabled: false
                },
                series: re.series,
                exporting: {
                    enabled: false
                }
            });

			});
			$.getJSON(api2,function (re) {
				var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart2',
                    type: 'line'
                },
                title: {
                    text: re.text
                },
                xAxis: {
                    categories: re.xAxis
                },
                yAxis: {
                    title: {
                        text: re.yAxis
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '' +  this.series.name + ': ' + this.y + '';
                    }
                },
                credits: {
                    enabled: false
                },
                series: re.series,
                exporting: {
                    enabled: false
                }
            });

			});
		}
		$.getAsset('script',['js/highcharts.js'],function(){
			 loadChart({cid:1});
		});
	},
	JImgScroller : function () {
		var self = $(this);
		var s = new MU.Tool.ImgScroller({'el':self,duration : 80,direction : self.data('type')});
	},
	JQQBox : function () {
		var self = $(this);
		self.on({
			mouseenter : function (){
				$(this).addClass('on');
			},
			mouseleave : function () {
				$(this).removeClass('on');				
			}
		});
	},
	JAddQQ : function () {
		var self = $(this);

		self.find('ul').on('click','.act',function () {
			var li = $(this).closest('li');
			if($(this).hasClass('add')){
				li.clone().insertBefore(self.find('.btn')).find('.act').attr('class','act remove').text('-').siblings('input').val('');
			}else{
				var hval = li.find('input[type=hidden]').val();
				if(hval == "") {
					li.remove();
					return;
				}
				$.getJSON(self.data('del-api') + '&ids=' + hval,function(){
					li.remove();
				});
				
			}
		});
	},
	JShopTpl : function () {
		var self = $(this);
		self.find('.btn').on('click',function(){
			if($(this).hasClass('preview')){
				$('<img>').attr('src',$(this).closest('.type_item').find('.type_preview').data('big')).dialog({width:'auto',height:'auto',title:'预览',close : function(){
					$(this).dialog('destroy');
				}});
			}
		});
	},
	JChartMap : function () {
		var self = $(this),api = self.data('api');
		self.find('form').attr('autocomplete','off');
		$('#container').css({width:710,height:500});
		var loadChart = function (params) {	
			$.post(api,params,function (re) {

				var chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						type: 'line'
					},
					title: {
						text: re.text
					},
					xAxis: {
						categories: re.xAxis
					},
					yAxis: {
						title: {
							text: re.yAxis
						}
					},
					tooltip: {
						formatter: function () {
							return '' +  this.series.name + ': ' + this.y + '';
						}
					},
					credits: {
						enabled: false
					},
					series: re.series,
					exporting: {
						enabled: false
					}
				});

			},'json');
			
		}
		$.getAsset('script',['js/highcharts.js'],function(){
			loadChart(self.find('form').serializeArray());	
		});
		self.find('.datepicker').datepicker({dateFormat : 'yy-mm-dd'});
		self.find('.btn-red').on('click',function(){
			//$.getAsset('script',['js/highcharts.js'],function(){
				loadChart(self.find('form').serializeArray());
			//});
		});
		
		
		
	},
	JPrdDetail : function () {
		var self = $(this);
		self.find('.btn_sc').click(function(){
			if (document.all)
			{ 
				window.external.addFavorite(location.href,document.title);
			}
			else if (window.sidebar)
			{
				window.sidebar.addPanel(document.title, location.href, "");
			}
		});
	
	},
	JFilter : function () {
		var self = $(this);
		self.find('.toggle').click(function(){
			var o = $(this);
			if(o.hasClass('expand')){
				o.parent().find('.more').slideUp('fast',function(){
					o.attr('class','toggle collapse');
				});
			}else{
				o.parent().find('.more').slideDown('fast',function(){
					o.attr('class','toggle expand');
				});
			}
		});
	}
});
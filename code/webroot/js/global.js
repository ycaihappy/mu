$.extend(MU.mods,{
    body : function(){
		var self = $(this);			
			//MU.mods.lazyloadImage.call(self);
		$('div.m-tab-list,div.m-quot,div.m-case,div.m-nous').find('.hd span').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('span').index($(this));
			$(this).closest('.hd').siblings('.bd').find('ul').eq(index).show().siblings().hide();
		});
	},
	lazyloadImage : function(){
		$(this).find('img').lazyload({ effect: "fadeIn", threshold: 200, failurelimit: 20 });
		
	},
	JSearchForm : function () {
		var self = $(this);
		$('#q').focusin(function(){
			$(this).parent().addClass('search-status-focus');
		}).focusout(function(){
			if ($(this).val() == "") {
				$(this).parent().removeClass('search-status-focus');
			}
		});
		
		self.find('input[name=type]').val(self.find('.switchable-nav li.selected').data('type'));
		
		self.find('.switchable-nav li').click(function () {
			$(this).addClass('selected').siblings().removeClass('selected');
			self.find('input[name=type]').val($(this).data('type'));
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
		self.find('.user-type').click(function () {
			if ( $(this).val() == 1) {
				self.find('.for-company').show();
				cname.text(cname.data('c-text'));
			}else{
				self.find('.for-company').hide();
				cname.text(cname.data('text'));
			}
		});
		self.find('.btn-reg').click(function(e){
			e.preventDefault();
			var cur = self.data('step'), o = $(this),isok = false;
			
			if( o.hasClass('act-one')) {
			
				 $.ajax({  
					type:"post",  
					url:'index.php?r=sms/check',  
					dataType:"json",
					async : false,
					data : o.closest('form').serializeArray(),
					success: function(re) {  
						if(re.status == 0){
							alert('验证码错误！');
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
					url:'index.php?r=uehome/user/registeruser',  
					dataType:"json",
					async : false,
					data : o.closest('form').serializeArray(),
					success: function(re) {  
						if(re.status == 0){
							alert('保存失败！');
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
			if(o.hasClass('disabled')) return;
				t = 10;
				o.addClass('disabled');
			$.getJSON(o.data('api') + '&mobile_number=' + o.prev('input[name=mobile_number]').val(),function(re){
				
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
		self.find('h1 a').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('a').index($(this));
			self.find('.ck-news').eq(index).show().siblings('.ck-news').hide();
		});
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
						'uploader' : 'index.php?r=uehome/user/uploadTemplateImage',

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
					$('<img />').attr('src',o.siblings('input').val()).dialog({width:'auto',height:'auto',title:'Preview',close : function(){
						$(this).dialog('destroy');
					}});
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
				
				$.getJSON('index.php?r=uehome/user/getImagesFromLibary&category_id='+cid+'&page=' + page,function(re){
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
		$("#FileForm_image").uploadPreview({ width: 200, height: 200, imgDiv: ".thumb", imgType: ["bmp", "gif", "png", "jpg"] });

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
					$.getJSON('index.php?r=uehome/user/productdel&ids=' + arr,function(re){
						if(re.status == 1){
							location.reload();
						}
					});
					
				}
			}else if(o.hasClass('special')){
			
				var arr = chks.filter(':checked').map(function(){
					return this.value;
				}).get().join(',');
				$.getJSON('index.php?r=uehome/user/productSpecial&ids=' + arr,function(re){
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
		
		$('#product_status').change(function(){
			$(this).closest('form').submit();
		});
	},
	JQuot : function () {
		var self = $(this);
		$('#chart').css({width:250,height:150});
		$.getAsset('script',['js/highcharts.js'],function(){
			 var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart',
                    type: 'line'
                },
                title: {
                    text: '行情走势图'
                },
                xAxis: {
                    categories: ['Jan','Feb','Mar']
                },
                yAxis: {
                    title: {
                        text: '价格'
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
                series: [
					{
						name : 'a',
						data : [2,3,4]
					},
					{
						name : 'b',
						data : [1,2,3]
					},
					{
						name : 'c',
						data : [5,7,8]
					}
					
				],
                exporting: {
                    enabled: false
                }
            });
		});
	},
	JXhSlist : function (){
		var self = $(this);
		$('#data_container').find('li:odd').addClass('odd');
	}
});
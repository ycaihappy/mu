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
				var html = '<div class="m-form uploader"><p><input type="file" name="file_upload" id="file_upload" /></p><p>宽度<input type="text" name="upload_width"  />px 高度<input type="text" name="upload_height"  />px</p><p><button class="btn">上传</button></p></div>';
				$(html).dialog({width:'auto',height:'auto',title:'Upload Image',
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
						'uploader' : 'index.php?r=uehome/default/uploadTemplateImage',
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
	}
});
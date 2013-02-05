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
	}
});
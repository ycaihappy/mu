MU.mods={
    body : function(){
		var self = $(this);			
			//MU.mods.lazyloadImage.call(self);
		$('div.m-tab-list').find('.hd span').mouseover(function(){
			$(this).addClass('on').siblings().removeClass('on');
			var index = $(this).parent().find('span').index($(this));
			$(this).closest('.m-tab-list').find('ul').eq(index).show().siblings().hide();
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
		})
	},
	JIndexAd : function (){
		var self = $(this);
		var adroll = new MU.Tool.AdRoll({el:self,interval:4500});
	}
};
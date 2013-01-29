$.extend(MU.mods,{
   
	JLeftPanel : function (){
		var self = $(this);
		self.find('li').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
		});
		
	}
});
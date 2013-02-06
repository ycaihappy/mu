$.extend(MU.mods,{
   
	JLeftPanel : function (){
		var self = $(this);
		self.find('li').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
		});
		
	},
	JRoleList : function () {
		var self = $(this);
		self.find('.checkall').change(function(){
			self.find('.table-list :checkbox').prop('checked',$(this).prop('checked'));
		});
		
		self.find('.ico-set').click(function(e){
			e.preventDefault();
			var obj = $(this); 
			$('.list-from').listbox().reload({ data: self.data('get-role-api'), ajaxsettings: {
                    data: { id: obj.data('id'),act : 'from' }
                }
            });
			$('.list-to').listbox().reload({ data: self.data('get-role-api'), ajaxsettings: {
                    data: { id: obj.data('id') , act : 'to' }
                }
            });
			
		});
	},
	JRoleOperate : function () {
		var self = $(this),listFrom = self.find('.list-from'),listTo = self.find('.list-to');
		 listFrom.listbox({
                data: [],
                width: 200,
                height: 300
         });
		 listTo.listbox({
                data: [],
                width: 200,
                height: 300
         });
		self.find('.btn-b').click(function(){
			var o = $(this);
			if(o.hasClass('addone')){
				var selected = listFrom.listbox().getSelected();
				for ( var i = 0,len = selected.length; i < len; i++ ){
					listFrom.listbox().removeItem({ value: selected[i].value });
					listTo.listbox().addItem(selected[i]);
				}
			}
		});
	}
});
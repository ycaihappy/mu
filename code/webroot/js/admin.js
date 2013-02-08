$.extend(MU.mods,{
   
	JLeftPanel : function (){
		var self = $(this);
		self.find('li').click(function(){
			$(this).addClass('on').siblings().removeClass('on');
		});
		
	},
	JRoleList : function () {
		var self = $(this),rolebox = $('#J_RoleOperate');
		self.find('.checkall').change(function(){
			self.find('.table-list :checkbox').prop('checked',$(this).prop('checked'));
		});
		
		self.find('.ico-set').click(function(e){
			e.preventDefault();
			var obj = $(this),id = obj.data('id'),acttype=obj.data('acttype'); 
			rolebox.data('id',id);
			rolebox.data('acttype',acttype);
			$('.list-from').listbox().reload({ data: self.data('get-role-api'), ajaxsettings: {
                    data: { id : id, act : 'assigned' }
                }
            });
			$('.list-to').listbox().reload({ data: self.data('get-role-api'), ajaxsettings: {
                    data: { id : id, act : 'nonassigned' }
                }
            });
			rolebox.dialog({width:'auto',height:'auto',title:'角色分配'});
			
			
		});
	},
	JRoleOperate : function () {
		var self = $(this),listFrom = self.find('.list-from'),listTo = self.find('.list-to');
		 listFrom.listbox({
                data: [],
                width: 200,
                height: 300,
				multiselect : true
         });
		 listTo.listbox({
                data: [],
                width: 200,
                height: 300,
				multiselect : true
         });
		self.find('.btn-b').click(function(){
			var o = $(this), selected = listFrom.listbox().getSelected(), listToselected = listTo.listbox().getSelected(),fromDatas = listFrom.listbox().getDatas(),toDatas = listTo.listbox().getDatas();
			if(o.hasClass('addone')){				
				for ( var i = 0,len = selected.length; i < len; i++ ){
					listFrom.listbox().removeItem({ value: selected[i].value });
					listTo.listbox().addItem(selected[i]);
				}
			}else if (o.hasClass('delone')) {
				for ( var i = 0,len = listToselected.length; i < len; i++ ){
					listTo.listbox().removeItem({ value: listToselected[i].value });
					listFrom.listbox().addItem(listToselected[i]);
				}
			} else if (o.hasClass('addall')) {
				for ( var i = 0,len = fromDatas.length;i < len; i++ ) {
					listFrom.listbox().removeItem({ value: fromDatas[i].value });
					listTo.listbox().addItem(fromDatas[i]);
				} 
			} else if (o.hasClass('delall')) {
				for ( var i = 0,len = toDatas.length;i < len; i++ ) {
					listTo.listbox().removeItem({ value: toDatas[i].value });
					listFrom.listbox().addItem(toDatas[i]);
				} 
			}
		});
		self.find('.save').click(function(e){
			var toDatas = listFrom.listbox().getDatas(),id = self.data('id'),actType=self.data('acttype'),ids = [];
			for ( var i = 0,len = toDatas.length;i < len; i++ ) {
					ids.push(toDatas[i].value);
			}
			$.post(self.data('post-api'),{actType:actType,ownerid:id,ids : ids},function(re){
				if(re) {
					//alert(re.msg);
					//location.reload();
				}
			},'json');
			
		});
	}
});
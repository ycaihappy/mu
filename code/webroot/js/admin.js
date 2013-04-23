$.extend(MU.mods,{
   
	JLeftPanel : function (){
		var self = $(this);	
	
		self.find('li a').click(function(e){
			if ($(this).next().is('ul')){
				//e.preventDefault();
				$(this).next().slideToggle('fast');
				return;
			}
			$(this).closest('div').find('li').removeClass('on');
			$(this).parent().addClass('on');
			//$(this).parent().addClass('on').siblings().removeClass('on');
		});
		
		
	},
	JRoleList : function () {
		var self = $(this),rolebox = $('#J_RoleOperate');
		self.find('.checkall').change(function(){
			self.find('.table-list :checkbox').prop('checked',$(this).prop('checked'));
		});
		
		self.find('.ico-set').live('click',function(e){
			e.preventDefault();
			var obj = $(this),id = obj.data('id'),acttype=obj.data('acttype'); 
			if(acttype>=0)
			{
				rolebox.data('id',id);
				rolebox.data('acttype',acttype);
				$('.list-from').listbox().reload({ data: self.data('get-role-api'), ajaxsettings: {
	                    data: { id : id, act : 'assigned' ,actType:acttype}
	                }
	            });
				$('.list-to').listbox().reload({ data: self.data('get-role-api'), ajaxsettings: {
	                    data: { id : id, act : 'nonassigned' ,actType:acttype}
	                }
	            });
				var title;
				switch(acttype)
				{
				case 2:
					title='角色';
					break;
				case 1:
					title='任务';
					break;
				case 0:
					title='功能';
					break
				}
				rolebox.dialog({width:'auto',height:'auto',title:title+'分配'});
				$("span.title").text(title);
			}
			
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
				//if(re) {
					rolebox = $('#J_RoleOperate');
					$.fn.yiiGridView.update('J_RoleList');
					rolebox.dialog('close');
					//location.reload();
				//}
			},'json');
			
		});
	},
	JBasicSiteInfo : function() {
		var self = $(this);
		self.find('.baidu-sug').on('click',function(){
			$.get('http://suggestion.baidu.com/su',{'wd':$('#baidusearch').val(),'cb':'MU.mods.baiduSugCb'},function(){
				
			},'jsonp');
		});
	},
	baiduSugCb : function(re){
		$('#BasicSiteInfo_hotSearchKeywords').val(re.s);
	}
});
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
		$( "#baidusearch" ).autocomplete({
		  minLength: 1,
		  source : function(request, response){
			 $.ajax({
				url: 'http://suggestion.baidu.com/su',
				dataType: 'jsonp',
				jsonp: 'cb',
				data:{'wd':$('#baidusearch').val()},
				success: function(re) {
					var arr = re.s;
					response($.map(arr, function(item) {
									return {
										label : item
									}
					}))
				}
			})
		  },
		  focus: function( event, ui ) {
			$( "#baidusearch" ).val( ui.item.label );

			return false;
		  },
		  select: function( event, ui ) {
			$("#baidusearch").val( ui.item.label );
			return false;
		  }
		});
		
		self.find('.baidu-sug').on('click',function(){		
			var kw = $('#BasicSiteInfo_hotSearchKeywords'),bs = $.trim($("#baidusearch").val());
			var ckw = kw.val().split('|');
			if($.inArray(bs,ckw) == -1 && bs != '' ){
				kw.val(kw.val() + '|' + bs);
			}
			
		});
	},
	JUpdateProduct : function(){
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
			if($('#Product_product_type_id').length > 0){
				cid = $('#Product_product_type_id').val();
			}
			if(cid ==0){
				alert('请先选择品类');
			}else{
				box.showBox(cid);
			}
		});
	}

});
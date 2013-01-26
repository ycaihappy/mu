var isOpera = $.browser.opera, isIE = $.browser.msie, isMoz = $.browser.mozilla;
if (isIE) {
	try {
		document.execCommand("BackgroundImageCache", false, true);
	} catch (e) {}
}
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend( jQuery.easing,
{
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	def: "easeOutQuad",
	easeOutCubic: function(b) {
		return 1 - (--b) * b * b * b
	},
	backout: function(h, i, m, l, k) {
		var j = 1.70158;
		return l * ((i = i / k - 1) * i * ((j + 1) * i + j) + 1) + m
	}
});
//MU library
var MU = MU || {};
MU = {
	Tool : {}
}
MU.Tool.ImgPlayer = function(options) {
	this.el = options.el || null;
	this.interval = options.interval || 2000;
	this.total = 4;
	this.currentIndex = -1;
	this.intervalID = null;
	this.alpha = options.alpha || 1;
	this.init();
}

MU.Tool.ImgPlayer.prototype = {
	init : function() {
		if(!this.el) return;
		//create btns
		var that = this.el,_this = this,html = [];
		html.push('<div class="btns">');
		this.el.find(".pic").children().each(function(i){
			html.push('<a href="javascript:;">'+(i + 1)+'</a>');
		});
		html.push('</div>');
		this.el.find('.slide').append(html.join(''));	
		
		that.find('.btns').delegate('a','mouseover',function(){
			var self = $(this);
			_this.playIndex(that.find('.btns a').index(self));
			_this.pause();
		}).css('opacity',_this.alpha);
		that.find('.btns,.pic').delegate('a','mouseout',function(){
			_this.start();
		});
		that.find('.pic').delegate('a','mouseover',function(){
			_this.pause();
		});
		that.find('.pic').css('position','relative').find('a').css({top:'0px',left:'0px','position':'absolute'});
		this.total = that.find('.pic').children().length;
		this.playIndex(0);
		this.start();
		
	},
	playIndex : function(_index) {
		if(this.currentIndex == _index) {return;}
		var imgs = this.el.find('.pic a'),btns = this.el.find('.btns a');
		btns.removeClass('on');		
		$(btns.get(_index)).addClass('on');
		$(imgs.get(_index)).fadeIn();
		if(this.total > 1){
			$(imgs.get(this.currentIndex)).fadeOut('slow');
		}
		this.currentIndex = _index;
	},
	
	prev : function(){
		this.pause();
		this.start();
		if(this.currentIndex > 0){
			this.playIndex(this.currentIndex - 1);
		}else{
			this.playIndex(this.total - 1);
		}
	},
	next : function(){
		this.pause();
		this.start();
		if(this.currentIndex < this.total -1){
			this.playIndex(this.currentIndex + 1 );
		}else{
			this.playIndex(0);
		}
	},
	start : function(){
		var _this = this;
		_this.intervalID = setInterval(function(){
			_this.next.call(_this);
		} , _this.interval);
	},
	pause : function (){
		var _this = this;
		clearInterval(_this.intervalID);
	}
};

MU.Tool.Swimming = function(options){

	this.el = options.el || null;
	this.count = options.count || 4;
	this.padding = options.padding || 0;
	this.duration = options.duration || 300;
	this.pages = 0;
	this.total = 0;
	this.currentPage = 0;
	this.onChange = null;
	this.timer = null;
	this.clickSpeed = 1;
	this.init();
}

MU.Tool.Swimming.prototype = {
	
	init : function(){
		if(!this.el) return;
		var _this = this, el = this.el , ul = el.find('ul');
		_this.el.css('position','relative');
		ul.css({'position':'absolute','width':(ul.find(':first').width() + _this.padding) * ul.children().length});
		
		this.total = ul.children().length;
		this.pages = Math.ceil(this.total / this.count);

		
		
	},
	left : function(){
		var _this = this;
		var l = _this.el.find("ul");
		var m = l.children();
		var p = _this.pages;
		var s = _this.currentPage;
		var n = (m.eq(0).width() + _this.padding) * _this.count;
		if (p == 1 || l.is(":animated")) {
			return false
		}
		_this.clickSpeed -=0.01;
		if(_this.timer) clearTimeout(_this.timer);
		_this.timer = setTimeout(function(){
			_this.clickSpeed = 1;
		},300);		

		if (s == 0) {
			m.eq(p - 1).css({
				position: "relative",
				left: -p * n + "px"
			})
		}
		s--;
		l.stop().animate({
			left: -s * n
		}, _this.duration * _this.clickSpeed, function() {
			if (s == -1) {
				s = p - 1;
				_this.currentPage = s;
				m.eq(p - 1).removeAttr("style");
				l.css("left", -s * n);
				if(_this.onChange){
					_this.onChange.call(_this,_this.currentPage);
				}
			}
		
		});
		_this.currentPage = s;
		if(_this.onChange){
			_this.onChange.call(_this,_this.currentPage);
		}
		
	},
	right : function(){

		var _this = this;
		var l = _this.el.find("ul");
		var m = l.children();
		var p = _this.pages;
		var s = _this.currentPage;
		var n = (m.eq(0).width() + _this.padding) * _this.count;
		
		if (p == 1 || l.is(":animated")) {
			return false
		}
	
		_this.clickSpeed -=0.05;
		if(_this.timer) clearTimeout(_this.timer);
		_this.timer = setTimeout(function(){
			_this.clickSpeed = 1;
		},300);		
		if (s == p - 1) {
			m.eq(0).css({
				position: "relative",
				left: p * n + "px"
			})
		}
		s++;
		l.stop().animate({
			left: -s * n
		}, _this.duration * _this.clickSpeed, function() {
			if (s == p) {
				s = 0;
				_this.currentPage = s;
				m.eq(0).removeAttr("style");
				l.css("left", s * n);
				if(_this.onChange){
					_this.onChange.call(_this,_this.currentPage);
				}
			}
	
		});
		_this.currentPage = s;
		if(_this.onChange){
			_this.onChange.call(_this,_this.currentPage);
		}
		
		
	},
	playPageIndex : function(pageIndex){
		var _this = this, el = this.el,w = el.find('ul').width();
		var d = arguments[1] || 'next';
		
		if(pageIndex == this.currentPage && typeof arguments[1] == 'undefined'){
			return false;
		}
		
		if(this.currentPage > pageIndex){
			this.currentPage = pageIndex - 1;
			this.right();
		}else{
			this.currentPage = pageIndex + 1;
			this.left();
		}		
	},
	prev : function(){

		if(this.currentPage > 0){
			this.currentPage--;
			
		}else{
			this.currentPage = this.pages - 1;
		}
		this.playPageIndex(this.currentPage);
	},
	next : function(){
		if(this.currentPage < this.pages - 1){
			this.currentPage++;
			
		}else{
			this.currentPage = 0;
			
		}
		this.playPageIndex(this.currentPage);
	}
	
}

MU.Tool.Hiking = function(options){
	this.el = options.el || null;
	this.count = options.count || 4;
	this.padding = options.padding || 0;
	this.duration = options.duration || 500;
	this.pages = 0;
	this.total = 0;
	this.currentPage = 0;
	this.onChange = null;
	this.init();
}

MU.Tool.Hiking.prototype = {
	init : function(){
		if(!this.el) return;
		var _this = this, el = this.el;
		_this.el.css('position','relative');
		el.find('ul').css({'position':'absolute'});
		this.total = this.el.find('ul').children().length;
		this.pages = Math.ceil(this.total / this.count);
	},
	up : function(){
		var _this = this, el = this.el;
		var _top = el.find('ul').position().top;
		var d = _this.duration;
		if(el.find('ul').is(":animated")){return;}
		var scrollTop = _top - ((el.find('li:first').height() + _this.padding) * _this.count);
		el.find('ul').stop().animate({top: scrollTop  + 'px'},d,'easeOutExpo',function(){
			
			for(var i=0;i<_this.count;i++){
				el.find('ul li:first').insertAfter(el.find('ul li:last'));
			}
			el.find('ul').css('top','0px');	
		});	
		if(_this.onChange){
			_this.onChange.call(_this);
		}
		
	},
	down : function(){
		var _this = this, el = this.el;
		var _top = el.find('ul').position().top;
		var scrollTop = _top + ((el.find('li:first').height() + _this.padding) * _this.count);
		if(el.find('ul').is(":animated")){return;}
		el.find('ul').css('top','-' +scrollTop+ 'px');
		for(var i=0;i<_this.count;i++){
			el.find('ul li:last').insertBefore(el.find('ul li:first'));
		}
		_top = el.find('ul').position().top;
		scrollTop = _top + ((el.find('li:first').height() + _this.padding) * _this.count);
		
		el.find('ul').stop().animate({top: scrollTop  + 'px'},_this.duration,'easeOutExpo',function(){
			el.find('ul').css('top','0px');			
		});
		if(_this.onChange){
			_this.onChange.call(_this);
		}
	}
}


//adroll
$.extend(MU.Tool, {
	AdRoll : function (options) {
		this.el = options.el;
		this.interval = options.interval || 3000;
		this.currentIndex = options.currentIndex || -1;
		this.total = options.total || 4;
		this.intervalID = null;
		this.init = function () {
			var arr = [];
			var that = this.el,
			_this = this;
			that.find('.btns').find('a').remove();
			that.find('.pic a').each(function (i) {				
				that.find('.btns').append('<a href="javascript:;">' + i + 1 + '</a>');
			});
			that.find('.btns').css('left', (that.width() - that.find('.btns').width()) * 0.5);
			that.find('.btns').delegate('a', 'mouseover', function () {
				var self = $(this);
				_this.playIndex(that.find('.btns a').index(self));
				_this.pause();
			});
			that.find('.btns,.pic').delegate('a', 'mouseout', function () {
				_this.start();
			});
			that.find('.pic').delegate('a', 'mouseover', function () {
				_this.pause();
			});
			that.find('.pic').css('position', 'relative').find('a').css({
				top : '0px',
				left : '0px',
				'position' : 'absolute'
			}).hide();
			this.total = that.find('.pic').children().length;
			this.playIndex(0);
			this.start();
			
		};
		this.playIndex = function (_index) {
			
			if (this.currentIndex == _index) {
				return;
			}
			var imgs = this.el.find('.pic a'),
			btns = this.el.find('.btns a');
			btns.removeClass('on');
			$(btns.get(_index)).addClass('on');
			$(imgs.get(_index)).stop(false, true).fadeIn();
			if (this.total > 1) {
				if (!$(imgs.get(this.currentIndex)).is(':animated')) {
					$(imgs.get(this.currentIndex)).fadeOut('slow');
				} else {
					$(imgs.get(this.currentIndex)).hide();
				}
			}
			this.currentIndex = _index;
		};
		
		this.prev = function () {
			this.pause();
			this.start();
			if (this.currentIndex > 0) {
				this.playIndex(this.currentIndex - 1);
			} else {
				this.playIndex(this.total - 1);
			}
		};
		this.next = function () {
			this.pause();
			this.start();
			if (this.currentIndex < this.total - 1) {
				this.playIndex(this.currentIndex + 1);
			} else {
				this.playIndex(0);
			}
		};
		this.start = function () {
			var _this = this;
			_this.intervalID = setInterval(function () {
					_this.next.call(_this);
				}, _this.interval);
		};
		this.pause = function () {
			var _this = this;
			clearInterval(_this.intervalID);
		};
		
		this.init();
		
	}
});


;(function(project,$){
	project.getMethod=function(id){
		var arr=id.split("_");
		var modName=arr[0];
		for (var i = 1; i < arr.length; i++) {
			var item=arr[i];
			modName+=item.substr(0,1).toUpperCase();
			modName+=item.substr(1);
		}
		return modName;
	};
	project.modsBind=function(obj){
		var mods=obj?obj.find("div[id^='J_'][isInit!='true']"):$("div[id^='J_'][isInit!='true']");
		if(!obj && project.mods["body"]){
			project.mods["body"].call(document);
		}
		mods.each(function(i){
			var modMethod=project.getMethod(this.id);
			if(project.mods[modMethod]){
				project.mods[modMethod].apply(this,[this.id,modMethod]);
			   $(this).attr("isInit","true");
			}
		});
		if(project.mods.complete){
			project.mods.complete();
		}
	}
	project.ajaxConfig=function(){
		$.ajaxSetup({
		   timeout : 15000
		 });
		 
		$(document.body).ajaxError(function(e, jqxhr, settings, exception) {
			  //alert(exception);
			 // $('.cmp-loading').fadeOut();
		});
		
		/*$('.cmp-loading').ajaxStart(function(){
			$(this).fadeIn();
		});*/

		$(document.body).ajaxComplete(function(event,request, settings){
			if($.trim(request.responseText).substr(0,1)=="<"){
				var o=$(request.responseText);
				o.each(function(){
					if(this.id){
						project.modsBind($("#"+this.id).parent());						
					}
				});
				project.widget();
				
			}
			
			
		});
	};
	project.methods={

	}
	project.mods={

	}
	project.init=function(){
		//
		project.ajaxConfig();
	};
	
	
	project.widget = function (){
		//widget init
		$('.tipable').tipable();
		$('.cmp-dropdown').dropdown().mouseenter(function(){
			$(this).addClass('hover');
		}).mouseleave(function(){
			$(this).removeClass('hover');
		});
	};
	project.config = {
		pageid : $('body > div[id^="page"]').attr('id') || null
	}

})(MU,jQuery);


;(function($){
	$.fn.tipable = function(options){
		var defaults = {
			
		};
		var opts = $.extend({},defaults,options);
		
		if(!/msie/i.test(navigator.userAgent)){return;}
		
		return this.each(function(){
			var self = $(this);
			self.wrap('<div class="cmp-tip"></div>').after('<span class="tip">' + self.attr('placeholder') +'</span>');
			self.parent().find('.tip').click(function(){
				self.focus();
				$(this).hide();
			});
			
			self.bind('focus',function(){
				self.parent().find('.tip').hide();
			}).bind('blur',function(){
				if($.trim(self.val()) == ""){
					self.parent().find('.tip').show();
				}
			});
			
			if(self.val() != ""){
				self.parent().find('.tip').hide();
			}
			
		});
		
	}
})(jQuery);



;(function($){
	$.fn.scrollAble = function (options){
		var defaults = {
			duration : 50,
			step : 1,
			speed : 1
		}
		
		var opts = $.extend({},defaults,options);
		
		return this.each(function(){
			var obj = $(this);
			var scroller = {
				el : obj,
				timer : null,
				duration : opts.duration,
				speed : opts.speed,
				step : opts.step,
				direction : 'up',
				move : function(){
					var _this = this;
					if('up' === _this.direction){
						_this.up();
					}else{
						_this.down();
					}
					
				},
				start : function(){
					var _this = this;
					_this.pause();
					_this.timer = setInterval(function(){
						_this.move();
					},_this.duration);
				},
				pause : function(){
					var _this = this;
					clearInterval(_this.timer);
				},
				init : function(){
					var _this = this;
					this.el.find('.inner-box').mouseover(function(){
						_this.pause();
					}).mouseout(function(){
						_this.start();
					});
					this.el.find('.btn').mousedown(function(){
						_this.direction = $(this).find('a').hasClass('up') ? 'up' : 'down';
						_this.speed = 10;
					}).mouseup(function(){					
						_this.speed = 1;
						_this.direction = 'up';
					});		
					_this.start();
				},
				up : function(){

					var box = this.el.find('.inner-box'),top = box.position().top,_this = this;
					if(Math.abs(top) >= box.find('li:first').height() +8){
						box.find('li:first').insertAfter(box.find('li:last'));
						box.css('top','0px');
					}else{
						box.css('top',(top-=_this.step * _this.speed) + 'px');
					}					
				},
				down : function(){
					var box = this.el.find('.inner-box'),top = box.position().top,_this = this;
					if(top > 0){
						box.find('li:last').insertBefore(box.find('li:first'));
						box.css('top', '-120px');
					}else{
						box.css('top',(top+=(_this.step * _this.speed)) + 'px');
					}
				}
				
			};			
			scroller.init();
			
		});
	}
})(jQuery);

;(function($){
	$.fn.dropdown = function(options){
		var settings = {
			title : '',
			onSelect : null
		}
		
		var opts = $.extend(settings,options);
		
		return this.each(function(){
			var self = $(this);
			//setTitle(opts.title);
			self.mouseenter(function(){
				//if(self.find('ul').is(':animated')) return;
				self.find('ul').stop(false,true).fadeIn('fast');
			}).mouseleave(function(){
				//if(self.find('ul').is(':animated')) return;
				self.find('ul').stop(true,true).fadeOut('fast');
			});
			/*$('body').click(function(){
				self.find('ul').fadeOut('fast');
			});*/
			self.find('ul li').click(function(e){
				var target = $(this);//$(e.target);
				setTitle(target.html());
				self.find('ul').fadeOut('fast');
				if(opts.onSelect){
					opts.onSelect.call(self,getTitle());
				}
			});
			
			function setTitle(t){
				self.find('b').html(t);
			}
			
			function getTitle(){
				return self.find('b').html();
			}
			
		});
	}

})(jQuery);


//global search
(function($) {

	var GlobalSearch = function($el, options) {
		var defaults = {
			box: $('.search-result'),
			method: 'GET',
			cacheCapacity: 10,
			dataType : 'json',
			delay: 500,
			api: 'getjson.php',
			searchUrl : 'http://www.tinydeal.com/index.php?main_page=ws_search_result'
		};
		this.options = $.extend(defaults, options);
		this.element = $el;
		this.cache = [];
		this.cacheData = {};
		this.xhr = null;
		this.init();
	};
			

	GlobalSearch.prototype.init = function(){
			var self = this;
			var $el = this.element;
			var cache = this.cache;
			var cacheData = this.cacheData;
			var timer, $box, $current = $();
			var KEY = {
				UP: 38,
				DOWN: 40,
				DEL: 46,
				TAB: 9,
				RETURN: 13,
				ESC: 27,
				COMMA: 188,
				PAGEUP: 33,
				PAGEDOWN: 34,
				BACKSPACE: 8
			};
			$box = this.options.box;
			$box.mouseover(function(e){
				var $target = $(e.target);
				$target = $target.is('li') ? $target : $target.parents('li');
				$current.removeClass('on'); 
				$target.addClass('on');
				$current = $target;
			}).mouseout(function(e){
				var $target = $(e.target);
				$target = $target.is('li') ? $target : $target.parents('li');
				$target.removeClass('on');
			});
			$el.keydown(function (e) {
				if (e.keyCode === KEY.RETURN) {
					return false;
				}
			}).keyup(function(e){
				var _keycode = e.keyCode;
				var _min = -1;
				var _max = $box.find("li").length;
				var keyword = $.trim($el.val());

				switch (_keycode) {
					case KEY.DOWN:
						$box.find("li").each(function(i){
							if ($(this).hasClass("on")) {
								$(this).removeClass("on");
								_min = i;				
							}
						})
						$current = $box.find("li").eq(_min + 1).addClass("on");
						break;
					case KEY.UP:
						$box.find("li").each(function(i){
							if ($(this).hasClass("on")) {
								$(this).removeClass("on");
								_max = i;					
							}
						})
						$current = $box.find("li").eq(_max-1).addClass("on");
						break;
					case KEY.ESC:
						this.close();
						break;
					case KEY.RETURN:
						if($box.find('li.on').length>0) {
							e.prevenMUefault();
							location.href = $box.find('.on a').attr('href');
						} else {
							if(this.form && this.value!=''){ 
								//this.form.submit();
								$(this.form).trigger('submit');
							}
						}
						break;
					default:

						if ($.inArray(keyword, cache) < 0) {
							clearTimeout(timer);
							timer = setTimeout(function () {
								self.dosearch(keyword);
							}, self.options.delay);
						} else {
							self.populate(cacheData[keyword], keyword);
						}
						break;
				}
			});
			
			$(document).click(function(){
				self.close();
			});
		
	}

	GlobalSearch.prototype.close = function () {
		this.element.closest('form').find('.holder')[0].className = 'holder';
		this.options.box.hide();
	}


	GlobalSearch.prototype.populate = function (data, keyword) {

		var self = this,html = [],box;
		box = this.options.box;
		if (data) {
			if(!data.msg){
				for (var i = 0, len = data.length; i < len; i++) {
					if (data[i].title) {
						
						html.push('<li><a href="'+data[i].link+'"><img src="'+data[i].image+'" /><p>'+data[i].title+'</p><em class="price">'+data[i].price+'</em></a></li>');					
						
					}
				}
				box.find('.bd ul').html(html.join(''));
				box.find('.hd,.ft').show().find('a').attr('href', self.options.searchUrl + '&' + this.element.closest('form').serialize());
			}else{
				box.find('.bd ul').html('<p class="msg">'+data.msg+'</p>');
				box.find('.hd,.ft').hide();
			}
			box.show();
		} else {

		this.close();
		}
	};

	GlobalSearch.prototype.dosearch = function (keyword) {
		var $el = this.element;
		var self = this;
		var $box = this.options.box;
		var $holder = $el.closest('form').find('.holder');
		var api = this.options.api.indexOf('?') == -1 ? this.options.api + '?' : this.options.api + '&';
		if (keyword.length > 0) {
			 $.ajax({
				type : this.options.method,
				url  : api + $el.closest('form').serialize(), 
				dataType : this.options.dataType,
				cache : true,
				timeout : 10000,
				beforeSend : function(xhr, s) {
					if (self.xhr !== null) {
						self.xhr.abort();
					} 
					self.xhr = xhr;
					$holder.addClass('loading');
				},
				success: function (data) {
					self.populate(data, keyword);
					if (self.options.cacheCapacity > 0) {
						if (self.cache.length === self.options.cacheCapacity) {
							delete self.cacheData[self.cache.shift()];
						}
						self.cache.push(keyword);
						self.cacheData[keyword] = data;
					}
					$holder.removeClass('loading').addClass('btn-close');
					self.xhr = null;
				},
				error: function () {
					this.close();
					$holder[0].className = 'holder';
				}
			});
		} else {
			this.close();
			$holder.removeClass('loading');
		}
	}

	$.fn.extend({
			searchable: function(options) {
			new GlobalSearch(this, options);
			return this;
		}
	});

})(jQuery);

$.oParam = function () {
	var o = {};
	window.location.search.replace(/([^?=&]+)=([^&]*)/g, function (m, key, value) {
		
		key = key.replace('%5B%5D','');
		o[key] = value;
		
	});
	return o;
}

$.extend({
	getAsset : function ( type, urls, callback ) {
		var head = document.head || document.getElementsByTagName( "head" )[0], readys = 0,doc = document;				
		for ( var i = 0, len = urls.length; i < len; i++ ) {
			(function () {
				var ele,ready = false;
				if (/\.css[^\.]*$/.test(urls[i])) {
					ele = doc.createElement('link');
					ele.type = 'text/css';
					ele.rel  = 'stylesheet';
					ele.href = urls[i];
				}
				else {
					ele = doc.createElement('script');
					ele.type = 'text/javascript';
					ele.src  = urls[i];
				}
				
				ele.async = false;
				ele.defer = false;
				ele.onload  = ele.onreadystatechange = function (event) {
					event = event || window.event;
					
					if (event.type === 'load' || (/loaded|complete/.test(ele.readyState) && (!doc.documentMode || doc.documentMode < 9))) {
						ready = true;
						readys++;
						ele.onload = ele.onreadystatechange = null;
						ele = undefined;
					
						if( readys == len && callback ) {
							callback();
						}
					}
				}
				head.insertBefore( ele, head.firstChild );
			})();
		}
		
		
	}
});




jQuery.cookie = function (key, value, options) {
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.seMUate(t.geMUate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};

(function(b){b.fn.Jlazyload=function(n,e){if(!this.length){return}var a=("https:"==document.location.protocol)?"/images/blankbg.gif":"/images/blankbg.gif";var k=b.extend({type:null,offsetParent:null,source:"original",placeholderImage:a,placeholderClass:"loading",threshold:200},n||{}),B=this,l,A,o=function(r){var c=r.scrollLeft,p=r.scrollTop,i=r.offsetWidth,q=r.offsetHeight;while(r.offsetParent){c+=r.offsetLeft;p+=r.offsetTop;r=r.offsetParent}return{left:c,top:p,width:i,height:q}},h=function(){var c=document.documentElement,s=document.body,q=window.pageXOffset?window.pageXOffset:(c.scrollLeft||s.scrollLeft),p=window.pageYOffset?window.pageYOffset:(c.scrollTop||s.scrollTop),i=c.clientWidth,r=c.clientHeight;return{left:q,top:p,width:i,height:r}},j=function(p,i){var r,q,v,u,t,c,s=k.threshold?parseInt(k.threshold):0;r=p.left+p.width/2;q=i.left+i.width/2;v=p.top+p.height/2;u=i.top+i.height/2;t=(p.width+i.width)/2;c=(p.height+i.height)/2;return Math.abs(r-q)<(t+s)&&Math.abs(v-u)<(c+s)},f=function(c){if(k.placeholderImage&&k.placeholderClass){c.attr("src",k.placeholderImage).addClass(k.placeholderClass)}},d=function(i,c,p){if(i){p.attr("src",c).removeAttr(k.source);if(e){e(c,p)}}},g=function(){A=h(),B=B.filter(function(){return b(this).attr(k.source)});b.each(B,function(){var c=b(this).attr(k.source);if(!c){return}switch(k.type){case"image":f(b(this));break;default:break}});b.each(B,function(){var c=b(this).attr(k.source);if(!c){return}var i=(!k.offsetParent)?A:o(b(k.offsetParent).get(0)),q=o(this),p=j(i,q);switch(k.type){case"image":d(p,c,b(this));break;default:break}})},m=function(){if(B.length>0){clearTimeout(l);l=setTimeout(function(){g()},10)}};g();if(!k.offsetParent){b(window).bind("scroll",function(){m()}).bind("reset",function(){m()}).bind("resize",function(){m()})}else{b(k.offsetParent).bind("scroll",function(){m()})}}})(jQuery);

(function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function j(){var b=0;g.each(function(){var c=a(this);if(i.skip_invisible&&!c.is(":visible"))return;if(!a.abovethetop(this,i)&&!a.leftofbegin(this,i))if(!a.belowthefold(this,i)&&!a.rightoffold(this,i))c.trigger("appear"),b=0;else if(++b>i.failure_limit)return!1})}var g=this,h,i={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(i,f)),h=i.container===d||i.container===b?e:a(i.container),0===i.event.indexOf("scroll")&&h.bind(i.event,function(a){return j()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(i.appear){var d=g.length;i.appear.call(b,d,i)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(i.data_attribute))[i.effect](i.effect_speed),b.loaded=!0;var d=a.grep(g,function(a){return!a.loaded});g=a(d);if(i.load){var e=g.length;i.load.call(b,e,i)}}).attr("src",c.data(i.data_attribute))}}),0!==i.event.indexOf("scroll")&&c.bind(i.event,function(a){b.loaded||c.trigger("appear")})}),e.bind("resize",function(a){j()}),/iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent.persisted&&g.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){j()}),this},a.belowthefold=function(c,f){var g;return f.container===d||f.container===b?g=e.height()+e.scrollTop():g=a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return f.container===d||f.container===b?g=e.width()+e.scrollLeft():g=a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return f.container===d||f.container===b?g=e.scrollTop():g=a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return f.container===d||f.container===b?g=e.scrollLeft():g=a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!a.rightoffold(b,c)&&!a.leftofbegin(b,c)&&!a.belowthefold(b,c)&&!a.abovethetop(b,c)},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})})(jQuery,window,document);


(function(b){b.fn.datalazyload=function(a,g){if(!this.length){return}var m=b.extend({type:null,offsetParent:null,source:"datalazyload",threshold:200},a||{}),d=this,n,f,e=function(q){var p=q.scrollLeft,i=q.scrollTop,r=q.offsetWidth,c=q.offsetHeight;while(q.offsetParent){p+=q.offsetLeft;i+=q.offsetTop;q=q.offsetParent}return{left:p,top:i,width:r,height:c}},l=function(){var q=document.documentElement,r=document.body,p=window.pageXOffset?window.pageXOffset:(q.scrollLeft||r.scrollLeft),i=window.pageYOffset?window.pageYOffset:(q.scrollTop||r.scrollTop),s=q.clientWidth,c=q.clientHeight;return{left:p,top:i,width:s,height:c}},k=function(p,i){var r,q,v,u,t,c,s=m.threshold?parseInt(m.threshold):0;r=p.left+p.width/2;q=i.left+i.width/2;v=p.top+p.height/2;u=i.top+i.height/2;t=(p.width+i.width)/2;c=(p.height+i.height)/2;return Math.abs(r-q)<(t+s)&&Math.abs(v-u)<(c+s)},j=function(c,i){if(c){b(i).css("display","none");b(i).removeClass(m.source);var p=document.createElement("div");i.parentNode.insertBefore(p,i);b(p).html(i.value)}},h=function(){f=l(),b("."+m.source).each(function(){var p=(!m.offsetParent)?f:e(b(m.offsetParent).get(0)),i=e(this),c=k(p,i);switch(m.type){case"textarea":j(c,this);break;default:break}})},o=function(){if(d.length>0){clearTimeout(n);n=setTimeout(function(){h()},10)}};h();if(!m.offsetParent){b(window).bind("scroll",function(){o()}).bind("reset",function(){o()}).bind("resize",function(){o()})}else{b(m.offsetParent).bind("scroll",function(){o()})}}})(jQuery);




//maybe delete following code in future
// ColorBox v1.3.19 - jQuery lightbox plugin
// (c) 2011 Jack Moore - jacklmoore.com
// License: http://www.opensource.org/licenses/mit-license.php
(function(a,b,c){function Z(c,d,e){var g=b.createElement(c);return d&&(g.id=f+d),e&&(g.style.cssText=e),a(g)}function $(a){var b=y.length,c=(Q+a)%b;return c<0?b+c:c}function _(a,b){return Math.round((/%/.test(a)?(b==="x"?z.width():z.height())/100:1)*parseInt(a,10))}function ba(a){return K.photo||/\.(gif|png|jpe?g|bmp|ico)((#|\?).*)?$/i.test(a)}function bb(){var b;K=a.extend({},a.data(P,e));for(b in K)a.isFunction(K[b])&&b.slice(0,2)!=="on"&&(K[b]=K[b].call(P));K.rel=K.rel||P.rel||"nofollow",K.href=K.href||a(P).attr("href"),K.title=K.title||P.title,typeof K.href=="string"&&(K.href=a.trim(K.href))}function bc(b,c){a.event.trigger(b),c&&c.call(P)}function bd(){var a,b=f+"Slideshow_",c="click."+f,d,e,g;K.slideshow&&y[1]?(d=function(){F.text(K.slideshowStop).unbind(c).bind(j,function(){if(K.loop||y[Q+1])a=setTimeout(W.next,K.slideshowSpeed)}).bind(i,function(){clearTimeout(a)}).one(c+" "+k,e),r.removeClass(b+"off").addClass(b+"on"),a=setTimeout(W.next,K.slideshowSpeed)},e=function(){clearTimeout(a),F.text(K.slideshowStart).unbind([j,i,k,c].join(" ")).one(c,function(){W.next(),d()}),r.removeClass(b+"on").addClass(b+"off")},K.slideshowAuto?d():e()):r.removeClass(b+"off "+b+"on")}function be(b){U||(P=b,bb(),y=a(P),Q=0,K.rel!=="nofollow"&&(y=a("."+g).filter(function(){var b=a.data(this,e).rel||this.rel;return b===K.rel}),Q=y.index(P),Q===-1&&(y=y.add(P),Q=y.length-1)),S||(S=T=!0,r.show(),K.returnFocus&&a(P).blur().one(l,function(){a(this).focus()}),q.css({opacity:+K.opacity,cursor:K.overlayClose?"pointer":"auto"}).show(),K.w=_(K.initialWidth,"x"),K.h=_(K.initialHeight,"y"),W.position(),o&&z.bind("resize."+p+" scroll."+p,function(){q.css({width:z.width(),height:z.height(),top:z.scrollTop(),left:z.scrollLeft()})}).trigger("resize."+p),bc(h,K.onOpen),J.add(D).hide(),I.html(K.close).show()),W.load(!0))}function bf(){!r&&b.body&&(Y=!1,z=a(c),r=Z(X).attr({id:e,"class":n?f+(o?"IE6":"IE"):""}).hide(),q=Z(X,"Overlay",o?"position:absolute":"").hide(),s=Z(X,"Wrapper"),t=Z(X,"Content").append(A=Z(X,"LoadedContent","width:0; height:0; overflow:hidden"),C=Z(X,"LoadingOverlay").add(Z(X,"LoadingGraphic")),D=Z(X,"Title"),E=Z(X,"Current"),G=Z(X,"Next"),H=Z(X,"Previous"),F=Z(X,"Slideshow").bind(h,bd),I=Z(X,"Close")),s.append(Z(X).append(Z(X,"TopLeft"),u=Z(X,"TopCenter"),Z(X,"TopRight")),Z(X,!1,"clear:left").append(v=Z(X,"MiddleLeft"),t,w=Z(X,"MiddleRight")),Z(X,!1,"clear:left").append(Z(X,"BottomLeft"),x=Z(X,"BottomCenter"),Z(X,"BottomRight"))).find("div div").css({"float":"left"}),B=Z(X,!1,"position:absolute; width:9999px; visibility:hidden; display:none"),J=G.add(H).add(E).add(F),a(b.body).append(q,r.append(s,B)))}function bg(){return r?(Y||(Y=!0,L=u.height()+x.height()+t.outerHeight(!0)-t.height(),M=v.width()+w.width()+t.outerWidth(!0)-t.width(),N=A.outerHeight(!0),O=A.outerWidth(!0),r.css({"padding-bottom":L,"padding-right":M}),G.click(function(){W.next()}),H.click(function(){W.prev()}),I.click(function(){W.close()}),q.click(function(){K.overlayClose&&W.close()}),a(b).bind("keydown."+f,function(a){var b=a.keyCode;S&&K.escKey&&b===27&&(a.prevenMUefault(),W.close()),S&&K.arrowKey&&y[1]&&(b===37?(a.prevenMUefault(),H.click()):b===39&&(a.prevenMUefault(),G.click()))}),a("."+g,b).live("click",function(a){a.which>1||a.shiftKey||a.altKey||a.metaKey||(a.prevenMUefault(),be(this))})),!0):!1}var d={transition:"elastic",speed:300,width:!1,initialWidth:"600",innerWidth:!1,maxWidth:!1,height:!1,initialHeight:"450",innerHeight:!1,maxHeight:!1,scalePhotos:!0,scrolling:!0,inline:!1,html:!1,iframe:!1,fastIframe:!0,photo:!1,href:!1,title:!1,rel:!1,opacity:.9,preloading:!0,current:"image {current} of {total}",previous:"previous",next:"next",close:"close",open:!1,returnFocus:!0,reposition:!0,loop:!0,slideshow:!1,slideshowAuto:!0,slideshowSpeed:2500,slideshowStart:"start slideshow",slideshowStop:"stop slideshow",onOpen:!1,onLoad:!1,onComplete:!1,onCleanup:!1,onClosed:!1,overlayClose:!0,escKey:!0,arrowKey:!0,top:!1,bottom:!1,left:!1,right:!1,fixed:!1,data:undefined},e="colorbox",f="cbox",g=f+"Element",h=f+"_open",i=f+"_load",j=f+"_complete",k=f+"_cleanup",l=f+"_closed",m=f+"_purge",n=!a.support.opacity&&!a.support.style,o=n&&!c.XMLHttpRequest,p=f+"_IE6",q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X="div",Y;if(a.colorbox)return;a(bf),W=a.fn[e]=a[e]=function(b,c){var f=this;b=b||{},bf();if(bg()){if(!f[0]){if(f.selector)return f;f=a("<a/>"),b.open=!0}c&&(b.onComplete=c),f.each(function(){a.data(this,e,a.extend({},a.data(this,e)||d,b))}).addClass(g),(a.isFunction(b.open)&&b.open.call(f)||b.open)&&be(f[0])}return f},W.position=function(a,b){function i(a){u[0].style.width=x[0].style.width=t[0].style.width=a.style.width,t[0].style.height=v[0].style.height=w[0].style.height=a.style.height}var c=0,d=0,e=r.offset(),g=z.scrollTop(),h=z.scrollLeft();z.unbind("resize."+f),r.css({top:-9e4,left:-9e4}),K.fixed&&!o?(e.top-=g,e.left-=h,r.css({position:"fixed"})):(c=g,d=h,r.css({position:"absolute"})),K.right!==!1?d+=Math.max(z.width()-K.w-O-M-_(K.right,"x"),0):K.left!==!1?d+=_(K.left,"x"):d+=Math.round(Math.max(z.width()-K.w-O-M,0)/2),K.bottom!==!1?c+=Math.max(z.height()-K.h-N-L-_(K.bottom,"y"),0):K.top!==!1?c+=_(K.top,"y"):c+=Math.round(Math.max(z.height()-K.h-N-L,0)/2),r.css({top:e.top,left:e.left}),a=r.width()===K.w+O&&r.height()===K.h+N?0:a||0,s[0].style.width=s[0].style.height="9999px",r.dequeue().animate({width:K.w+O,height:K.h+N,top:c,left:d},{duration:a,complete:function(){i(this),T=!1,s[0].style.width=K.w+O+M+"px",s[0].style.height=K.h+N+L+"px",K.reposition&&setTimeout(function(){z.bind("resize."+f,W.position)},1),b&&b()},step:function(){i(this)}})},W.resize=function(a){S&&(a=a||{},a.width&&(K.w=_(a.width,"x")-O-M),a.innerWidth&&(K.w=_(a.innerWidth,"x")),A.css({width:K.w}),a.height&&(K.h=_(a.height,"y")-N-L),a.innerHeight&&(K.h=_(a.innerHeight,"y")),!a.innerHeight&&!a.height&&(A.css({height:"auto"}),K.h=A.height()),A.css({height:K.h}),W.position(K.transition==="none"?0:K.speed))},W.prep=function(b){function g(){return K.w=K.w||A.width(),K.w=K.mw&&K.mw<K.w?K.mw:K.w,K.w}function h(){return K.h=K.h||A.height(),K.h=K.mh&&K.mh<K.h?K.mh:K.h,K.h}if(!S)return;var c,d=K.transition==="none"?0:K.speed;A.remove(),A=Z(X,"LoadedContent").append(b),A.hide().appendTo(B.show()).css({width:g(),overflow:K.scrolling?"auto":"hidden"}).css({height:h()}).prependTo(t),B.hide(),a(R).css({"float":"none"}),o&&a("select").not(r.find("select")).filter(function(){return this.style.visibility!=="hidden"}).css({visibility:"hidden"}).one(k,function(){this.style.visibility="inherit"}),c=function(){function q(){n&&r[0].style.removeAttribute("filter")}var b,c,g=y.length,h,i="frameBorder",k="allowTransparency",l,o,p;if(!S)return;l=function(){clearTimeout(V),C.hide(),bc(j,K.onComplete)},n&&R&&A.fadeIn(100),D.html(K.title).add(A).show();if(g>1){typeof K.current=="string"&&E.html(K.current.replace("{current}",Q+1).replace("{total}",g)).show(),G[K.loop||Q<g-1?"show":"hide"]().html(K.next),H[K.loop||Q?"show":"hide"]().html(K.previous),K.slideshow&&F.show();if(K.preloading){b=[$(-1),$(1)];while(c=y[b.pop()])o=a.data(c,e).href||c.href,a.isFunction(o)&&(o=o.call(c)),ba(o)&&(p=new Image,p.src=o)}}else J.hide();K.iframe?(h=Z("iframe")[0],i in h&&(h[i]=0),k in h&&(h[k]="true"),h.name=f+ +(new Date),K.fastIframe?l():a(h).one("load",l),h.src=K.href,K.scrolling||(h.scrolling="no"),a(h).addClass(f+"Iframe").appendTo(A).one(m,function(){h.src="//about:blank"})):l(),K.transition==="fade"?r.fadeTo(d,1,q):q()},K.transition==="fade"?r.fadeTo(d,0,function(){W.position(0,c)}):W.position(d,c)},W.load=function(b){var c,d,e=W.prep;T=!0,R=!1,P=y[Q],b||bb(),bc(m),bc(i,K.onLoad),K.h=K.height?_(K.height,"y")-N-L:K.innerHeight&&_(K.innerHeight,"y"),K.w=K.width?_(K.width,"x")-O-M:K.innerWidth&&_(K.innerWidth,"x"),K.mw=K.w,K.mh=K.h,K.maxWidth&&(K.mw=_(K.maxWidth,"x")-O-M,K.mw=K.w&&K.w<K.mw?K.w:K.mw),K.maxHeight&&(K.mh=_(K.maxHeight,"y")-N-L,K.mh=K.h&&K.h<K.mh?K.h:K.mh),c=K.href,V=setTimeout(function(){C.show()},100),K.inline?(Z(X).hide().insertBefore(a(c)[0]).one(m,function(){a(this).replaceWith(A.children())}),e(a(c))):K.iframe?e(" "):K.html?e(K.html):ba(c)?(a(R=new Image).addClass(f+"Photo").error(function(){K.title=!1,e(Z(X,"Error").text("This image could not be loaded"))}).load(function(){var a;R.onload=null,K.scalePhotos&&(d=function(){R.height-=R.height*a,R.width-=R.width*a},K.mw&&R.width>K.mw&&(a=(R.width-K.mw)/R.width,d()),K.mh&&R.height>K.mh&&(a=(R.height-K.mh)/R.height,d())),K.h&&(R.style.marginTop=Math.max(K.h-R.height,0)/2+"px"),y[1]&&(K.loop||y[Q+1])&&(R.style.cursor="pointer",R.onclick=function(){W.next()}),n&&(R.style.msInterpolationMode="bicubic"),setTimeout(function(){e(R)},1)}),setTimeout(function(){R.src=c},1)):c&&B.load(c,K.data,function(b,c,d){e(c==="error"?Z(X,"Error").text("Request unsuccessful: "+d.statusText):a(this).contents())})},W.next=function(){!T&&y[1]&&(K.loop||y[Q+1])&&(Q=$(1),W.load())},W.prev=function(){!T&&y[1]&&(K.loop||Q)&&(Q=$(-1),W.load())},W.close=function(){S&&!U&&(U=!0,S=!1,bc(k,K.onCleanup),z.unbind("."+f+" ."+p),q.fadeTo(200,0),r.stop().fadeTo(300,0,function(){r.add(q).css({opacity:1,cursor:"auto"}).hide(),bc(m),A.remove(),setTimeout(function(){U=!1,bc(l,K.onClosed)},1)}))},W.remove=function(){a([]).add(r).add(q).remove(),r=null,a("."+g).removeData(e).removeClass(g).die()},W.element=function(){return a(P)},W.settings=d})(jQuery,document,this);

function checkEmail(obj)
{
	if(!/(\,|^)([\w+._]+@\w+\.(\w+\.){0,3}\w{2,4})/.test(obj.val().replace(/-|\//g,""))){obj.focus();
	alert('Please enter a valid email address.');return false;}else{return true;}
}


;(function(a,b,c){"use strict";var d=b.event,e;d.special.smartresize={setup:function(){b(this).bind("resize",d.special.smartresize.handler)},teardown:function(){b(this).unbind("resize",d.special.smartresize.handler)},handler:function(a,b){var c=this,d=arguments;a.type="smartresize",e&&clearTimeout(e),e=setTimeout(function(){jQuery.event.handle.apply(c,d)},b==="execAsap"?0:100)}},b.fn.smartresize=function(a){return a?this.bind("smartresize",a):this.trigger("smartresize",["execAsap"])},b.Mason=function(a,c){this.element=b(c),this._create(a),this._init()},b.Mason.settings={isResizable:!0,isAnimated:!1,animationOptions:{queue:!1,duration:500},gutterWidth:0,isRTL:!1,isFitWidth:!1,containerStyle:{position:"relative"}},b.Mason.prototype={_filterFindBricks:function(a){var b=this.options.itemSelector;return b?a.filter(b).add(a.find(b)):a},_getBricks:function(a){var b=this._filterFindBricks(a).css({position:"absolute"}).addClass("masonry-brick");return b},_create:function(c){this.options=b.extend(!0,{},b.Mason.settings,c),this.styleQueue=[];var d=this.element[0].style;this.originalStyle={height:d.height||""};var e=this.options.containerStyle;for(var f in e)this.originalStyle[f]=d[f]||"";this.element.css(e),this.horizontalDirection=this.options.isRTL?"right":"left",this.offset={x:parseInt(this.element.css("padding-"+this.horizontalDirection),10),y:parseInt(this.element.css("padding-top"),10)},this.isFluid=this.options.columnWidth&&typeof this.options.columnWidth=="function";var g=this;setTimeout(function(){g.element.addClass("masonry")},0),this.options.isResizable&&b(a).bind("smartresize.masonry",function(){g.resize()}),this.reloadItems()},_init:function(a){this._getColumns(),this._reLayout(a)},option:function(a,c){b.isPlainObject(a)&&(this.options=b.extend(!0,this.options,a))},layout:function(a,b){for(var c=0,d=a.length;c<d;c++)this._placeBrick(a[c]);var e={};e.height=Math.max.apply(Math,this.colYs);if(this.options.isFitWidth){var f=0;c=this.cols;while(--c){if(this.colYs[c]!==0)break;f++}e.width=(this.cols-f)*this.columnWidth-this.options.gutterWidth}this.styleQueue.push({$el:this.element,style:e});var g=this.isLaidOut?this.options.isAnimated?"animate":"css":"css",h=this.options.animationOptions,i;for(c=0,d=this.styleQueue.length;c<d;c++)i=this.styleQueue[c],i.$el[g](i.style,h);this.styleQueue=[],b&&b.call(a),this.isLaidOut=!0},_getColumns:function(){var a=this.options.isFitWidth?this.element.parent():this.element,b=a.width();this.columnWidth=this.isFluid?this.options.columnWidth(b):this.options.columnWidth||this.$bricks.outerWidth(!0)||b,this.columnWidth+=this.options.gutterWidth,this.cols=Math.floor((b+this.options.gutterWidth)/this.columnWidth),this.cols=Math.max(this.cols,1)},_placeBrick:function(a){var c=b(a),d,e,f,g,h;d=Math.ceil(c.outerWidth(!0)/(this.columnWidth+this.options.gutterWidth)),d=Math.min(d,this.cols);if(d===1)f=this.colYs;else{e=this.cols+1-d,f=[];for(h=0;h<e;h++)g=this.colYs.slice(h,h+d),f[h]=Math.max.apply(Math,g)}var i=Math.min.apply(Math,f),j=0;for(var k=0,l=f.length;k<l;k++)if(f[k]===i){j=k;break}var m={top:i+this.offset.y};m[this.horizontalDirection]=this.columnWidth*j+this.offset.x,this.styleQueue.push({$el:c,style:m});var n=i+c.outerHeight(!0),o=this.cols+1-l;for(k=0;k<o;k++)this.colYs[j+k]=n},resize:function(){var a=this.cols;this._getColumns(),(this.isFluid||this.cols!==a)&&this._reLayout()},_reLayout:function(a){var b=this.cols;this.colYs=[];while(b--)this.colYs.push(0);this.layout(this.$bricks,a)},reloadItems:function(){this.$bricks=this._getBricks(this.element.children())},reload:function(a){this.reloadItems(),this._init(a)},appended:function(a,b,c){if(b){this._filterFindBricks(a).css({top:this.element.height()});var d=this;setTimeout(function(){d._appended(a,c)},1)}else this._appended(a,c)},_appended:function(a,b){var c=this._getBricks(a);this.$bricks=this.$bricks.add(c),this.layout(c,b)},remove:function(a){this.$bricks=this.$bricks.not(a),a.remove()},destroy:function(){this.$bricks.removeClass("masonry-brick").each(function(){this.style.position="",this.style.top="",this.style.left=""});var c=this.element[0].style;for(var d in this.originalStyle)c[d]=this.originalStyle[d];this.element.unbind(".masonry").removeClass("masonry").removeData("masonry"),b(a).unbind(".masonry")}},b.fn.imagesLoaded=function(a){function i(a){var c=a.target;c.src!==f&&b.inArray(c,g)===-1&&(g.push(c),--e<=0&&(setTimeout(h),d.unbind(".imagesLoaded",i)))}function h(){a.call(c,d)}var c=this,d=c.find("img").add(c.filter("img")),e=d.length,f="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",g=[];e||h(),d.bind("load.imagesLoaded error.imagesLoaded",i).each(function(){var a=this.src;this.src=f,this.src=a});return c};var f=function(b){a.console&&a.console.error(b)};b.fn.masonry=function(a){if(typeof a=="string"){var c=Array.prototype.slice.call(arguments,1);this.each(function(){var d=b.data(this,"masonry");if(!d)f("cannot call methods on masonry prior to initialization; attempted to call method '"+a+"'");else{if(!b.isFunction(d[a])||a.charAt(0)==="_"){f("no such method '"+a+"' for masonry instance");return}d[a].apply(d,c)}})}else this.each(function(){var c=b.data(this,"masonry");c?(c.option(a||{}),c._init()):b.data(this,"masonry",new b.Mason(a,this))});return this}})(window,jQuery);

/*
(function(window,$,undefined){$.infinitescroll=function infscr(options,callback,element){this.element=$(element);this._create(options,callback);};$.infinitescroll.defaults={loading:{finished:undefined,finishedMsg:"<em>Congratulations, you've reached the end of the internet.</em>",img:"http://www.infinite-scroll.com/loading.gif",msg:null,msgText:"<em>Loading the next set of posts...</em>",selector:null,speed:'fast',start:undefined},state:{isDuringAjax:false,isInvalidPage:false,isDestroyed:false,isDone:false,isPaused:false,currPage:1},callback:undefined,debug:false,behavior:undefined,binder:$(window),nextSelector:"div.navigation a:first",navSelector:"div.navigation",contentSelector:null,extraScrollPx:150,itemSelector:"div.post",animate:false,pathParse:undefined,dataType:'html',appendCallback:true,bufferPx:40,errorCallback:function(){},infid:0,pixelsFromNavToBottom:undefined,path:undefined};$.infinitescroll.prototype={_binding:function infscr_binding(binding){var instance=this,opts=instance.options;if(!!opts.behavior&&this['_binding_'+opts.behavior]!==undefined){this['_binding_'+opts.behavior].call(this);return;}
if(binding!=='bind'&&binding!=='unbind'){this._debug('Binding value  '+binding+' not valid')
return false;}
if(binding=='unbind'){(this.options.binder).unbind('smartscroll.infscr.'+instance.options.infid);}else{(this.options.binder)[binding]('smartscroll.infscr.'+instance.options.infid,function(){instance.scroll();});};this._debug('Binding',binding);},_create:function infscr_create(options,callback){if(!this._validate(options)){return false;}
var opts=this.options=$.extend(true,{},$.infinitescroll.defaults,options),relurl=/(.*?\/\/).*?(\/.*)/,path=$(opts.nextSelector).attr('href');opts.contentSelector=opts.contentSelector||this.element;opts.loading.selector=opts.loading.selector||opts.contentSelector;if(!path){this._debug('Navigation selector not found');return;}
opts.path=this._determinepath(path);opts.loading.msg=$('<div id="infscr-loading"><img alt="Loading..." src="'+opts.loading.img+'" /><div>'+opts.loading.msgText+'</div></div>');(new Image()).src=opts.loading.img;opts.pixelsFromNavToBottom=$(document).height()-$(opts.navSelector).offset().top;opts.loading.start=opts.loading.start||function(){$(opts.navSelector).hide();opts.loading.msg.appendTo(opts.loading.selector).show(opts.loading.speed,function(){beginAjax(opts);});};opts.loading.finished=opts.loading.finished||function(){opts.loading.msg.fadeOut('normal');};opts.callback=function(instance,data){if(!!opts.behavior&&instance['_callback_'+opts.behavior]!==undefined){instance['_callback_'+opts.behavior].call($(opts.contentSelector)[0],data);}
if(callback){callback.call($(opts.contentSelector)[0],data);}};this._setup();},_debug:function infscr_debug(){if(this.options.debug){return window.console&&console.log.call(console,arguments);}},_determinepath:function infscr_determinepath(path){var opts=this.options;if(!!opts.behavior&&this['_determinepath_'+opts.behavior]!==undefined){this['_determinepath_'+opts.behavior].call(this,path);return;}
if(!!opts.pathParse){this._debug('pathParse manual');return opts.pathParse;}else if(path.match(/^(.*?)\b2\b(.*?$)/)){path=path.match(/^(.*?)\b2\b(.*?$)/).slice(1);}else if(path.match(/^(.*?)2(.*?$)/)){if(path.match(/^(.*?page=)2(\/.*|$)/)){path=path.match(/^(.*?page=)2(\/.*|$)/).slice(1);return path;}
path=path.match(/^(.*?)2(.*?$)/).slice(1);}else{if(path.match(/^(.*?page=)1(\/.*|$)/)){path=path.match(/^(.*?page=)1(\/.*|$)/).slice(1);return path;}else{this._debug('Sorry, we couldn\'t parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com.');opts.state.isInvalidPage=true;}}
this._debug('determinePath',path);return path;},_error:function infscr_error(xhr){var opts=this.options;if(!!opts.behavior&&this['_error_'+opts.behavior]!==undefined){this['_error_'+opts.behavior].call(this,xhr);return;}
if(xhr!=='destroy'&&xhr!=='end'){xhr='unknown';}
this._debug('Error',xhr);if(xhr=='end'){this._showdonemsg();}
opts.state.isDone=true;opts.state.currPage=1;opts.state.isPaused=false;this._binding('unbind');},_loadcallback:function infscr_loadcallback(box,data){var opts=this.options,callback=this.options.callback,result=(opts.state.isDone)?'done':(!opts.appendCallback)?'no-append':'append',frag;if(!!opts.behavior&&this['_loadcallback_'+opts.behavior]!==undefined){this['_loadcallback_'+opts.behavior].call(this,box,data);return;}
switch(result){case'done':this._showdonemsg();return false;break;case'no-append':if(opts.dataType=='html'){data='<div>'+data+'</div>';data=$(data).find(opts.itemSelector);};break;case'append':var children=box.children();if(children.length==0){return this._error('end');}
frag=document.createDocumentFragment();while(box[0].firstChild){frag.appendChild(box[0].firstChild);}
this._debug('contentSelector',$(opts.contentSelector)[0])
$(opts.contentSelector)[0].appendChild(frag);data=children.get();break;}
opts.loading.finished.call($(opts.contentSelector)[0],opts)
if(opts.animate){var scrollTo=$(window).scrollTop()+$('#infscr-loading').height()+opts.extraScrollPx+'px';$('html,body').animate({scrollTop:scrollTo},800,function(){opts.state.isDuringAjax=false;});}
if(!opts.animate)opts.state.isDuringAjax=false;callback(this,data);},_nearbottom:function infscr_nearbottom(){var opts=this.options,pixelsFromWindowBottomToBottom=0+$(document).height()-(opts.binder.scrollTop())-$(window).height();if(!!opts.behavior&&this['_nearbottom_'+opts.behavior]!==undefined){this['_nearbottom_'+opts.behavior].call(this);return;}
this._debug('math:',pixelsFromWindowBottomToBottom,opts.pixelsFromNavToBottom);return(pixelsFromWindowBottomToBottom-opts.bufferPx<opts.pixelsFromNavToBottom);},_pausing:function infscr_pausing(pause){var opts=this.options;if(!!opts.behavior&&this['_pausing_'+opts.behavior]!==undefined){this['_pausing_'+opts.behavior].call(this,pause);return;}
if(pause!=='pause'&&pause!=='resume'&&pause!==null){this._debug('Invalid argument. Toggling pause value instead');};pause=(pause&&(pause=='pause'||pause=='resume'))?pause:'toggle';switch(pause){case'pause':opts.state.isPaused=true;break;case'resume':opts.state.isPaused=false;break;case'toggle':opts.state.isPaused=!opts.state.isPaused;break;}
this._debug('Paused',opts.state.isPaused);return false;},_setup:function infscr_setup(){var opts=this.options;if(!!opts.behavior&&this['_setup_'+opts.behavior]!==undefined){this['_setup_'+opts.behavior].call(this);return;}
this._binding('bind');return false;},_showdonemsg:function infscr_showdonemsg(){var opts=this.options;if(!!opts.behavior&&this['_showdonemsg_'+opts.behavior]!==undefined){this['_showdonemsg_'+opts.behavior].call(this);return;}
opts.loading.msg.find('img').hide().parent().find('div').html(opts.loading.finishedMsg).animate({opacity:1},2000,function(){$(this).parent().fadeOut('normal');});opts.errorCallback.call($(opts.contentSelector)[0],'done');},_validate:function infscr_validate(opts){for(var key in opts){if(key.indexOf&&key.indexOf('Selector')>-1&&$(opts[key]).length===0){this._debug('Your '+key+' found no elements.');return false;}
return true;}},bind:function infscr_bind(){this._binding('bind');},destroy:function infscr_destroy(){this.options.state.isDestroyed=true;return this._error('destroy');},pause:function infscr_pause(){this._pausing('pause');},resume:function infscr_resume(){this._pausing('resume');},retrieve:function infscr_retrieve(pageNum){var instance=this,opts=instance.options,path=opts.path,box,frag,desturl,method,condition,pageNum=pageNum||null,getPage=(!!pageNum)?pageNum:opts.state.currPage;beginAjax=function infscr_ajax(opts){opts.state.currPage++;instance._debug('heading into ajax',path);box=$(opts.contentSelector).is('table')?$('<tbody/>'):$('<div/>');desturl=path.join(opts.state.currPage);method=(opts.dataType=='html'||opts.dataType=='json')?opts.dataType:'html+callback';if(opts.appendCallback&&opts.dataType=='html')method+='+callback'
switch(method){case'html+callback':instance._debug('Using HTML via .load() method');box.load(desturl+' '+opts.itemSelector,null,function infscr_ajax_callback(responseText){instance._loadcallback(box,responseText);});break;case'html':case'json':instance._debug('Using '+(method.toUpperCase())+' via $.ajax() method');$.ajax({url:desturl,dataType:opts.dataType,complete:function infscr_ajax_callback(jqXHR,textStatus){condition=(typeof(jqXHR.isResolved)!=='undefined')?(jqXHR.isResolved()):(textStatus==="success"||textStatus==="notmodified");(condition)?instance._loadcallback(box,jqXHR.responseText):instance._error('end');}});break;}};if(!!opts.behavior&&this['retrieve_'+opts.behavior]!==undefined){this['retrieve_'+opts.behavior].call(this,pageNum);return;}
if(opts.state.isDestroyed){this._debug('Instance is destroyed');return false;};opts.state.isDuringAjax=true;opts.loading.start.call($(opts.contentSelector)[0],opts);},scroll:function infscr_scroll(){var opts=this.options,state=opts.state;if(!!opts.behavior&&this['scroll_'+opts.behavior]!==undefined){this['scroll_'+opts.behavior].call(this);return;}
if(state.isDuringAjax||state.isInvalidPage||state.isDone||state.isDestroyed||state.isPaused)return;if(!this._nearbottom())return;this.retrieve();},toggle:function infscr_toggle(){this._pausing();},unbind:function infscr_unbind(){this._binding('unbind');},update:function infscr_options(key){if($.isPlainObject(key)){this.options=$.extend(true,this.options,key);}}}
$.fn.infinitescroll=function infscr_init(options,callback){var thisCall=typeof options;switch(thisCall){case'string':var args=Array.prototype.slice.call(arguments,1);this.each(function(){var instance=$.data(this,'infinitescroll');if(!instance){return false;}
if(!$.isFunction(instance[options])||options.charAt(0)==="_"){return false;}
instance[options].apply(instance,args);});break;case'object':this.each(function(){var instance=$.data(this,'infinitescroll');if(instance){instance.update(options);}else{$.data(this,'infinitescroll',new $.infinitescroll(options,callback,this));}});break;}
return this;};var event=$.event,scrollTimeout;event.special.smartscroll={setup:function(){$(this).bind("scroll",event.special.smartscroll.handler);},teardown:function(){$(this).unbind("scroll",event.special.smartscroll.handler);},handler:function(event,execAsap){var context=this,args=arguments;event.type="smartscroll";if(scrollTimeout){clearTimeout(scrollTimeout);}
scrollTimeout=setTimeout(function(){$.event.handle.apply(context,args);},execAsap==="execAsap"?0:100);}};$.fn.smartscroll=function(fn){return fn?this.bind("smartscroll",fn):this.trigger("smartscroll",["execAsap"]);};})(window,jQuery);*/

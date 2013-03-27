var isOpera = $.browser.opera, isIE = $.browser.msie, isMoz = $.browser.mozilla;
if (isIE) {
	try {
		document.execCommand("BackgroundImageCache", false, true);
	} catch (e) {}
}
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend( jQuery.easing,
{
	
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
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
	Tool : {
		wordStrength : function (w){
			//return w.replace(/^(?:([a-z])|([A-Z])|([0-9])|([^\w]))/g, "$1$2$3$4$5").length; 
			var strength = 0;			
			if(/\d/.test(w) && w.length > 5){
				strength++;
			}
			if(/[a-zA-Z]/.test(w) && w.length > 5){
				strength++;
			}
			if(/[^\w]/.test(w) && w.length > 5){
				strength++;
			}
			return strength;
			
		}
	}
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
			//return false
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
		l.stop(false,true).animate({
			left: -s * n
		}, _this.duration * _this.clickSpeed,'easeOutExpo', function() {
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
			//return false
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
		l.stop(false,true).animate({
			left: -s * n
		}, _this.duration * _this.clickSpeed, 'easeOutExpo',function() {
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

MU.Tool.ImgScroller = function(options){
	this.el = options.el || null;
	this.duration = options.duration || 50;
	this.timer = null;
	this.direction = options.direction || 'horizontal';//vertical
	this.init();
}
MU.Tool.ImgScroller.prototype = {
	init : function (){

		if(!this.el) return;
		var _el = this.el,_this = this;
		if ( _this.direction == 'horizontal' ) {
			var w = _el.find('li').length * (_el.find('li:first').width() + 24);
			_el.find('ul').css({'position':'absolute','width': w + 'px'});
			if(w - 24 <= _el.width()){
				return;
			}
		}else{
			var h = _el.find('li').length * (_el.find('li:first').height());
			_el.find('ul').css({'position':'absolute','height': w + 'px'});
			if(h <= _el.height()){
				return;
			}
		}
		this.el.find('ul').mouseover(function(){
			_this.pause();
		}).mouseout(function(){
			_this.start();
		});
		this.start();
	},
	start : function(){
		var _this = this;
		_this.pause();
		_this.timer = setInterval(function(){
			_this.move();
		},_this.duration);
		
	},
	pause : function(){
		clearInterval(this.timer);
	},
	move : function(){
		var _this = this,box = _this.el.find('ul'),left = box.position().left,top = box.position().top;
		if ( _this.direction == 'horizontal' ) {
			box.css('left',(left-=3) + 'px');
			if(Math.abs(left) > box.find('li:first').width() + 5){
				box.find('li:first').insertAfter(box.find('li:last'));
				box.css('left','0px');
			}
		}else{
			box.css('top',(top-=3) + 'px');
			if(Math.abs(top) > box.find('li:first').height()){
				box.find('li:first').insertAfter(box.find('li:last'));
				box.css('top','0px');
			}
		}
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
		return modName.replace(/\d/g,'');
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
		
		$('.cmp-loading').ajaxStart(function(){
			$(this).fadeIn();
		});
		$(".cmp-loading").ajaxSuccess(function(evt, request, settings){
		   $(this).fadeOut();
		});

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
		
		
	},
	PValidate : function (el) {
		var elements = el.is('form') ? el.find(':input[validate]') : el,ok = true;
		var check = function (type,value){
			var type = type.match(/(\w+)(\[(.+)\]$)?/);
			var limit = type[3];
			switch(type[1]){
				case 'require' :
					return value.replace(/^\s+|\s+$/,'') != '';
				break;
				case 'num' :
					return /^\d+$/.test(value);
				break;
				case 'len' :
					return value.length == limit;
				break;
				case 'email' :
					return /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i.test(value);
				break;
				case 'eq' :
					return value == $(':input[name=' +limit +']').val();
				break;
				case 'gt' :
					return value.length > limit;
				break;
				case 'reg':
					return new RegExp(limit).test(value);
				break;
			}
		}
		elements.each(function () {
			var arr = $(this).attr('validate').split(/\s/);
			$(this).siblings('.err-msg').remove();
			for(var i = 0,len =arr.length;i< len; i++){
				var a = arr[i].split('|'),b = $(this);
				if(!check(a[0],b.val())){
					b.parent().append('<p class="err-msg">'+a[1]+'</p>');
					ok = false;
					break;
				}
			}
		});
		return !!ok;
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


(function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function j(){var b=0;g.each(function(){var c=a(this);if(i.skip_invisible&&!c.is(":visible"))return;if(!a.abovethetop(this,i)&&!a.leftofbegin(this,i))if(!a.belowthefold(this,i)&&!a.rightoffold(this,i))c.trigger("appear"),b=0;else if(++b>i.failure_limit)return!1})}var g=this,h,i={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(i,f)),h=i.container===d||i.container===b?e:a(i.container),0===i.event.indexOf("scroll")&&h.bind(i.event,function(a){return j()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(i.appear){var d=g.length;i.appear.call(b,d,i)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(i.data_attribute))[i.effect](i.effect_speed),b.loaded=!0;var d=a.grep(g,function(a){return!a.loaded});g=a(d);if(i.load){var e=g.length;i.load.call(b,e,i)}}).attr("src",c.data(i.data_attribute))}}),0!==i.event.indexOf("scroll")&&c.bind(i.event,function(a){b.loaded||c.trigger("appear")})}),e.bind("resize",function(a){j()}),/iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent.persisted&&g.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){j()}),this},a.belowthefold=function(c,f){var g;return f.container===d||f.container===b?g=e.height()+e.scrollTop():g=a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return f.container===d||f.container===b?g=e.width()+e.scrollLeft():g=a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return f.container===d||f.container===b?g=e.scrollTop():g=a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return f.container===d||f.container===b?g=e.scrollLeft():g=a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!a.rightoffold(b,c)&&!a.leftofbegin(b,c)&&!a.belowthefold(b,c)&&!a.abovethetop(b,c)},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})})(jQuery,window,document);






(function ($) {
    $.fn.listbox = function (options) {
        var self = this;
        var el = self.get(0);
        if (typeof options == 'string') {
            var list = el.list;
            if (options in list) {
                var args = $.makeArray(arguments).slice(1);
                return list[options].apply(list, args);
            } else {
                throw 'clever listbox not contains such function';
            }
        }
        function build() {
            return $.extend({
                removeItem: el.list ? $.proxy(el.list.removeItem, el.list) : null,
                addRange: el.list ? $.proxy(el.list.addRange, el.list) : null,
                addItem: el.list ? $.proxy(el.list.addItem, el.list) : null,
                removeRange: el.list ? $.proxy(el.list.removeRange, el.list) : null,
                getDatas: el.list ? $.proxy(el.list.getDatas, el.list) : null,
                getData: el.list ? $.proxy(el.list.getData, el.list) : null,
                clear: el.list ? $.proxy(el.list.clear, el.list) : null,
                getSelected: el.list ? $.proxy(el.list.getSelected, el.list) : null,
                setSelection: el.list ? $.proxy(el.list.setSelection, el.list) : null,
                reload: el.list ? $.proxy(el.list.reload, el.list) : null
            }, self);
        }
        function fillData(data, ajaxsettings) {
            if (data) {
                if (typeof data == 'string') {
                    if (data.indexOf("?") != -1) {
                        data = data + "&" + new Date().getTime();
                    } else {
                        data = data + "?" + new Date().getTime();
                    }
                    $.ajax(data, $.extend({
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var list = el.list;
                            list.addRange(data);
                        }
                    }, ajaxsettings));
                } else {
                    list.addRange(data);
                }
            }
        }
        if (el.list) { return build(); }
        var defaults = {
            dnd: false,
            dndscope: new Date().getTime(),
            height: 'auto',
            width: 'auto',
            data: [],
            multiselect: false,
            ajaxsettings: {},
            selectchange: function (data) {return false; }
        };
        var options = $.extend(defaults, options || {});
        var ts = $(el);
        var list = {
            p: options,
            addRange: function (data) {
                for (var i = 0; i < data.length; i++) {
                    this.addItem(data[i]);
                }
            },
            selected: function () { return list.p.selectchange; },
            addItem: function (data) {
                var finallyData = data;
                if (data instanceof Array || (!('value' in data) || (!'text' in data))) {
                    finallyData.value = data[0];
                    finallyData.text = data[1];
                }
                var item = $('<li class="ui-menu-item ui-corner-all"><a id="' + finallyData.value + '" class="ui-corner-all" tabindex="-1">' + finallyData.text + '</a>');
                ts.append(item);
                $('a', item).click(function () {
                    var a = $(this);
                    var e = arguments[0] || window.event;
                    var parent = item.parent();
                    var items = $('>li', parent);
                    if (list.p.multiselect && e.ctrlKey) {
                        if (a.hasClass('ui-state-active')) {
                            a.removeClass('ui-state-active');
                        } else {
                            a.addClass('ui-state-active');
                        }
                    } else {
                        var selectedItem = $('a.ui-state-active', parent).parent();
                        $('a', parent).removeClass('ui-state-active');
                        if (selectedItem.size() == 0 || items.index(selectedItem) != items.index(item)) {
                            a.addClass('ui-state-active');
                        }
                    }
                    a.blur();
                    var current = $(this).parents('ul:first').get(0).list;
                    current.selected()(current.getSelected());
                })
                .mouseover(function () {
                    if (!$(this).hasClass('ui-state-active')) {
                        $(this).addClass('ui-state-hover');
                    }
                }).mouseout(function () {
                    $(this).removeClass('ui-state-hover');
                });
                if (list.p.dnd) {
                    item.draggable({
                        opacity: .5,
                        addClasses: false,
                        helper: 'clone',
                        cursor: 'move',
                        scope: list.p.dndscope,
                        drag: function (event, ui) {
                            $(this).parent().find('a').removeClass('ui-state-active');
                            ui.helper.width($(this).width());
                            $('a', ui.helper).attr('class', '').css('border-style', 'dashed').css('border-width', 'thin').css('font-weight', 'normal');
                        }
                    });
                    item.droppable({
                        scope: list.p.dndscope,
                        tolerance: 'pointer',
                        over: function (event, ui) {
                            var li = $(this);
                            if (li.find('.ui-icon-arrow-1-e').size() == 0) {
                                $('>a:first', li).prepend('<span class="ui-icon ui-icon-arrow-1-e"></span>');
                            }
                        },
                        out: function (event, ui) {
                            $('.ui-icon-arrow-1-e').remove();
                        },
                        drop: function (event, ui) {
                            $(this).before(ui.draggable);
                        },
                        deactivate: function (event, ui) {
                            $('.ui-icon-arrow-1-e').remove();
                        }
                    });
                }
            },
            removeRange: function (data) {
                if (data && data instanceof Array) {
                    for (var i = 0; i < data.length; i++) {
                        this.removeItem(data[i]);
                    }
                }
            },
            removeItem: function (data) {
                var key = data;
                if (data instanceof jQuery) {
                    key = this.getData(data).value;
                }
                else if (typeof data == 'object') {
                    key = data.value;
                }
                ts.find('a[id="' + key + '"]').remove();
            },
            getData: function (a) {
                if (a) {
                    if (!(a instanceof jQuery)) {
                        a = $(a);
                    }
                    return { value: a.attr('id'), text: a.text() };
                } else {
                    return null;
                }
            },
            getSelected: function () {
                var selected = $('a.ui-state-active', ts);
                var result = [];
                selected.each(function () {
                    result.push(list.getData(this));
                });
                return result;
            },
            getDatas: function () {
                var result = [];
                $('>li>a:first-child', ts).each(function () {
                    result.push(list.getData(this));
                });
                return result;
            },
            setSelection: function (value) {
                $('a', ts).removeClass('ui-state-active').parent().css('margin-top', '');
                $('a[id="' + value + '"]', ts).addClass('ui-state-active');
            },
            clear: function () {
                ts.empty();
            },
            reload: function (options) {
                list.p = $.extend(list.p, options || {});
                list.clear();
                fillData(list.p.data, list.p.ajaxsettings);
            }
        }
        el.list = list;
        self.addClass('cleverlistbox ui-menu ui-widget ui-widget-content ui-corner-all');
        if (typeof list.p.height == 'number' || (typeof list.p.height != 'string' && list.p.height.toLowerCase() != 'auto')) {
            self.css('overflow-y', 'auto');
            self.css('overflow-x', 'hidden');
            self.height(list.p.height);
        }
        if (typeof list.p.width == 'number' || (typeof list.p.width != 'string' && list.p.width.toLowerCase() != 'auto')) {
            self.width(list.p.width);
        } else {
            self.width(self.parent().width() - 2);
        }
        fillData(list.p.data, list.p.ajaxsettings);
        ts.droppable({
            scope: list.p.dndscope,
            tolerance: 'pointer',
            over: function (event, ui) {
                if ($('>li', $(this)).size() == 0) {
                    $(this).addClass('ui-state-highlight');
                }
            },
            out: function (event, ui) {
                $(this).removeClass('ui-state-highlight');
            },
            drop: function (event, ui) {
                var insert = $(this).find('.ui-icon-arrow-1-e').parents('li:first');
                if (insert.size() > 0) {
                    insert.before(ui.draggable);
                } else {
                    $(this).append(ui.draggable);
                }
            },
            deactivate: function (event, ui) {
                $(this).removeClass('ui-state-highlight');
            }
        });
        return build();
    }
})(jQuery);


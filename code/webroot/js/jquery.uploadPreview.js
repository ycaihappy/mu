//版本：1.0

//说明：图片上传预览插件
//上传的时候可以生成固定宽高范围内的等比例缩放图

//参数设置：
//width                     存放图片固定大小容器的宽
//height                    存放图片固定大小容器的高
//imgDiv                    页面DIV的JQuery的id
//imgType                   数组后缀名
//**********************图片上传预览插件*************************
(function ($) {
	jQuery.fn.extend({
		uploadPreview : function (opts) {
			opts = jQuery.extend({
					width : 0,
					height : 0,
					imgDiv : "#imgDiv",
					imgType : ["gif", "jpeg", "jpg", "bmp", "png"],
					callback : function () {
						return false;
					}
				}, opts || {});
			return this.each(function () {
				var _this = $(this);
				var self = this;
				var imgDiv = typeof opts.imgDiv == 'string' ? $(opts.imgDiv) : opts.imgDiv;
				imgDiv.width(opts.width);
				imgDiv.height(opts.height);
				
				self.autoScaling = function () {
					
					if ($.browser.msie)
						imgDiv.get(0).filters.item("DXImageTransform.Microsoft.AlphaImageLoader").sizingMethod = "image";
					var img_width = imgDiv.width();
					var img_height = imgDiv.height();
					
					if (img_width > 0 && img_height > 0) {
						
						var rate = (opts.width / img_width < opts.height / img_height) ? opts.width / img_width : opts.height / img_height;
						if (rate <= 1) {
							if ($.browser.msie)
								imgDiv.get(0).filters.item("DXImageTransform.Microsoft.AlphaImageLoader").sizingMethod = "scale";
							imgDiv.css({
								width : img_width * rate,
								height : img_height * rate
							});
							//  imgDiv.height(img_height * rate);
						} else {
							
							imgDiv.width(img_width);
							imgDiv.height(img_height);
						}
						
						var left = (opts.width - imgDiv.width()) * 0.5;
						var top = (opts.height - imgDiv.height()) * 0.5;
						
						imgDiv.css({
							"margin-left" : left,
							"margin-top" : top
						});
						imgDiv.show();
					}
				}
				_this.change(function () {
					
					if (this.value) {
						if (!RegExp("\.(" + opts.imgType.join("|") + ")$", "i").test(this.value.toLowerCase())) {
							alert("图片类型必须是" + opts.imgType.join("，") + "中的一种");
							this.value = "";
							return false;
						}
						
						imgDiv.hide();
						if ($.browser.msie) {
							if ($.browser.version == "6.0") {
								var img = $("<img />");
								imgDiv.replaceWith(img);
								imgDiv = img;
								
								var image = new Image();
								image.src = 'file:///' + this.value;
								
								imgDiv.attr('src', image.src);
								self.autoScaling();
							} else {
								imgDiv.css({
									filter : "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image)"
								});
								imgDiv.get(0).filters.item("DXImageTransform.Microsoft.AlphaImageLoader").sizingMethod = "image";
								try {
									
									imgDiv.get(0).filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = this.value;
								} catch (e) {
									var file_upl = imgDiv.siblings('input[type=file]');
									file_upl.select();
									var realpath = document.selection.createRange().text;				
									imgDiv.get(0).filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = realpath;
									//alert("无效的图片文件！");
									//return;
								}
								setTimeout(function () {
									self.autoScaling();
								}, 100);
								
							}
						} else {
							
							var img = $("<img />");
							imgDiv.replaceWith(img);
							imgDiv = img;
							var reader = new FileReader();
							reader.readAsDataURL(this.files[0]);
							
							reader.onload = function () {
								imgDiv.attr('src', reader.result);
								imgDiv.css({
									"vertical-align" : "middle"
								});
								setTimeout(function () {
									self.autoScaling();
								}, 1000);
							}
							
						}
					}
				});
			});
			
		}
	});
})(jQuery);

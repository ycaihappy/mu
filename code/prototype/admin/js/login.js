var login = {

	init : function () {
		var _this = this;
		$('#signIn').click(function(){
			$('.showError').remove();
			var userId = $('#userId').val(),
				userPwd = $('#userPwd').val();
			if (!_this.loginVerification('userId', '用户名不能为空')) return false;
			if (!_this.loginVerification('userPwd', '密码不能为空')) return false;
			_this.ajaxLogin(userId, userPwd);
		});
		
		//回车提交表单
		$('#loginForm').keypress(function (e) {
			if (e.which == 13) {
				$('#signIn').trigger("click");
			}
		});
		
		
	},
	
	loginVerification : function (/*string*/ name, /*string*/ alerMessage) {
		var inputName = $('input[name="'+ name +'"]').val();
		if (inputName === '' || inputName === undefined) {
	
				$('.showError').remove();
				var showError = '<p class="showError" type = "'+ name +'">'+ alerMessage +'</p>';
				if ($('.showError').attr('type') !== name) {
					$('.loginContainer').append(showError);
					$('input[name="'+ name +'"]').focus();
					return false;
				}
			  
		}
		else return true;
	},
	
	ajaxLogin : function (userId, pwd) {
		var url = 'wsapi.php?';
		var json = {
			'o' : 'userPwd',
			'p' : 'login',
			'userId' : userId,
			'userPwd' : pwd
		};
		var successFunction = function (data){

			var showError = '<p class="showError">登录失败</p>',
				ajaxData;
			if (data == null || data === '') {
				$('.showError').remove();
				$('.loginContainer').append(showError);
				return false;
			}
			
			ajaxData = $.parseJSON(data);
		
			if (ajaxData.code === true) {
				$('.showError').remove();
				var host = $('#host').val(),
					destUrl = $('#destUrl').val(),
				    url ='http://' + host + destUrl;
				window.location = url;
			} else {
				$('.showError').remove();
				$('.loginContainer').append(showError);
				return false;
			}
			
		};
		var errorFunction = function (data) {
			$('.showError').remove();
			$('.loginContainer').append(showError);
			return false;
		};
		
		$.ajax({
			url : url,
			data : json,
			success : successFunction,
			error : errorFunction
		});
	}
	
};

$( function () {
	login.init();
});
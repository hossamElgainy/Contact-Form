/*global $ , console , alert*/

$(function () {
	'use strict';
	var userError = true,
		emailError = true,
		msgError   = true;
	
	$('.user_name ').blur(function () {
		if ($(this).val().length <= 3) {
			$(this).css('border', '1px solid #f00');
			$(this).parent().find('.UserError').fadeIn(300);
			$(this).parent().find('.asterisx').fadeIn(100);
			userError = true;
			
		} else {
			$(this).css('border', '1px solid #ccc');
			$(this).parent().find('.UserError').fadeOut(300);
			$(this).parent().find('.asterisx').fadeOut(100);
			userError = false;
		}
		
	});

	$('.email ').blur(function () {
		if ($(this).val() === '') {
			$(this).css('border', '1px solid #f00');
			$(this).parent().find('.EmailError').fadeIn(300);
			$(this).parent().find('.asterisx').fadeIn(100);
			emailError = true;
			
        } else {
			$(this).css('border', '1px solid #ccc');
			$(this).parent().find('.EmailError').fadeOut(300);
			$(this).parent().find('.asterisx').fadeOut(100);
			emailError = false;
		}
		
	});

	$('.Msg ').blur(function () {
		if ($(this).val().length < 10) {
			$(this).css('border', '1px solid #f00');
			$(this).parent().find('.MsgError').fadeIn(300);
			msgError = true;
			
			
		} else {
			$(this).css('border', '1px solid #ccc');
			$(this).parent().find('.MsgError').fadeOut(300);
			msgError = false;
			
		}
		
	});
	$(".contact-form").submit(function (e) {
		if (userError === true || emailError === true || msgError === true) {
			e.preventDefault();
			$('.user_name , .email , .Msg ').blur();
		} else {
			
		}
        
	});
});
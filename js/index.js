$( document ).ready(function() {
    $("#btn2").click(
        function(){
            sendAjaxForm('successtext', 'form_signup', 'register.php');
            return false;
        }
    );

    $("#btn3").click(
        function(){
            sendAjaxFormIn('successtext', 'form_signin', 'login.php');
            return false;
        }
    );


});

function sendAjaxForm(successtext, form_signup, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+form_signup).serialize(),  // Сеарилизуем объект
        success: function(data)
        {
            $('#successtext').html(data);

        },
        error: function(response) { // Данные не отправлены
            $('#successtext').html('Error. Data don\'t send.');
        }
    });
}

function sendAjaxFormIn(successtext, form_signin, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+form_signin).serialize(),  // Сеарилизуем объект
        success: function(data)
        {
            $('#successtext').html(data);

        },
        error: function(response) { // Данные не отправлены
            $('#successtext').html('Error. Data don\'t send.');
        }
    });
}



function checkPasswordMatch() {
var password = $("#txtNewPassword").val();
var confirmPassword = $("#txtConfirmPassword").val();

if (password != confirmPassword)
    $("#divCheckPasswordMatch").html("Passwords do not match!");
else
    $("#divCheckPasswordMatch").html("<span style=\"color:blue;\">Passwords match.</span>");
}

$(document).ready(function () {
    $("#txtConfirmPassword").keyup(checkPasswordMatch);
});





$(function() {
	$(".btn").click(function() {
		$(".form-signin").toggleClass("form-signin-left");
    $(".form-signup").toggleClass("form-signup-left");
    $(".frame").toggleClass("frame-long");
    $(".signup-inactive").toggleClass("signup-active");
    $(".signin-active").toggleClass("signin-inactive");
    $(".forgot").toggleClass("forgot-left");   
    $(this).removeClass("idle").addClass("active");
	});
});

$(function() {
	$(".btn-signup").click(function() {
  //$(".nav").toggleClass("nav-up");
  $(".form-signup-left").toggleClass("form-signup-down");
  $(".success").toggleClass("success-left"); 
  $(".frame").toggleClass("frame-short");
	});
});

$(function() {
	$(".btn-signin").click(function() {
  $(".btn-animate").toggleClass("btn-animate-grow");
  $(".welcome").toggleClass("welcome-left");
  $(".cover-photo").toggleClass("cover-photo-down");
  $(".frame").toggleClass("frame-short");
  $(".profile-photo").toggleClass("profile-photo-down");
  $(".btn-goback").toggleClass("btn-goback-up");
  $(".forgot").toggleClass("forgot-fade");
	});
});
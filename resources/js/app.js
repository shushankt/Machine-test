require('./bootstrap');

$(document).ready(function(){
    $("#therapist").click(function(){
      $("#password_form").hide();
    });
    $("#patient").click(function(){
      $("#password_form").show();
    });
  });

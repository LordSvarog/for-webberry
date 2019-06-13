$(document).ready(function(){

  $("#form-signin").submit(function(e){
    e.preventDefault();

    let login = $.trim($("#login").val());
    let password = $.trim($("#password").val());

    //console.log (login, password);

    if (login === '' || password === '') {
      $("img.profile-img").attr("src", "/images/user-error.png");
    } else {
      $("img.profile-img").attr("src", "/images/user-ok.png");
      $(this).unbind().submit();
    }
  });
});
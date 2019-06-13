$(function(){
  $(window).resize();
  window.scrollBy(0, 1);

  //Показ учётных данных пользователя
  $("#show").click(function(e) {
    e.preventDefault(); // Отменяет стандартное действие ссылки
    let action = ($(this).attr('href'));
    console.log(action);

    showProfile(action);
  });

  //Изменение данных пользователем
  $("#save").click(function (e) {
    e.preventDefault();
    const login = $("#login").val();
    const pass = $("#password").val();
    if(login == '' || pass == ''){// если поле пустое
      $('#update').prepend("<div>Поля 'Логин' и 'Пароль' должны быть заполнены!!!</div>");
      return;
    }
    const email = $("#e-mail").val();
    const tel = $("#telegram").val();
    const info = $("#info").val();
    //console.log(login, pass, email, tel, info);

    let data = $.param({login: login, pass: pass, email: email, tel: tel, info: info});

    $.post("/cabinet/change", data, function (res){
      if (!res)
        console.log('Шляпа(');
      $('#page-wrapper').html(res);
    });
  });

  //Удаление группы
  $(".btn_delete").click(function (e) {
    const id = $(this).parent('.buttons').data('id');
    console.log (id);
    $.get("/cabinet/groups/delete?id=" + id, function (res) {
      if (res){
        $('#page-wrapper').html(res);
      }
    });
  });

  //Отрисовка поля и кнопки для изменение группы
  $(".btn_update").click(function (e) {
    $(this).parent('.buttons').append("<div><input type='text' id='new_name' name='new_name' autofocus><input type='button' id='update' name='commit' value='Изменить'></div>");
    const id = $(this).parent('.buttons').data('id');

    //Изменение группы
    $("#update").click(function (e) {
      let name = $('#new_name').val();
      console.log (id, name);

      name = $.param({name: name});

      $.post("/cabinet/groups/update?id=" + id, name, function (res) {
        if (res){
          $('#page-wrapper').html(res);
        }
      });
    });
  });

  //Удаление пользователя
  $(".delete_user").click(function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    console.log (id);
    $.get("/cabinet/users/delete?id=" + id, function (res) {
      if (res){
        $('#page-wrapper').html(res);
      }
    });
  });
});

//Просмотр параметров пользователя
function showProfile(action){
  $.get(action, function (res) {
    if (!res) {
      console.log("Error!!!");
    }
    console.log(res);
    $('#page-wrapper').html(res);
  });
}
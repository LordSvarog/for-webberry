<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
     alt="">
<form class="form-signin" id="form-signin" method="post" action="/register">
  <?php
  if (!empty($pageData['error'])){
    echo "<p>" . $pageData['error'] . "</p>";
  }
  ?>

  <input type="text" class="form-control" name="login" id="login" placeholder="Логин" required autofocus>
  <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required>
  <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
  <input type="text" class="form-control" name="tel" id="tel" placeholder="Ник в Telegram">
  <input type="text" class="form-control" name="info" id="info" placeholder="О себе">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>

</form>

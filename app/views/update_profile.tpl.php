<div>
  <h3>Заполните поля, которые Вы хотите изменить</h3>
<!--  <p>--><?//= print_r($pageData);?><!--</p>-->
  <form id="update" class="update" method="post" action="">
    <div>
      <label for="login" class="label-item">Логин</label>
      <input class="input-item" type="text" id="login" name="login" value="<?=$pageData['login']?>">
    </div>

    <div>
      <label for="password" class="label-item">Пароль</label>
      <input class="input-item" type="password" id="password" name="password"  value="<?=$pageData['password']?>">
    </div>

    <div>
      <label for="e-mail" class="label-item">Почта</label>
      <input class="input-item" type="text" id="e-mail" name="e-mail"  value="<?=$pageData['email']?>">
    </div>

    <div>
      <label for="telegram" class="label-item">Ник в Telegram</label>
      <input class="input-item" type="text" id="telegram" name="telegram" value="<?=$pageData['telegram']?>">
    </div>

    <div>
      <label for="info" class="label-item">О себе</label>
      <input class="input-item" type="text" id="info" name="info" value="<?=$pageData['information']?>">
    </div>


    <input type="button" id="save" name="commit" value="Изменить" class="button btn">

  </form>

</div>
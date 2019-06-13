<?php
?>
<div id= "profile">
  <div id="login">
    Логин: <?= $pageData['login'];?>
  </div>
  <div id="login">
    Почта: <?= $pageData['email'];?>
  </div>
  <div id="login">
    Ник в Telegram: <?= $pageData['telegram'];?>
  </div>
  <div id="login">
    Группа прав: <?= $pageData['group'];?>
  </div>
  <div id="login">
    О себе: <?= $pageData['information'];?>
  </div>
</div>
<div id="change_button">
  <a href="/cabinet/update">Изменить данные</a>
</div>

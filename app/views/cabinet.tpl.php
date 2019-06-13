<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $pageData['title']; ?></title>

  <!-- Custom CSS -->
  <link href="/css/admin/admin.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/beff43e649.js"></script>
</head>

<body>

<div id="wrapper">

  <!-- Navigation -->
  <nav id="menu-wrapper" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">

      <a class="navbar-brand" href="/cabinet" style="text-decoration: none;">&lt;&lt;&lt; Кабинет</a>
    </div>

    <ul id="menu" class="dropdown-menu dropdown-user">
      <li>
        <a href="/cabinet/show" id="show"><i class="fa fa-user fa-fw"></i> Профиль</a>
      </li>

      <?php
      if ($_SESSION['admin'] == true){
      ?>
      <li>
        <a href="/cabinet/groups" id="show"><i class="fa fa-sticky-note fa-fw"></i> Группы</a>
      </li>
      <li>
        <a href="/cabinet/users" id="show"><i class="fa fa-users fa-fw"></i> Пользователи</a>
      </li>
      <?php
      }
      ?>

      <li>
        <a href="/cabinet/logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
      </li>
    </ul>
  </nav>

  <div id="page-wrapper">
    <?php
      if ($pageData['update'] == true)
        include_once "update_profile.tpl.php";
      elseif ($pageData['groups'] == true)
        include_once "groups.tpl.php";
      elseif ($pageData['users'] == true)
        include_once "users.tpl.php";
      elseif ($pageData['create_group'] == true)
        include_once "create_group.tpl.php";
      elseif ($pageData['admin_update'] == true)
        include_once "update_user.tpl.php";
      else
        include_once "stat.tpl.php";
    ?>
  </div>

</div>

<!-- Custom Theme JavaScript -->
<script src="/js/admin/admin.js"></script>

</body>

</html>
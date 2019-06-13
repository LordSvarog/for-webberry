<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageData['title']; ?></title>
  <meta name="vieport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<header></header>

<div id="content">
  <div class="container table-block">
    <div class="row table-cell-block">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title"><?= $pageData['title']; ?></h1>
        <div class="account-wall">
          <?php
          if ($pageData['create'] == true)
            include_once "create.tpl.php";
          else
            include_once "enter.tpl.php";
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>

</footer>


<script src="/js/script.js"></script>


</body>
</html>
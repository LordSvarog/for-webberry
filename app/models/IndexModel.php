<?php
require_once "Model.php";

class IndexModel extends Model
{
  public function checkUser()
  {

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE login = :login AND password = :password";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->execute();


    $res = $stmt->fetch(PDO::FETCH_ASSOC);


    if(!empty($res)) {
      $_SESSION['user'] = $login;
      if ($res['group_id'] == 1)
        $_SESSION['admin'] = true;
      header("Location: /cabinet");
    } else {
      return false;
    }
  }

  public function registerNewUser(array $regUser)
  {
    $sql = "INSERT INTO users(login, password, email, telegram, group_id, information)
				VALUES (:login, :pass, :email, :tel, 4, :info)
		";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":login", $regUser['login'], PDO::PARAM_STR);
    $stmt->bindValue(":pass", $regUser['pass'], PDO::PARAM_STR);
    $stmt->bindValue(":email", $regUser['email'], PDO::PARAM_STR);
    $stmt->bindValue(":tel", $regUser['tel'], PDO::PARAM_STR);
    $stmt->bindValue(":info", $regUser['info'], PDO::PARAM_STR);
    $res = $stmt->execute();
    return $res;
  }
}
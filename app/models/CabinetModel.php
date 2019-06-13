<?php
class CabinetModel extends Model
{
  public function getCategoriesCount()
  {
    $sql = "SELECT COUNT(*) FROM `groups`";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchColumn();
    return $res;
  }

  public function getUsersCount()
  {
    $sql = "SELECT COUNT(*) FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchColumn();
    return $res;
  }

  public function getProfile($login)
  {
    $sql = "SELECT u.*, g.`group`
            FROM users u
            INNER JOIN `groups` g ON u.group_id = g.id
            WHERE u.login = :login
            ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
  }

  public function setProfile($id, array $user)
  {
    try{
      $sql = "UPDATE users
            SET login = :login, password = :pass, email = :email, telegram = :tel, information = :info
            WHERE id = :id
            ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(":login", $user['login'], PDO::PARAM_STR);
      $stmt->bindValue(":pass", $user['pass'], PDO::PARAM_STR);
      $stmt->bindValue(":email", $user['email'], PDO::PARAM_STR);
      $stmt->bindValue(":tel", $user['tel'], PDO::PARAM_STR);
      $stmt->bindValue(":info", $user['info'], PDO::PARAM_STR);
      $stmt->bindValue(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
    }catch(PDOException $e){
      echo $e->getMessage();
    }

    $_SESSION['user'] = $user['login'];
    return true;
  }
}
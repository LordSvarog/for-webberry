<?php
class UsersModel extends Model
{
  public function getUsers()
  {
    $sql = "SELECT * FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $res[] = $row;
    }

    return $res;
  }

  public function deleteUser($id)
  {
    $sql = "DELETE FROM users
            WHERE id = :id
            ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $res = $stmt->execute();

    return $res;
  }

  public function getProfileUser($id)
  {
    $sql = "SELECT * FROM users
            WHERE id = :id
            ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
  }

  public function changeUser(array $user)
  {
    try{
      $sql = "UPDATE users
            SET login = :login, password = :pass, email = :email, telegram = :tel, group_id = :group, information = :info
            WHERE id = :id
            ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(":login", $user['login'], PDO::PARAM_STR);
      $stmt->bindValue(":pass", $user['pass'], PDO::PARAM_STR);
      $stmt->bindValue(":email", $user['email'], PDO::PARAM_STR);
      $stmt->bindValue(":tel", $user['tel'], PDO::PARAM_STR);
      $stmt->bindValue(":group", $user['group'], PDO::PARAM_INT);
      $stmt->bindValue(":info", $user['info'], PDO::PARAM_STR);
      $stmt->bindValue(":id", $user['id'], PDO::PARAM_INT);
      $res = $stmt->execute();
    }catch(PDOException $e){
      echo $e->getMessage();
    }

    return $res;
  }
}
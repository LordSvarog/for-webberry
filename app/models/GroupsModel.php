<?php
class GroupsModel extends Model
{
  public function getGroups()
  {
    $sql = "SELECT * FROM `groups`";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $res[$row['id']] = $row['group'];
    }

    return $res;
  }

  public function saveGroup($name)
  {
    try{
      $sql = "INSERT INTO `groups`(`group`)
              VALUES (:group)
              ";

      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(":group", $name, PDO::PARAM_STR);

      $res = $stmt->execute();
    }catch(PDOException $e){
      echo $e->getMessage();
    }

    return $res;
  }

  public function updateGroup($id, $name)
  {
    $sql = "UPDATE `groups`
            SET `group` = :name
            WHERE id = :id
            ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $res = $stmt->execute();

    return $res;
  }

  public function deleteGroup($id)
  {
    $sql = "DELETE FROM `groups`
            WHERE id = :id
            ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $res = $stmt->execute();

    return $res;
  }
}
<table id='users' class='display' cellspacing='0' width='100%'  >
  <tr>
    <th>No</th>
    <th>Логин</th>
    <th>Email</th>
    <th>Ник в Telegram</th>
    <th>Группа</th>
    <th>Информация</th>
    <th>Опции</th>
  </tr>
    <?
    foreach ($pageData['items'] as $index => $row){
    ?>
    <tr>
      <td><?=$index+1?></td>
      <? foreach ($row as $key => $value){
        if ($key == 'id'){
          $id = $value;
          continue;
        }elseif ($key == 'password')
          continue;
      ?>
        <td><?=$value?></td>
      <? } ?>
      <td>
        <a href="/cabinet/users/update?id=<?= $id?>"><i class='fa fa-pencil fa-fw'></i></a>
        <a data-id="<?= $id?>" class="delete_user" href="#"><i class='fa fa-trash fa-fw'></i></a>
      </td>
    </tr>
    <?
    }
    ?>
</table>
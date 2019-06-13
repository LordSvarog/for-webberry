<h3>Введите название новой группы</h3>
<?php
if (!empty($pageData['error'])){
  echo "<p>" . $pageData['error'] . "</p>";
}
?>
<form id="create" class="save" method="post" action="/cabinet/groups/save">
  <div>
    <label for="name" class="label-item">Название группы</label>
    <input class="input-item" type="text" id="name" name="name">
  </div>
  <button type="submit">Добавить</button>
</form>
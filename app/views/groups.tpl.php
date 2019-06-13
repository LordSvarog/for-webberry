<?php
//var_dump($pageData['items']);
?>
<h3>Список действующих групп</h3>
<div id= "groups">
  <?php
  foreach ($pageData['items'] as $key => $value){
    echo "<div id='group'>
            {$key}: {$value}
            <div class='buttons' data-id='{$key}' align='right'>
              <span class='btn_update' style='margin-right: 20px; cursor:pointer'><i class='fa fa-pencil fa-fw'></i></span>
              <span class='btn_delete' style='cursor:pointer'><i class='fa fa-trash fa-fw'></i></span>
            </div>
          </div>
          ";
  }
  ?>


</div>
<div id="change_button">
  <a href="/cabinet/groups/create">Добавить группу</a>
</div>
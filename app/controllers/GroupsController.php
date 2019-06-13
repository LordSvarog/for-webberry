<?php
require_once "Controller.php";
//require_once dirname(__DIR__) . "/views/View.php";

class GroupsController extends Controller
{
  private $pageTpl = "/views/cabinet.tpl.php";

  public function __construct()
  {
    $this->model = new GroupsModel();
    $this->view = new View();
  }

  public function index()
  {
    $this->pageData['items'] = $this->model->getGroups();
    $this->pageData['groups'] = true;

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function create ()
  {
    $this->pageData['create_group'] = true;
    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function save()
  {
    $this->pageData['create_group'] = true;
    if (!$name = $this->clear($_POST['name']))
      $this->pageData['error'] = "Ошибка при передаче данных, повторите";

    if ($this->model->saveGroup($name))
      $this->pageData['error'] = "Группа успешно добавлена";

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function update()
  {
    $id = $this->clearInt($_GET['id']);
    $name = $this->clear($_POST['name']);

    if (!$this->model->updateGroup($id, $name))
      return false;

    $this->pageData['items'] = $this->model->getGroups();
    $this->pageData['groups'] = true;
    $this->view->render("/views/groups.tpl.php", $this->pageData);
  }

  public function delete()
  {
    $id = $this->clearInt($_GET['id']);
    if (!$this->model->deleteGroup($id))
      return false;

    $this->pageData['items'] = $this->model->getGroups();
    $this->pageData['groups'] = true;
    $this->view->render("/views/groups.tpl.php", $this->pageData);
  }
}

<?php
require_once "Controller.php";
//require_once dirname(__DIR__) . "/views/View.php";

class UsersController extends Controller
{
  private $pageTpl = "/views/cabinet.tpl.php";

  public function __construct()
  {
    $this->model = new UsersModel();
    $this->view = new View();
  }

  public function index()
  {
    $this->pageData['items'] = $this->model->getUsers();
    $this->pageData['users'] = true;

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function update()
  {
    $id = $this->clearInt($_GET['id']);

    $this->pageData = $this->model->getProfileUser($id);
    $this->pageData['admin_update'] = true;

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function change()
  {
    $user=[];
    $user['id'] = $this->clearInt($_POST['id_user']);
    $user['login'] = $this->clear($_POST['login']);
    $user['pass'] = $this->clear($_POST['password']);
    $user['email'] = $this->clear($_POST['e-mail']);
    $user['tel'] = $this->clear($_POST['telegram']);
    $user['info'] = $this->clear($_POST['info']);
    $user['group'] = $this->clearInt($_POST['group_user']);

    $this->pageData['admin_update'] = true;

    if (!$this->model->changeUser($user))
      $this->pageData['error'] = "Ошибка при передаче данных, повторите";
    $this->pageData['error'] = "Данные успешно изменены";

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function delete()
  {
    $id = $this->clearInt($_GET['id']);
    if (!$this->model->deleteUser($id))
      return false;

    $this->pageData['items'] = $this->model->getUsers();
    $this->pageData['users'] = true;
    $this->view->render("/views/update_user.tpl.php", $this->pageData);
  }
}
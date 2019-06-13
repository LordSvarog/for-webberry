<?php
require_once "Controller.php";
//require_once dirname(__DIR__) . "/views/View.php";

class CabinetController extends Controller
{
  private $pageTpl = "/views/cabinet.tpl.php";
  private $login;

  public function __construct()
  {
    $this->model = new CabinetModel();
    $this->view = new View();

    $this->login = $_SESSION['user'];
  }

  public function index()
  {
    if (!$_SESSION['user']) {
      header("Location: /");
    }

    $categoriesCount = $this->model->getCategoriesCount();
    $this->pageData['categoriesCount'] = $categoriesCount;

    $usersCount = $this->model->getUsersCount();
    $this->pageData['usersCount'] = $usersCount;

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function logout()
  {
    session_destroy();
    header("Location: /");
  }

  public function show ()
  {
    $profile = $this->model->getProfile($this->login);
    $this->pageData = $profile;

    $_SESSION['id'] = $profile['id'];

    $this->view->render("/views/profile.tpl.php", $this->pageData);
  }

  public function update()
  {
    $this->pageData = $this->model->getProfile($this->login);
    $this->pageData['update'] = true;

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function change()
  {
    $user = [];
    $user['login'] = $this->clear($_POST['login']);
    $user['pass'] = md5($this->clear($_POST['pass']));
    $user['email'] = $this->clear($_POST['email']);
    $user['tel'] = $this->clear($_POST['tel']);
    $user['info'] = $this->clear($_POST['info']);

    $id = $_SESSION['id'];

    $this->model->setProfile($id, $user);
    //return "<p>" . $login . "</p>";
    $this->pageData['success'] = 'SUCCESS';
    $this->view->render("/views/changed.tpl.php", $this->pageData);
  }
}

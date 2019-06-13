<?php
require_once "Controller.php";
require_once dirname(__DIR__) . "/views/View.php";

class IndexController extends Controller
{
  private $pageTpl = '/views/main.tpl.php';

  public function __construct()
  {
    $this->model = new IndexModel();
    $this->view = new View();
  }

  public function index()
  {
    $this->pageData['title'] = "Авторизация на сайте";
    if (!empty($_POST) && !$this->login()) {
      $this->pageData['error'] = "Неправильный логин или пароль";
    }

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function login()
  {
    if (!$this->model->checkUser()) {
      return false;
    }
  }

  //Регистрация на сайте
  public function create()
  {
    $this->pageData['title'] = "Регистрация на сайте";
    $this->pageData['create'] = true;

    $this->view->render($this->pageTpl, $this->pageData);
  }

  public function register()
  {
    if (empty($_POST['login']) || empty($_POST['password'])) {
      $this->pageData['error'] = "Поля 'Логин' и 'Пароль' обязательны к заполнению";
      return false;
    }
    $regUser = [];
    $regUser['login'] = $this->clear($_POST['login']);
    $regUser['pass'] = md5($this->clear($_POST['password']));
    $regUser['email'] = $this->clear($_POST['email']);
    $regUser['tel'] = $this->clear($_POST['tel']);
    $regUser['info'] = $this->clear($_POST['info']);

    if ($this->model->registerNewUser($regUser) == false)
      return false;
    $this->login();
  }
}
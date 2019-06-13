<?php

abstract class Controller
{
  public $model;
  public $view;
  protected $pageData = array();

  public function __construct()
  {
    $this->view = new View();
    $this->model = new Model();
  }

  protected function clear($data)
  {
    $data = trim(strip_tags($data));

    return $data;
  }

  protected function clearInt($data)
  {
    $data = abs((int)$data);

    return $data;
  }
}
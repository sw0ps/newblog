<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Application\Lib\Pagination;
use Application\Lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
//        $pagination = new Pagination($this->route, 100);
//        $vars = [
//            'pagination' => $pagination->get(),
//        ];
        $this->view->render("Тестовый блог");
    }

    public function aboutAction()
    {

        $this->view->render("Обо мне");
    }

    public function contactAction()
    {
        if(!empty($_POST)) {
            if(!$this->model->contactValidate($_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);

            }

            mail("dmytro.usachov@gmail.com", "Сообщение из блога", $_POST['name'] . " | " . $_POST['text']);
            $this->view->message('success', "Сообщение отправлено Администратору");

        }
        $this->view->render("Контакты");
    }

    public function postAction()
    {

        $this->view->render("Пост");
    }

    public function listAction() {
        $pagination = new Pagination($_POST);
        $startPagination = $pagination->startFrom();
        $list = $this->model->getListPage($startPagination);
        $pagination->output($list);
        $result = $pagination->getOutputHtml();
        debug($result);

    }
}
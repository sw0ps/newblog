<?php

namespace Application\Controllers;

use Application\Core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout ='admin';
    }

    public function loginAction()
    {
        if(isset($_SESSION['admin'])) {
            $this->view->redirect('admin/add');
        }
        if(!empty($_POST)) {
            if(!$this->model->loginValidate($_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);

            }
            $_SESSION['admin'] = true;
//            $this->view->message('success', "Сообщение отправлено Администратору");
            $this->view->location('admin/add');
        }
        $this->view->render("Авторизация");
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('');
    }

    public function addAction()
    {
        if(!empty($_POST)) {
            if(!$this->model->postValidate("add", $_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);
            }
            debug($this->model->addPost($_POST));
            $this->view->message('Success', "OK");
        }
        $this->view->render("Добавить пост");
    }

    public function editAction()
    {
        if(!empty($_POST)) {
            if(!$this->model->postValidate("edit", $_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);
            }
            $this->view->message('Success', "OK");
        }
        $this->view->render("Редактировать пост");
    }

    public function postsAction()
    {
        $this->view->render("Список постов");
    }

    public function deleteAction()
    {
        debug($this->route);
        exit("Удалить пост");
    }

}
<?php

namespace Application\Controllers;

use Application\Core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction()
    {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin/add');
        }
        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);

            }
            $_SESSION['admin'] = true;
//            $this->view->message('success', "Сообщение отправлено Администратору");
            $this->view->location('admin/posts');
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
        if (!empty($_POST)) {
            if (!$this->model->postValidate("add", $_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);
            }
            $id = $this->model->addPost($_POST);
            if (!$id) {
                $this->view->message('error', 'Ошибка обработки запроса');
            }
            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id);
            $this->view->message('Success', "Пост добавлен");
        }
        $this->view->render("Добавить пост");
    }

    public function editAction()
    {
        if(!$this->model->isPostExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            if (!$this->model->postValidate("edit", $_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);
            }
            $this->model->updatePost($this->route['id'], $_POST);
            $this->view->message('Success', "OK");
        }
        $variables = [
            'data' => $this->model->getPost($this->route['id'])[0],
        ];
        $this->view->render("Редактировать пост", $variables);
    }

    public function postsAction()
    {
        $this->view->render("Список постов");
    }

    public function deleteAction()
    {
        if(!$this->model->isPostExists($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->deletePost($this->route['id']);
        $this->view->redirect('admin/posts');
    }

}
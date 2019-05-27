<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Application\Lib\Pagination;

//use application\models\Admin;

class MainController extends Controller
{
    public function indexAction()
    {
        $pagination = new Pagination($this->route, $this->model->postsCount());
        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->postsList($this->route),
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function aboutAction()
    {
        $this->view->render('Обо мне');
    }

    public function contactAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->contactValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            mail('dmytro.usachov@gmail.com', 'Сообщение из блога', $_POST['name'] . '|' . $_POST['email'] . '|' . $_POST['text']);
            $this->view->message('success', 'Сообщение отправлено Администратору');
        }
        $this->view->render('Контакты');
    }

    public function postAction()
    {
        $data = $this->model->getPost($this->route['id'])[0];
        $tags = '';
        if(!empty($data['tags'])) {
            $tags = explode(",", $data['tags']);
        }
        $vars = [
            'data' => $data,
            'tags' => $tags,
        ];
        $this->view->render($data['title'], $vars);
    }

}
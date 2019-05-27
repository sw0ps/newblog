<?php

namespace Application\Controllers;

use Application\Core\Controller;

class CommentsController extends Controller
{
    public function addAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->commentValidate($_POST)) {
                $errors = "";
                foreach ($this->model->error as $key => $value) {
                    $errors .= "Ошибка: {$value}\n";
                }
                $this->view->message('ERROR', $errors);
            }
            $id = $this->model->addComment($_POST);
            if (!$id) {
                $this->view->message('error', 'Ошибка обработки запроса');
            }
            $this->view->message('Success', "Спасибо за ваш отзыв!");
        }

        $res = $this->model->showComments($_POST['posts_id']);
        echo  json_encode($res);
    }

    public function showAction() {
        $result = $this->model->showComments($_POST['posts_id']);
        echo  json_encode($result);
    }
}

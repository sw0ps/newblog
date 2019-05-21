<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Application\Lib\Db;

class MainController extends Controller
{
    public function indexAction() {
        $result = $this->model->getUsers();;
        $params = [
            'users' => $result,
        ];
        $this->view->render("Home page", $params);
    }

}
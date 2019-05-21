<?php

namespace Application\Controllers;

use Application\Core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->render("Login");
    }

    public function registerAction()
    {
        $this->view->render("Registration");
    }

}
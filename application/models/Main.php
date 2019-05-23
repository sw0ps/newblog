<?php

namespace Application\Models;

use Application\Core\Model;

class Main extends Model
{
    public $error = [];

    public function contactValidate($post)
    {
        $nameLength = mb_strlen($post['name']);
        if ($nameLength < 3 or $nameLength > 20) {
            $this->error['name'] = "Имя должно содержать от 3х до 20ти символов";
        }

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $this->error['email'] = "Email указан неверно";
        }

        $textLength = mb_strlen($post['text']);
        if ($textLength < 10 or $textLength > 500) {
            $this->error['text'] = "Сообшение должно содержать от 10 до 500 символов";
        }

        if(empty($this->error)) {
            return true;
        }
        return false;
    }

}
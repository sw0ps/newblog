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

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['email'] = "Email указан неверно";
        }

        $textLength = mb_strlen($post['text']);
        if ($textLength < 10 or $textLength > 500) {
            $this->error['text'] = "Сообшение должно содержать от 10 до 500 символов";
        }

        if (empty($this->error)) {
            return true;
        }
        return false;
    }

    public function postsCount()
    {
        return $this->db->column("SELECT COUNT(id) FROM posts");
    }

    public function postsList($route)
    {
        $max = 1;
        $params = [
            'max' => $max,
            'start' => (($route['page'] ?? 1) - 1) * $max,
        ];
        return $this->db->row("SELECT * FROM posts ORDER BU publication_date DESC LIMIT :start, :max" , $params);
    }

    public function getList()
    {
        return $this->db->row("SELECT * FROM posts");
    }

    public function getListPage($limit)
    {
        var_dump($limit);
        $params = [
            'limit' => $limit,
        ];
        return $this->db->row("SELECT * FROM posts LIMIT {$limit}");
    }

}
<?php

namespace Application\Models;

use Application\Core\Model;
use \Imagick;

class Admin extends Model
{

    public $error = [];

    public function loginValidate($post)
    {
        $config = require "application/config/admin.php";
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error[] = "Логин или пароль указан неверно";
            return false;
        }

        return true;
    }

    public function postValidate($type, $post)
    {
        $titleLength = mb_strlen($post['title']);
        $descriptionLength = mb_strlen($post['description']);
        $contentLength = mb_strlen($post['content']);
        if ($titleLength < 5 or $titleLength > 50) {
            $this->error['title'] = "Название поста должно содержать от 5 до 50 символов";
        }

        if ($descriptionLength < 10 or $descriptionLength > 100) {
            $this->error['description'] = "Краткое описание поста должно содержать от 10 до 100 символов";
        }

        if ($contentLength <= 30) {
            $this->error['content'] = "Контент поста должен содержать не менее 30ти символов";
        }

        if (empty($this->error)) {
            return true;
        }
        return false;
    }

    public function addPost($post)
    {
        $params = [
            "title" => $post['title'],
            "description" => $post['description'],
            "content" => $post['content'],
            "status" => $post['status'],
            "publication_date" => strtotime(date("Y-m-d H:i:s")),
        ];

        $this->db->query("INSERT INTO posts (title, description, content, status, publication_date) VALUES (:title, :description, :content, :status, :publication_date)", $params);
        return $this->db->lastInsertId();
    }

    public function updatePost($id, $post)
    {
        $params = [
            'id' => $id,
            "title" => $post['title'],
            "description" => $post['description'],
            "content" => $post['content'],
            "status" => $post['status'],
            "last_edit_date" => strtotime(date("Y-m-d H:i:s")),
        ];
        return $this->db->query("UPDATE posts SET title = :title, description = :description, content = :content, status = :status, last_edit_date = :last_edit_date WHERE id = :id", $params);
    }

    public function postUploadImage($file, $id)
    {
        move_uploaded_file($file, 'public/uploads/' . $id . '.jpg');
    }

    public function isPostExists($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('Select id from posts where id = :id', $params);
    }

    public function deletePost($id)
    {
        $params = [
            'id' => $id
        ];
        $this->db->query("DELETE FROM posts WHERE id = :id", $params);
        if (file_exists('public/uploads/' . $id . '.jpg')) {
            unlink('public/uploads/' . $id . '.jpg');
        }
    }

    public function getPost($id)
    {
        $params = [
            'id' => $id
        ];
        return $this->db->row("SELECT * FROM posts WHERE id = :id", $params);
    }

    public function getAllPosts()
    {
        return $this->db->row("SELECT * FROM posts");
    }

}
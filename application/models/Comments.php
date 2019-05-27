<?php

namespace Application\Models;

use Application\Core\Model;

class Comments extends Model
{
    public $error = [];

    public function commentValidate($post)
    {
        $nameLength = mb_strlen($post['name']);
        if ($nameLength < 3 or $nameLength > 20) {
            $this->error['name'] = "Имя должно содержать от 3х до 20ти символов";
        }

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['email'] = "Email указан неверно";
        }

        $textLength = mb_strlen($post['comment']);
        if ($textLength < 10 ) {
            $this->error['comment'] = "Сообшение должно содержать от 10 символов";
        }

        if (!empty($this->error)) {
            return false;
        }

        return true;
    }

    public function addComment($post)
    {


        $params = [
            "posts_id" => $post['posts_id'],
            "name" => $post['name'],
            "email" => $post['email'],
            "content" => $post['comment'],
            "publication_date" => strtotime(date("Y-m-d H:i:s")),
        ];

        return $this->db->query("INSERT INTO comments (posts_id, name, email, content, publication_date) VALUES (:posts_id, :name, :email, :content, :publication_date)", $params);
    }

    public function showComments($id)
    {
        $var = [
            'posts_id' => $id,
        ];
        $result = $this->db->row("SELECT * FROM comments WHERE posts_id = :posts_id ORDER BY publication_date DESC", $var);
        if (empty($result)) {
            return "<p>Комментарии отсуствуют</p>";
        } else {
            $output = '';

            foreach ($result as $row) {
                $output .= '
                <div class="media-block">
                    <div class="media-body">
                        <div class="mar-btm">
                            <span class="comment__info comment__info--name">' . htmlspecialchars($row['name']) . '</span>
                            <span class="comment__info comment__info--email">' . htmlspecialchars($row['email']) . '</span>
                            <span class="comment__info comment__info--date text-muted text-sm">' . date("H:i d-m-Y", $row['publication_date']) . '</span>
                        </div>
                        <p>' . htmlspecialchars($row['content']) . '</p>
                        <hr>
                    </div>
                </div>
                ';
            }

            return $output;
        }
    }

}
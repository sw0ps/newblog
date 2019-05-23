<?php

namespace Application\Lib;

class Pagination
{
    protected $record_per_page = 5;
    protected $page = 1;
    protected $output = "";

    public function __construct($post)
    {
        if (isset($post)) {
            $this->page = $post['page'];
        }

    }

    public function startFrom()
    {
        $start_from = ($this->page - 1) * $this->record_per_page;
        return $start_from;
    }

    public function getOutputHtml() {
        return $this->output;
    }

    public function output($list)
    {
        if (empty($list)) {
            $this->output = "<p>Список постов пуст</p>";
        } else {

            foreach ($list as $item) {
                $this->output .= '
                    <div class="post-preview">
                            <a href="post/' . $item["id"] . '">
                                <h2 class="post-title">' . $item["title"] . '</h2>
                                <h5 class="post-subtitle">' . $item["description"] . '</h5>
                            </a>
                        <p class="post-meta">Идентфикатор этого поста </p>
                    </div>
                    <hr>
                    ';
            }

                $this->output .= '
                    
                ';
        }


    }
}
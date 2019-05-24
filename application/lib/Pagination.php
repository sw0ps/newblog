<?php

namespace Application\Lib;

class Pagination
{
    private $max = 10;
    private $route;
    private $index = '';
    private $current_page;
    private $total;
    private $limit;
    public function __construct($route, $total, $limit = 10) {
        $this->route = $route;
        $this->total = $total;
        $this->limit = $limit;
        $this->amount = $this->amount();
        $this->setCurrentPage();
    }

    public function get() {
        $links = null;
        $limits = $this->limits();
        $html = '<nav><ul class="pagination">';
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            if ($page == $this->current_page) {
                $links .= '<li class="page-item active"><span class="page-link">'.$page.'</span></li>';
            } else {
                $links .= $this->generateHtml($page);
            }
        }
        if (!is_null($links)) {
            if ($this->current_page > 1) {
                $links = $this->generateHtml(1, 'Вперед').$links;
            }
            if ($this->current_page < $this->amount) {
                $links .= $this->generateHtml($this->amount, 'Назад');
            }
        }
        $html .= $links.' </ul></nav>';
        return $html;
    }
    private function generateHtml($page, $text = null) {
        if (!$text) {
            $text = $page;
        }
        return '<li class="page-item"><a class="page-link" href="/'.$this->route['controller'].'/'.$this->route['action'].'/'.$page.'">'.$text.'</a></li>';
    }
    private function limits() {
        $left = $this->current_page - round($this->max / 2);
        $start = $left > 0 ? $left : 1;
        if ($start + $this->max <= $this->amount) {
            $end = $start > 1 ? $start + $this->max : $this->max;
        }
        else {
            $end = $this->amount;
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }
    private function setCurrentPage() {
        if (isset($this->route['page'])) {
            $currentPage = $this->route['page'];
        } else {
            $currentPage = 1;
        }
        $this->current_page = $currentPage;
        if ($this->current_page > 0) {
            if ($this->current_page > $this->amount) {
                $this->current_page = $this->amount;
            }
        } else {
            $this->current_page = 1;
        }
    }
    private function amount() {
        return ceil($this->total / $this->limit);
    }

//    protected $record_per_page = 5;
//    protected $page = 1;
//    protected $output = "";
//
//    public function __construct($post)
//    {
//        if (isset($post)) {
//            $this->page = $post['page'];
//        }
//
//    }
//
//    public function startFrom()
//    {
//        $start_from = ($this->page - 1) * $this->record_per_page;
//        return $start_from;
//    }
//
//    public function getOutputHtml() {
//        return $this->output;
//    }
//
//    public function output($list)
//    {
//        if (empty($list)) {
//            $this->output = "<p>Список постов пуст</p>";
//        } else {
//
//            foreach ($list as $item) {
//                $this->output .= '
//                    <div class="post-preview">
//                            <a href="post/' . $item["id"] . '">
//                                <h2 class="post-title">' . $item["title"] . '</h2>
//                                <h5 class="post-subtitle">' . $item["description"] . '</h5>
//                            </a>
//                        <p class="post-meta">Идентфикатор этого поста </p>
//                    </div>
//                    <hr>
//                    ';
//            }
//
//                $this->output .= '
//
//                ';
//        }
//
//
//    }
}
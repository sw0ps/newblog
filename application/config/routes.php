<?php

return [
    // MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    '{page:\d+}' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'list' => [
        'controller' => 'main',
        'action' => 'list',
    ],
//    'main/index/{page:\d+}' => [
//        'controller' => 'main',
//        'action' => 'index',
//    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],
    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],
    'comments/add' => [
        'controller' => 'comments',
        'action' => 'add',
    ],
    'comments/show' => [
        'controller' => 'comments',
        'action' => 'show',
    ],
    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
    ],
    // AdminController
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/add' => [
        'controller' => 'admin',
        'action' => 'add',
    ],
    'admin/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'admin/posts/{page:\d+}' => [
        'controller' => 'admin',
        'action' => 'posts',
    ],
    'admin/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
    ],
];
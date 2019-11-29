<?php

namespace Controller;

use Model\User;

class LoginController extends BaseController
{
    public $middleware = [
        'get' => [
        ],
        'post' => [
        ],
        'all' => [
            'Middleware\GuessMiddleware'
        ]
    ];

    public function get()
    {
        $page_name = 'login';
        require(view_url('login'));
    }

    public function post()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login_sucessfull = false;

        $user = User::where('email', '=', $email)->limit(1)->get();

        if (count($user) > 0) {
            $user = $user[0];
            if (password_verify($password, substr($user['pass'], 0, 60 ))) {
                $login_sucessfull = true;
                $_SESSION['user_id'] = $user['id'];
            }
        }

        echo \json_encode($login_sucessfull);
    }
}

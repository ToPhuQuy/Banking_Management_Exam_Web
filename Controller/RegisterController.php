<?php

namespace Controller;

use Model\User;
use Utils\Validator;

class RegisterController extends BaseController
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
        $page_name = 'register';
        require(view_url('register'));
        exit(0);
    }

    public function post()
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['rePass'];

        $result = [
            'error' => false,
            'message' => '',
            'errorField' => ''
        ];

        if (!Validator::email($email) && !$result['error']) {
            $result['errorField'] = 'email';
            $result['error'] = true;
            $result['message'] = 'Email bạn submit không hợp lệ';
        }

        if (!Validator::password($pass) && !$result['error']) {
            $result['errorField'] = 'pass';
            $result['error'] = true;
            $result['message'] = 'Mật khẩu phải chứa ít nhất 8 ký tự';
        }

        if (!$result['error'] && $pass != $re_pass) {
            $result['errorField'] = 'repass';
            $result['error'] = true;
            $result['message'] = 'Mật khẩu bạn nhập lại không khớp';
        }

        if (User::where('email', '=', $email)->exists() && !$result['error']) {
            $result['errorField'] = 'email';
            $result['error'] = true;
            $result['message'] = 'Email này đã được sử dụng';
        }

        if (!$result['error']) {
            User::insert([
                'email' => $email,
                'pass' => password_hash($pass, PASSWORD_DEFAULT),
                'role_id' => 2
            ]);
        }

        echo json_encode($result);
        exit(0);
    }
}

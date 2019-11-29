<?php

namespace Middleware;

class AuthMiddleware extends BaseMiddleware
{
    public function __invoke()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit(0);
        }  
    }
}

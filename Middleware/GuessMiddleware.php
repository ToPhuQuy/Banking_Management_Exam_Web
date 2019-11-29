<?php

namespace Middleware;

class GuessMiddleware extends BaseMiddleware
{
    public function __invoke()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: /");
            exit(0);
        }   
    }
}

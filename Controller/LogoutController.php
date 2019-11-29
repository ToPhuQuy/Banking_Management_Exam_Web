<?php

namespace Controller;

class LogoutController
{
    public function all()
    {
        session_destroy();
        header('Location: /login');
        exit(0);
    }
}
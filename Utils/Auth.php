<?php

namespace Utils;

use Model\User;

class Auth
{
    public static function getUser()
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }
        return User::getById($_SESSION['user_id']);
    }
}

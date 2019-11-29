<?php

namespace Controller;

use Model\User;
use Model\Role;

class TestController extends BaseController
{
    public function get()
    {
        var_dump($_SESSION['user_id']);
        exit(0);
    }
}

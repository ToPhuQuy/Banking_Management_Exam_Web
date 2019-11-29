<?php

namespace Model;

use Utils\QuerySet;

class User extends BaseModel
{
    function table() {
        return 'users';
    }
}

<?php

namespace Model;

class Role extends BaseModel
{
    public function table()
    {
        return 'roles';
    }

    public function fields()
    {
        return ['id', 'name'];
    }
}
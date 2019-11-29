<?php

namespace Utils;

class Validator
{
    public static function email($email)
    {
        $regex = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        return \preg_match($regex, $email);
    }

    public static function password($password)
    {
        return strlen($password) >= 8;
    }
}
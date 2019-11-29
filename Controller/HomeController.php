<?php

namespace Controller;

class HomeController extends BaseController
{
    public static function get()
    {
        $page_name = 'home';
        require(view_url('index'));
    }
}

<?php

namespace Controller;

class BaseController
{
    public $middleware = [
        'get' => [

        ],
        'post' => [

        ],
        'all' => [

        ]
    ];

    public function __construct()
    {
        $this->middlewareCall();
    }

    public function middlewareCall()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        
        foreach ($this->middleware['all'] as $m)
        {
            $middleware = new $m();
            $middleware();
        }

        if (isset($this->middleware[$method]))
        {
            foreach ($this->middleware[$method] as $m)
            {
                $middleware = new $m();
                $middleware();
            }
        }
    }
}

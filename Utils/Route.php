<?php

namespace Utils;

/**
 * This class contains routing methods
 */
class Route
{
    // Route list
    static $routeList = [

    ];

    // Http get
    static function get($rule, $controller)
    {
        array_push(Route::$routeList, [
            'rule' => $rule,
            'method' => 'get',
            'controller' => $controller
        ]);
    }

    // Http post
    static function post($rule, $controller)
    {
        array_push(Route::$routeList, [
            'rule' => $rule,
            'method' => 'post',
            'controller' => $controller
        ]);
    }

    // Both get and post
    public static function all($rule, $controller)
    {
        array_push(Route::$routeList, [
            'rule' => $rule,
            'method' => 'all',
            'controller' => $controller
        ]);
    }

    // Load controller
    static function loadRoutes()
    {
        // Get url and method
        $request_url = strtok($_SERVER["REQUEST_URI"], '?');
        $request_method = $_SERVER['REQUEST_METHOD'];        
        
        // Iterate over routelist
        foreach (Route::$routeList as $value)
        {
            if ($value['method'] == 'all' || (strtolower($value['method']) == strtolower($request_method)))
            {
                $_captured = [];
                $controller = explode('@', $value['controller']);
                
                // Get rule
                $key = $value['rule'];

                // String
                if ($key == $request_url)
                {
                    call_user_func([new $controller[0](), $controller[1]]);
                    break;
                }

                // Regex
                else if (@preg_match($key, null) !== false)
                {
                    if (preg_match($key, $request_url, $_captured))
                    {
                        call_user_func([new $controller[0](), $controller[1]]);
                        break;
                    }
                }
            }
        }
    }
}

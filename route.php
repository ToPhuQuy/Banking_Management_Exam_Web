<?php

use Utils\Route;

/**
 * Put your route here
 * Using normal string
 * or regular expression
 */

Route::all(
    '/^(\/|\/index\.html)$/', 
    'Controller\HomeController@get'
);

Route::get(
    '/login',
    'Controller\LoginController@get'
);

Route::post(
    '/login',
    'Controller\LoginController@post'
);

Route::get(
    '/^\/question\/(\d+)$/',
    'Controller\LoginController@get'
);

Route::get(
    '/register',
    'Controller\RegisterController@get'
);

Route::post(
    '/register',
    'Controller\RegisterController@post'
);

Route::get(
    '/test',
    'Controller\TestController@get'
);

Route::all(
    '/logout',
    'Controller\LogoutController@all'
);

Route::get(
    '/topic',
    'Controller\TopicController@get'
);

Route::post(
    '/topic',
    'Controller\TopicController@post'
);

// Load the routes
Route::loadRoutes();

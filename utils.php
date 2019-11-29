<?php

/**
 * Routing utilities
 */

function static_url($name)
{
    return "/public/$name";
}

function view_url($name)
{
    return __DIR__ . '/view/' . $name . '.php';
}

function redirect($url)
{
    header("location: " . $url);
    exit(0);   
}

function echoJson($array)
{
    header('Content-type: application/json');
    echo json_encode($array);
    exit(0);
}

function get_config($name)
{
    global $config;
    return $config[$name];
}

<?php

// Only when debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Session
session_start();

// Load modules
require('autoload.php');
require('config.php');
require('utils.php');
require('route.php');

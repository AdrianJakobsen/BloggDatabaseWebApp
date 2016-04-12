<?php
include("vendor/autoload.php");

/**
 * The bootstrap phase. It loads the config, 
 */
$config = include(__DIR__."/config.php");
$router = new \Bramus\Router\Router();
call_user_func($config['setup_router'], $router);
$router->run();

/**
 * Loads and parses a template, based on the $templateName and the $vars
 * array.
 */
function view($templateName, $vars=[]) {
    $template = load_template($templateName);
    echo $template->render($vars);
    die();
}

function redirect($url, $httpCode=301) {
    header("HTTP/1.0 $httpCode Redirect");
    header("Location: ".$url);
    die();
}

function error404() {
    header("HTTP/1.0 404 Not Found");
    die("Page not found");
}

/**
 * Returns the database connection object.
 * 
 * Usage:
 * 
 * $stmt = db()->prepare('SELECT * FROM users WHERE username=? AND password_hash=?');
 * $stmt->execute([$username, $password_hash]);
 * return $stmt->fetch();
 */
function db() {
    static $db;
    if($db) return $db;

    global $config;
    
    return $db = call_user_func($config['db']);
}

/**
 * Loads a template.
 * 
 * Usage:
 * 
 * $template = load_template('template_name');
 * echo $template->render(['some' => 'variable']);
 */
function load_template($template) {
    global $config;
    
    return call_user_func($config['load_template'], $template);
}
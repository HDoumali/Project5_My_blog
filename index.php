<?php


require 'app/Controller/Router.php';
/*require_once('vendor/autoload.php');

use project5_blog_s\app\Controller\Router;*/

session_start();

$routeur = new Router();
$routeur->routerRequest();



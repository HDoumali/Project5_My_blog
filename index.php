<?php


require 'app/Controller/Router.php';
//require_once('vendor/autoload.php');

//use projet5_blog_s\private\Controller\Routerswitch;

session_start();

$routeur = new Router();
$routeur->routerRequest();



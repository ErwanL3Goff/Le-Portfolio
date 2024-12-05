<?php

require 'config/constant.php';
require 'config/db.php';
require 'config/repositories.php';
require 'config/models.php';

require 'config/controllers.php';
require 'Router.php';

/*BOOSTRAP'S LINKS
require "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css";
require "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js";*/




//MON ROUTER
session_start();
$router = new Router();
$elements = $router->getController($_SERVER['REQUEST_URI']);

$controller = $elements['controller'];

//J'initialise une instance de mon controller avec la connexion à la base de données
$cont = new $controller($dbh);

//J'appele l'action de mon controller
$action = $elements['action'];
$id = $elements['id'];
$cont->$action($id);

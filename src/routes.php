<?php

use \Core\Router;

Router::get("/", ["controller" => "AppController", "action" => "index"]);

Router::get("/register", ["controller" => "UserController", "action" => "register"]);
Router::post("/register", ["controller" => "UserController", "action" => "registerPost"]);

Router::get("/login", ["controller" => "UserController", "action" => "login"]);
Router::post("/login", ["controller" => "UserController", "action" => "loginPost"]);

Router::get("/logout", ["controller" => "UserController", "action" => "logout"]);

Router::get("/anime", ["controller" => "AnimeController", "action" => "search"]);
Router::get("/users", ["controller" => "ProfileController", "action" => "search"]);

Router::post('/search', ['controller' => "SearchController", 'action' => 'index']);

Router::get('/search/anime', ['controller' => "AnimeController", 'action' => 'list']);

Router::get('/search/users', ['controller' => "ProfileController", 'action' => 'list']);

Router::get('/user', ['controller' => "UserController", 'action' => 'index']);

Router::get('/user/edit', ['controller' => "UserController", 'action' => 'edit']);
Router::post('/user/edit', ['controller' => "UserController", 'action' => 'editPost']);
Router::get('/user/delete', ['controller' => "UserController", 'action' => 'delete']);
Router::post('/user/delete', ['controller' => "UserController", 'action' => 'deletePost']);
Router::get('/user/create_profile', ['controller' => "UserController", 'action' => 'create_profile']);

Router::get('/admin', ['controller' => "AdminController", 'action' => 'index']);

Router::get('/anime/{id}', ['controller' => "AnimeController", 'action' => 'index']);
Router::get('/anime/{id}/{name}', ['controller' => "AnimeController", 'action' => 'index']);

Router::get('/type/{name}', ['controller' => "AnimeController", 'action' => 'type']);
Router::get('/meta/{id}', ['controller' => "AnimeController", 'action' => 'meta']);

Router::get('/users/{id}', ['controller' => "ProfileController", 'action' => 'index']);
Router::get('/users/{id}/{name}', ['controller' => "ProfileController", 'action' => 'index']);

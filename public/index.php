<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Model;

Model::init();

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/users', 'UserController@index');
$router->get('/signin', 'SignInController@index');
$router->get('/signup', 'SignUpController@index');
$router->get('/dashboard/user', 'DashboardUserController@index');
$router->post('/users/store', 'UserController@store');

$router->dispatch();
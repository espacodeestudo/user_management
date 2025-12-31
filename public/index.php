<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Model;

Model::init();

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/users', 'UserController@index');
$router->get('/signin', 'SignInController@index');
$router->post('/signin', 'SignInController@login');
$router->get('/signup', 'SignUpController@index');
$router->post('/signup', 'SignUpController@store');
$router->get('/dashboard/user', 'DashboardUserController@index');
$router->post('/dashboard/user', 'DashboardUserController@store');
$router->post('/dashboard/user/delete', 'DashboardUserController@deleteUser');
$router->post('/users/store', 'UserController@store');
$router->post('/logout', 'LogoutController@index');

$router->dispatch();
<?php

use App\Controllers\UsersController;
use App\Services\MicroORM\UserService;
use BrosSquad\MicroORM\Actions\Action;
use BrosSquad\MicroORM\Driver;
use BrosSquad\MicroORM\Drivers\MySqlDatabase;
use BrosSquad\MicroORM\FluentApi\Fluent;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container[PDO::class] = function ($container) {
  $dsn = env('DB_DRIVER'). ':host=' . env('DB_HOST') . ';dbname=' . env('DB_NAME') . ';charset=utf8';

  return new PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'), [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
  ]);
};

$container[Driver::class] = function ($container) {
  $database = new MySqlDatabase($container[PDO::class]);

  return $database;
};

$container[UserService::class] = function ($container) {
  $userService = new UserService;
  
  return $userService;
};

$container[UsersController::class] = function (ContainerInterface $container) {
  return new UsersController($container->get(UserService::class));
};

Action::setDatabaseDriver($container[Driver::class]);
Fluent::setDatabase($container[Driver::class]);

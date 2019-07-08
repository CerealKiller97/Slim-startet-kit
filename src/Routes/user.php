<?php

use App\Controllers\UsersController;
use Slim\App;

$app->group('/api/users', function (App $app) {
  $app->get('', UsersController::class . ':index');
  $app->get('/{id:[0-9]+}', UsersController::class . ':find');
  $app->post('', UsersController::class . ':create');
  $app->put('/{id:[0-9]+}', UsersController::class . ':update');
  $app->delete('/{id:[0-9]+}', UsersController::class . ':delete');
});


<?php

use \Slim\App;
use Dusan\PhpMvc\Env\EnvParser;

require_once __DIR__ . '/../vendor/autoload.php';

try {

  $envParser = new EnvParser(__DIR__ . '/../.env');
  $envParser->parse();

  $envParser->loadUsingPutEnv();
  $envParser->loadIntoENV();
  require_once __DIR__ . '/../src/settings.php';

  $app = new App($settings);

  require_once __DIR__ . '/../src/dependencies.php';

  // Routes
  require_once __DIR__ . '/../src/Routes/index.php';

  $app->run();
} catch (Exception $e) {
  die($e->getMessage());
}
